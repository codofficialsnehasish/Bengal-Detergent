<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model
{
    //add order
    public function add_order($data_transaction,$userId="")
    {
       // $cart_total = $this->cart_model->get_sess_cart_total();
        $cart_total = $this->cart_model->calculate_cart_total();
        if (!empty($cart_total)) {
            $data = array(
                'order_number' => uniqid(),
                'buyer_id' => 0,
                'buyer_type' => "guest",
                'price_subtotal' => $cart_total->subtotal,
                'price_gst' => $cart_total->gst,
                'price_shipping' => $cart_total->shipping_cost,
                'price_total' => $cart_total->total,
                'price_currency' => $cart_total->currency,
                'status' => 0,
                'payment_method' => $data_transaction["payment_method"],
                'payment_status' => "payment_received",
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s')
            );

            //if cart does not have physical product
            // if ($this->cart_model->check_cart_has_physical_product() != true) {
            //     $data["status"] = 1;
            // }

        	if($userId!=''){
        	 $data["buyer_type"] = "registered";
                $data["buyer_id"] = $userId;
       		 }
       		 else{
       		 if ($this->auth_check) {
                $data["buyer_type"] = "registered";
                $data["buyer_id"] = $this->auth_user->id;
          	  }
      	    }
            
            if ($this->db->insert('orders', $data)) {
                $order_id = $this->db->insert_id();

                //update order number
                $this->update_order_number($order_id);

                //add order shipping
              //  $this->add_order_shipping($order_id);

                //add order products
                $this->add_order_products($order_id, 'payment_received');

                //add digital sales
               // $this->add_digital_sales($order_id);

                //add seller earnings
               // $this->add_digital_sales_seller_earnings($order_id);

                //add payment transaction
                $this->add_payment_transaction($data_transaction, $order_id);

                //set bidding quotes as completed
              //  $this->load->model('bidding_model');
              //  $this->bidding_model->set_bidding_quotes_as_completed_after_purchase();

                //clear cart
                $this->cart_model->clear_cart();
				
            	/////////send sms to buyer///////////////
				// $order = $this->get_order($order_id);
				// $buyer_id = $order->buyer_id ;
				// $buyer = $this->auth_model->get_user_by_id($buyer_id);
				// $mobile = $buyer->phone_number;
            	// $senderId = 'MAGXRT';
            	// $templateID = '1707167106257901278';
            	// $str = 'Dear '.$buyer->first_name.', Your order ID is '.$order->order_number.', Will be delivered Soon - Magxmart India.';
            	// send_sms($mobile,$senderId,$templateID,$str);
            	/////////send sms to buyer///////////////
						
				/////////send sms to seller///////////////
				// $sellerorder = $this->get_order_products($order_id);
				// if(!empty($sellerorder)){
				// 	foreach($sellerorder as $sorder){
				// 		$seller_id = $sorder->seller_id;
				// 		$seller = $this->auth_model->get_user_by_id($seller_id);
				// 		$mobiles = $seller->phone_number;
				// 		$senderIds = 'MAGXMT';
				// 		$templateIDs = '1707167113291643585';
				// 		$strs = 'Dear '.$seller->first_name.', You got an order having this Order ID '.$order->order_number.', Trackin ID Not Generated. - Magxmart india.';
				// 		send_sms($mobiles,$senderIds,$templateIDs,$strs);
				// 	}
				// }
            	/////////send sms to seller///////////////
	
            
                return $order_id;
            }
            return false;
        }
        return false;
    }

    //add order offline payment
    public function add_order_offline_payment($payment_method,$userId="",$is_for_distributer=0,$dist_id=0)
    {
        $order_status = "awaiting_payment";
        $payment_status = "awaiting_payment";
        if ($payment_method == 'Cash On Delivery') {
            $order_status = "order_processing";
        }

        $cart_total = $this->cart_model->calculate_cart_total();
        if (!empty($cart_total)) {
            $data = array(
                'order_number' => uniqid(),
                'buyer_id' => 0,
                'buyer_type' => "guest",
                'price_subtotal' => $cart_total->subtotal,
                'price_gst' => $cart_total->gst,
                'price_shipping' => $cart_total->shipping_cost,
                'price_total' => $cart_total->total,
                'price_currency' => $cart_total->currency,
                'status' => 0,
                'payment_method' => $payment_method,
                'payment_status' => $payment_status,
                'is_for_distributer' => $is_for_distributer,
                'distributer_id'=> $dist_id,
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s')
            );
        	if($userId!=''){
                $data["buyer_type"] = "registered";
                   $data["buyer_id"] = $userId;
                   }
                   else{
                   if ($this->auth_check) {
                   $data["buyer_type"] = "registered";
                   $data["buyer_id"] = $this->auth_user->id;
                   }
                 }
               if ($this->db->insert('orders', $data)) {
                $order_id = $this->db->insert_id();

                //update order number
                $this->update_order_number($order_id);

                //add order shipping
                // $this->add_order_shipping($order_id);

                //add order products
                $this->add_order_products($order_id, $order_status, $dist_id);

                //set bidding quotes as completed
                // $this->load->model('bidding_model');
                // $this->bidding_model->set_bidding_quotes_as_completed_after_purchase();

                //add invoice
                $this->add_invoice($order_id,$dist_id);

                //clear cart
                $this->cart_model->clear_cart();             

                return $order_id;
            }
            return false;
        }
        return false;
    }

    //update order number
    public function update_order_number($order_id)
    {
        $order_id = clean_number($order_id);
        $data = array(
            'order_number' => $order_id + 10000
        );
        $this->db->where('id', $order_id);
        $this->db->update('orders', $data);
    }

    //add order shipping
    public function add_order_shipping($order_id)
    {
        $order_id = clean_number($order_id);
        if ($this->cart_model->check_cart_has_physical_product() == true && $this->form_settings->shipping == 1) {
            $shipping_address = $this->cart_model->get_sess_cart_shipping_address();
            $data = array(
                'order_id' => $order_id,
                'shipping_first_name' => $shipping_address->shipping_first_name,
                'shipping_last_name' => $shipping_address->shipping_last_name,
                'shipping_email' => $shipping_address->shipping_email,
                'shipping_phone_number' => $shipping_address->shipping_phone_number,
                'shipping_address_1' => $shipping_address->shipping_address_1,
                'shipping_address_2' => $shipping_address->shipping_address_2,
                'shipping_country' => $shipping_address->shipping_country_id,
                'shipping_state' => $shipping_address->shipping_state,
                'shipping_city' => $shipping_address->shipping_city,
                'shipping_zip_code' => $shipping_address->shipping_zip_code,
                'billing_first_name' => $shipping_address->billing_first_name,
                'billing_last_name' => $shipping_address->billing_last_name,
                'billing_email' => $shipping_address->billing_email,
                'billing_phone_number' => $shipping_address->billing_phone_number,
                'billing_address_1' => $shipping_address->billing_address_1,
                'billing_address_2' => $shipping_address->billing_address_2,
                'billing_country' => $shipping_address->billing_country_id,
                'billing_state' => $shipping_address->billing_state,
                'billing_city' => $shipping_address->billing_city,
                'billing_zip_code' => $shipping_address->billing_zip_code
            );

            $country = get_country($shipping_address->shipping_country_id);
            if (!empty($country)) {
                $data["shipping_country"] = $country->name;
            }
            $country = get_country($shipping_address->billing_country_id);
            if (!empty($country)) {
                $data["billing_country"] = $country->name;
            }
            $this->db->insert('order_shipping', $data);
        }
    }

    //add order products
    public function add_order_products($order_id, $order_status, $dist_id = 0)
    {
        $order_id = clean_number($order_id);
        //$cart_items = $this->cart_model->get_sess_cart_items();
        $cart_items = $this->cart_model->get_cart_by_buyer();
        $cart_total = $this->cart_model->calculate_cart_total();
        if (!empty($cart_items)) {
            foreach ($cart_items as $cart_item) {
                $product = get_available_product($cart_item->product_id);
               // $variation_option_ids = @serialize($cart_item->options_array);
                $variation_option_ids = $cart_item->variations;

                if(!empty($cart_item->variations) || $cart_item->variations!='' || $cart_item->variations!=null){
                    $cartvariations=explode(',',$cart_item->variations);
                }else{
                    $cartvariations[]="";
                }
                array_filter($cartvariations);
                $object=$this->cart_model->get_product_price_and_stock($product,$cartvariations,$cart_item->quantity);
                unset($cartvariations);
                $totalprice = (int)$object->price_calculated * (int)$cart_item->quantity;
                if (!empty($product)) {
                    $data = array(
                        'order_id' => $order_id,
                        'seller_id' => $dist_id != 0 ? $dist_id : $product->user_id,
                        'buyer_id' => 0,
                        'buyer_type' => "guest",
                        'product_id' => $product->id,
                        'product_type' => $product->product_type,
                        'product_title' => $cart_item->product_title,
                        'product_slug' => $product->slug,
                        'product_unit_price' => $product->price,
                        'product_quantity' => $cart_item->quantity,
                        'product_currency' => $product->currency_code,
                        'product_gst_rate' => $product->gst_rate,
                        'product_gst' => 0,
                        'product_shipping_cost' => 0,
                        'product_total_price' => $totalprice,
                        'variation_option_ids' => $variation_option_ids,
                        'commission_rate' => $this->general_settings->commission_rate,
                        'order_status' => $order_status,
                        'is_approved' => 0,
                        'shipping_tracking_number' => "",
                        'shipping_tracking_url' => "",
                        'updated_at' => date('Y-m-d H:i:s'),
                        'created_at' => date('Y-m-d H:i:s')
                    );
                    if ($this->auth_check) {
                        $data["buyer_id"] = $this->auth_user->id;
                        $data["buyer_type"] = "registered";
                    }
                    //approve if digital product
                    // if ($product->product_type == 'digital') {
                    //     $data["is_approved"] = 1;
                    //     if ($order_status == 'payment_received') {
                    //         $data["order_status"] = 'completed';
                    //     } else {
                    //         $data["order_status"] = $order_status;
                    //     }
                    // }
                    $data["product_total_price"] = $totalprice ;
                  //  $data["product_total_price"] = $cart_item->total_price + $cart_item->product_gst + $cart_item->shipping_cost;

                    $this->db->insert('order_products', $data);
                    $this->add_order_tracking_status($order_id);
                }
            }
        }
    }

    public function add_order_tracking_status($order_id){
        $data = array(
            'order_id' => $order_id,
            'is_awaiting_payment' => 1,
            'is_awaiting_payment_update' => date('Y-m-d H:i:s'),
            'is_payment_received' => 0,
            'is_payment_received_update' => null,
            'is_order_processing' => 1,
            'is_order_processing_update' => date('Y-m-d H:i:s'),
            'is_shipped' => 0,
            'is_shipped_update' => null,
            'is_completed' => 0,
            'is_completed_update' => null,
            'is_cancelled' => 0,
            'is_cancelled_update' => null,
        );
        $this->db->insert('order_tracking_status', $data);
    }

    //add digital sales
    public function add_digital_sales($order_id)
    {
        $order_id = clean_number($order_id);
        $cart_items = $this->cart_model->get_sess_cart_items();
        $order = $this->get_order($order_id);
        if (!empty($cart_items) && $this->auth_check && !empty($order)) {
            foreach ($cart_items as $cart_item) {
                $product = get_available_product($cart_item->product_id);
                if (!empty($product) && $product->product_type == 'digital') {
                    $data_digital = array(
                        'order_id' => $order_id,
                        'product_id' => $product->id,
                        'product_title' => $product->title,
                        'seller_id' => $product->user_id,
                        'buyer_id' => $order->buyer_id,
                        'license_key' => '',
                        'purchase_code' => generate_purchase_code(),
                        'currency' => $product->currency,
                        'price' => $product->price,
                        'purchase_date' => date('Y-m-d H:i:s')
                    );

                    $license_key = $this->product_model->get_unused_license_key($product->id);
                    if (!empty($license_key)) {
                        $data_digital['license_key'] = $license_key->license_key;
                    }

                    $this->db->insert('digital_sales', $data_digital);

                    //set license key as used
                    if (!empty($license_key)) {
                        $this->product_model->set_license_key_used($license_key->id);
                    }
                }
            }
        }
    }

    //add digital sale
    public function add_digital_sale($product_id, $order_id)
    {
        $product_id = clean_number($product_id);
        $order_id = clean_number($order_id);
        $product = get_available_product($product_id);
        $order = $this->get_order($order_id);
        if (!empty($product) && $product->product_type == 'digital' && !empty($order)) {
            $data_digital = array(
                'order_id' => $order_id,
                'product_id' => $product->id,
                'product_title' => $product->title,
                'seller_id' => $product->user_id,
                'buyer_id' => $order->buyer_id,
                'license_key' => '',
                'purchase_code' => generate_purchase_code(),
                'currency' => $product->currency,
                'price' => $product->price,
                'purchase_date' => date('Y-m-d H:i:s')
            );

            $license_key = $this->product_model->get_unused_license_key($product->id);
            if (!empty($license_key)) {
                $data_digital['license_key'] = $license_key->license_key;
            }

            $this->db->insert('digital_sales', $data_digital);

            //set license key as used
            if (!empty($license_key)) {
                $this->product_model->set_license_key_used($license_key->id);
            }
        }
    }

    //add digital sales seller earnings
    public function add_digital_sales_seller_earnings($order_id)
    {
        $order_id = clean_number($order_id);
        $order_products = $this->get_order_products($order_id);
        if (!empty($order_products)) {
            foreach ($order_products as $order_product) {
                if ($order_product->product_type == 'digital') {
                    $this->earnings_model->add_seller_earnings($order_product);
                }
            }
        }
    }

    
    //add payment transaction
    public function add_payment_transaction($data_transaction, $order_id)
    {
        $order_id = clean_number($order_id);
        $data = array(
            'payment_method' => $data_transaction["payment_method"],
            'payment_id' => $data_transaction["payment_id"],
            'order_id' => $order_id,
            'user_id' => 0,
            'user_type' => "guest",
            'currency' => $data_transaction["currency"],
            'payment_amount' => $data_transaction["payment_amount"],
            'payment_status' => $data_transaction["payment_status"],
            'ip_address' => 0,
            'created_at' => date('Y-m-d H:i:s')
        );
        if ($this->auth_check) {
            $data["user_id"] = $this->auth_user->id;
            $data["user_type"] = "registered";
        }
        $ip = $this->input->ip_address();
        if (!empty($ip)) {
            $data['ip_address'] = $ip;
        }
        if ($this->db->insert('transactions', $data)) {
            //add invoice
            $this->add_invoice($order_id);
        }
    }

    //update order payment as received
    public function update_order_payment_received($order)
    {
        if (!empty($order)) {
            //update product payment status
            $data_order = array(
                'payment_status' => "payment_received",
                'updated_at' => date('Y-m-d H:i:s'),
            );
            $this->db->where('id', $order_id);
            if ($this->db->update('orders', $data_order)) {
                //update order products payment status
                $order_products = $this->get_order_products($order_id);
                if (!empty($order_products)) {
                    foreach ($order_products as $order_product) {
                        $data = array(
                            'order_status' => "payment_received",
                            'updated_at' => date('Y-m-d H:i:s'),
                        );
                        $this->db->where('id', $order_product->id);
                        $this->db->update('order_products', $data);
                    }
                }

                //add invoice
                $this->add_invoice($order_id);
            }
        }
    }

    //get orders count
    public function get_orders_count($user_id)
    {
        $user_id = clean_number($user_id);
        $this->db->where('buyer_id', $user_id);
        $this->db->where('status', 0);
        $query = $this->db->get('orders');
        return $query->num_rows();
    }

    //get paginated orders
    public function get_paginated_orders($user_id, $per_page, $offset)
    {
        $user_id = clean_number($user_id);
        $this->db->where('buyer_id', $user_id);
        $this->db->where('status', 0);
        $this->db->order_by('orders.created_at', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('orders');
        return $query->result();
    }

    //get completed orders count
    public function get_completed_orders_count($user_id)
    {
        $user_id = clean_number($user_id);
        $this->db->where('buyer_id', $user_id);
        $this->db->where('status', 1);
        $query = $this->db->get('orders');
        return $query->num_rows();
    }

    public function get_all_order_by_id($user_id){
        $user_id = clean_number($user_id);
        $this->db->where('buyer_id', $user_id);
        $this->db->where('status', 0);
        $this->db->order_by('orders.created_at', 'DESC');
        $query = $this->db->get('orders');
        return $query->result();
    }

    public function get_all_order_for_distributer($user_id){
        $user_id = clean_number($user_id);
        $this->db->where('buyer_id', $user_id);
        // $this->db->where('status', 0);
        $this->db->order_by('orders.created_at', 'DESC');
        $query = $this->db->get('orders');
        return $query->result();
    }

    public function check_order_retailer_to_distributer($order_id){
        $order_id = clean_number($order_id);
        $this->db->select('distributer_id');
        $this->db->where('id', $order_id);
        $this->db->where('is_for_distributer', 1);
        $query = $this->db->get('orders');
        return $query->row();
    }

    //get paginated completed orders
    public function get_paginated_completed_orders($user_id, $per_page, $offset)
    {
        $user_id = clean_number($user_id);
        $this->db->where('buyer_id', $user_id);
        $this->db->where('status', 1);
        $this->db->order_by('orders.created_at', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('orders');
        return $query->result();
    }

    //get order products
    public function get_order_products($order_id)
    {
        $order_id = clean_number($order_id);
        $this->db->where('order_id', $order_id);
        $query = $this->db->get('order_products');
        return $query->result();
    }

    //get seller order products
    public function get_seller_order_products($order_id, $seller_id)
    {
        $order_id = clean_number($order_id);
        $seller_id = clean_number($seller_id);
        $this->db->where('order_id', $order_id);
        $this->db->where('seller_id', $seller_id);
        $query = $this->db->get('order_products');
        return $query->result();
    }

    //get order product
    public function get_order_product($order_product_id)
    {
        $order_product_id = clean_number($order_product_id);
        $this->db->where('id', $order_product_id);
        $query = $this->db->get('order_products');
        return $query->row();
    }

    //get order
    public function get_order($id)
    {
        $id = clean_number($id);
        $this->db->where('id', $id);
        $query = $this->db->get('orders');
        return $query->row();
    }

    //get order by order number
    public function get_order_by_order_number($order_number)
    {
        $this->db->where('order_number', clean_number($order_number));
        $query = $this->db->get('orders');
        return $query->row();
    }

    //update order product status
    public function update_order_product_status($order_product_id)
    {
        $order_product_id = clean_number($order_product_id);
        $order_product = $this->get_order_product($order_product_id);
        if (!empty($order_product)) {
            if ($order_product->seller_id == $this->auth_user->id) {
                $data = array(
                    'order_status' => $this->input->post('order_status', true),
                    'is_approved' => 0,
                    'updated_at' => date('Y-m-d H:i:s'),
                );

                if ($order_product->product_type == 'digital' && $data["order_status"] == 'payment_received') {
                    $data['order_status'] = 'completed';
                }

                if ($data["order_status"] == 'shipped') {
                    //send email
                    if ($this->general_settings->send_email_order_shipped == 1) {
                        $email_data = array(
                            'email_type' => 'order_shipped',
                            'order_product_id' => $order_product->id
                        );
                        $this->session->set_userdata('mds_send_email_data', json_encode($email_data));
                    }
                }

            
                /////////send sms to buyer///////////////
				// $order = $this->get_order($order_id);
				// $buyer_id = $order->buyer_id ;
				// $buyer = $this->auth_model->get_user_by_id($buyer_id);
				// $mobile = $buyer->phone_number;
				// $senderId = 'MAGXRT';
				// $templateID = '1707167106257901278';
				// $str = 'Dear '.$buyer->first_name.', Your order ID is '.$buyer->order_number.', Will be delivered Soon - Magxmart India.';
				// send_sms($mobile,$senderId,$templateID,$str);
            	/////////send sms to buyer///////////////

				/////////send sms to seller///////////////
				// $sellerorder = $this->get_order_products($order_id);
				// if(!empty($sellerorder)){
				// 	foreach($sellerorder as $sorder){
				// 		$seller_id = $sorder->seller_id;
				// 		$seller = $this->auth_model->get_user_by_id($seller_id);
				// 		$mobiles = $seller->phone_number;
				// 		$senderIds = 'MAGXMT';
				// 		$templateIDs = '1707167113291643585';
				// 		$strs = 'Dear '.$seller->first_name.', You got an order having this Order ID '.$sorder->order_number.', Trackin ID 000. - Magxmart india.';
				// 		send_sms($mobiles,$senderIds,$templateIDs,$strs);
				// 	}
				// }
            	/////////send sms to seller///////////////
				//echo $this->input->post('order_status', true);die;
            
                $this->db->where('id', $order_product_id);
                return $this->db->update('order_products', $data);
            }
        }
        return false;
    }



/////cancel order product
	public function cancel_order_product($order_product_id){
	 $order_product_id = clean_number($order_product_id);
        $order_product = $this->get_order_product($order_product_id);
        if (!empty($order_product)) {
       	       if ($order_product->order_status != 'completed') {
                    $data['order_status'] = 'cancelled';
                }
      		  $this->db->where('id', $order_product_id);
                return $this->db->update('order_products', $data);
        }
		return false;
    }

    public function cancel_order($order_id){
        $order_id = clean_number($order_id);
        $order_products = $this->get_order_products($order_id);
        if (!empty($order_products)) {
            foreach($order_products as $order_product){
                if ($order_product->order_status != 'completed') {
                    $data['order_status'] = 'cancelled';
                }
                $this->db->where('id', $order_product->id);
                $this->db->update('order_products', $data);
            }
        }
        $data = array(
            'is_canceled' => 1,
        );
        $this->db->where('id', $order_id);
        $this->db->update('orders', $data);
        $data1 = array(
            'is_cancelled' => 1,
            'is_cancelled_update' => date('Y-m-d H:i:s')
        );
        $this->db->where('order_id', $order_id);
        $this->db->update('order_tracking_status', $data1);
        return false;
    }



    //add shipping tracking number
    public function add_shipping_tracking_number($order_product_id)
    {
        $order_product_id = clean_number($order_product_id);
        $order_product = $this->get_order_product($order_product_id);
        if (!empty($order_product)) {
            if ($order_product->seller_id == $this->auth_user->id) {
                $data = array(
                    'shipping_tracking_number' => $this->input->post('shipping_tracking_number', true),
                    'shipping_tracking_url' => $this->input->post('shipping_tracking_url', true),
                    'updated_at' => date('Y-m-d H:i:s'),
                );

                $this->db->where('id', $order_product_id);
                return $this->db->update('order_products', $data);
            }
        }
        return false;
    }

    //add bank transfer payment report
    public function add_bank_transfer_payment_report()
    {
        $data = array(
            'order_number' => $this->input->post('order_number', true),
            'payment_note' => $this->input->post('payment_note', true),
            'receipt_path' => "",
            'user_id' => 0,
            'user_type' => "guest",
            'status' => "pending",
            'ip_address' => 0,
            'created_at' => date('Y-m-d H:i:s')
        );
        if ($this->auth_check) {
            $data["user_id"] = $this->auth_user->id;
            $data["user_type"] = "registered";
        }
        $ip = $this->input->ip_address();
        if (!empty($ip)) {
            $data['ip_address'] = $ip;
        }

        $this->load->model('upload_model');
        $file_path = $this->upload_model->receipt_upload('file');
        if (!empty($file_path)) {
            $data["receipt_path"] = $file_path;
        }

        return $this->db->insert('bank_transfers', $data);
    }

    //get sales count
    public function get_sales_count($user_id)
    {
        $user_id = clean_number($user_id);
        $this->db->join('order_products', 'order_products.order_id = orders.id');
        $this->db->select('orders.id');
        $this->db->group_by('orders.id');
        $this->db->where('order_products.seller_id', $user_id);
        $this->db->where('order_products.order_status !=', 'completed');
        $query = $this->db->get('orders');
        return $query->num_rows();
    }

    //get paginated sales
    public function get_paginated_sales($user_id, $per_page, $offset)
    {
        $user_id = clean_number($user_id);
        $this->db->join('order_products', 'order_products.order_id = orders.id');
        $this->db->select('orders.id');
        $this->db->group_by('orders.id');
        $this->db->where('order_products.seller_id', $user_id);
        $this->db->where('order_products.order_status !=', 'completed');
        $this->db->order_by('orders.created_at', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('orders');
        return $query->result();
    }

    //get completed sales count
    public function get_completed_sales_count($user_id)
    {
        $user_id = clean_number($user_id);
        $this->db->join('order_products', 'order_products.order_id = orders.id');
        $this->db->select('orders.id');
        $this->db->group_by('orders.id');
        $this->db->where('order_products.seller_id', $user_id);
        $this->db->where('order_products.order_status', 'completed');
        $query = $this->db->get('orders');
        return $query->num_rows();
    }

    //get paginated completed sales
    public function get_paginated_completed_sales($user_id, $per_page, $offset)
    {
        $user_id = clean_number($user_id);
        $this->db->join('order_products', 'order_products.order_id = orders.id');
        $this->db->select('orders.id');
        $this->db->group_by('orders.id');
        $this->db->where('order_products.seller_id', $user_id);
        $this->db->where('order_products.order_status', 'completed');
        $this->db->order_by('orders.created_at', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('orders');
        return $query->result();
    }

    //get order shipping
    public function get_order_shipping($order_id)
    {
        $order_id = clean_number($order_id);
        $this->db->where('order_id', $order_id);
        $query = $this->db->get('order_shipping');
        return $query->row();
    }

    //check order seller
    public function check_order_seller($order_id)
    {
        $order_id = clean_number($order_id);
        $order_products = $this->get_order_products($order_id);
        $result = false;
        if (!empty($order_products)) {
            foreach ($order_products as $product) {
                if ($product->seller_id == $this->auth_user->id) {
                    $result = true;
                }
            }
        }
        return $result;
    }

    //get seller total price
    public function get_seller_total_price($order_id)
    {
        $order_id = clean_number($order_id);
        $order_products = $this->get_order_products($order_id);
        $total = 0;
        if (!empty($order_products)) {
            foreach ($order_products as $product) {
                if ($product->seller_id == $this->auth_user->id) {
                    $total += $product->product_total_price;
                }
            }
        }
        return $total;
    }

    //approve order product
    public function approve_order_product($order_product_id)
    {
        $order_product_id = clean_number($order_product_id);
        $order_product = $this->get_order_product($order_product_id);

        if (!empty($order_product)) {
            if ($this->auth_user->id == $order_product->buyer_id) {
                $data = array(
                    'is_approved' => 1,
                    'order_status' => "completed",
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $this->db->where('id', $order_product_id);
                return $this->db->update('order_products', $data);
            }
        }

        return false;
    }

    //decrease product stock after sale
    public function decrease_product_stock_after_sale($order_id){
        $order_products = $this->get_order_products($order_id);
        // return $order_products;
        if (!empty($order_products)) {
            foreach ($order_products as $order_product) {

                if($order_product->variation_option_ids == null){ $option_ids = [];
                }else{ $option_ids = explode(',',$order_product->variation_option_ids); }
                // $option_ids = @unserialize($order_product->variation_option_ids);

                //for product veriation stock
                if (!empty($option_ids)) {
                    foreach ($option_ids as $option_id) {
                        $option = $this->variation_model->get_variation_option($option_id);
                        if(!empty($option)) {
                            if($option->is_default == 1){
                                $product = $this->product_model->get_product_by_id($order_product->product_id);
                                if (!empty($product)) {
                                    $stock = $product->stock - $order_product->product_quantity;
                                    if ($stock < 0) {
                                        $stock = 0;
                                    }
                                    $data = array(
                                        'stock' => $stock
                                    );
                                    $this->db->where('id', $product->id);
                                    $this->db->update('products', $data);
                                }
                            } else {
                                $stock = $option->stock - $order_product->product_quantity;
                                if ($stock < 0) {
                                    $stock = 0;
                                }
                                $data = array(
                                    'stock' => $stock
                                );
                                $this->db->where('id', $option->id);
                                $this->db->update('variation_options', $data);
                            }
                        }
                    }
                } else {   //for product stock
                    $product = $this->product_model->get_product_by_id($order_product->product_id);
                    if (!empty($product)) {
                        $stock = $product->stock - $order_product->product_quantity;
                        if ($stock < 0) {
                            $stock = 0;
                        }
                        if($stock == 0){
                            $data = array(
                                'stock' => $stock,
                                'stock_status' => 0
                            );    
                        }else{
                            $data = array(
                                'stock' => $stock
                            );
                        }
                        $this->db->where('id', $product->id);
                        $this->db->update('products', $data);
                    }
                }
            }
        }
    }

    //add invoice
    // public function add_invoice($order_id)
    // {
    //     $order = $this->get_order($order_id);
    //     if (!empty($order)) {
    //         $invoice = $this->get_invoice_by_order_number($order->order_number);
    //         if (empty($invoice)) {
    //             $client = get_user($order->buyer_id);
    //             if (!empty($client)) {
    //                 $invoice_items = array();
    //                 $order_products = $this->order_model->get_order_products($order_id);
    //                 if (!empty($order_products)) {
    //                     foreach ($order_products as $order_product) {
    //                         $seller = get_user($order_product->seller_id);
    //                         $item = array(
    //                             'id' => $order_product->id,
    //                             'seller' => (!empty($seller)) ? $seller->username : ""
    //                         );
    //                         array_push($invoice_items, $item);
    //                     }
    //                 }
    //                 $data = array(
    //                     'order_id' => $order->id,
    //                     'order_number' => $order->order_number,
    //                     'client_username' => $client->username,
    //                     'client_first_name' => $client->first_name,
    //                     'client_last_name' => $client->last_name,
    //                     'client_address' => get_location($client),
    //                     'invoice_items' => @serialize($invoice_items),
    //                     'created_at' => date('Y-m-d H:i:s')
    //                 );
    //                 return $this->db->insert('invoices', $data);
    //             }
    //         }
    //     }
    //     return false;
    // }

//add invoice
public function add_invoice($order_id,$dist_id = 0)
    {
        $order = $this->get_order($order_id);
        if (!empty($order)) {
           // $invoice = $this->get_invoice_by_order_number($order->order_number);
           // if (empty($invoice)) {
                $client = get_user($order->buyer_id);
                if (!empty($client)) {
                    $invoice_items = array();
                    $order_products = $this->order_model->get_order_products($order_id);
                    if (!empty($order_products)) {
                        foreach ($order_products as $order_product) {
                            $seller = get_user($order_product->seller_id);
                            ///client billing details
                            $con=array(
                                    'tblName' => 'address_book',
                                     'where' => array(
                                     'user_id' =>$client->id,
                                     'is_default' =>1
                                    )
                                );
                            $result=$this->select->getResult($con);
                            $billing=$result[0];


                            $data = array(
                                'order_id' =>$order->id,
                                'buyer_id' =>$client->id,
                                'seller_id' =>$dist_id != 0 ? $dist_id : $seller->id,
                                'billing_name' =>$billing->billing_first_name.' '.$billing->billing_last_name,
                                'billing_addr' =>$billing->billing_address_1,
                                'billing_pin' =>$billing->billing_zip_code,
                                'billing_phone' =>$billing->billing_phone_number,
                                'shipping_name' =>$client->shipping_first_name.' '.$client->shipping_last_name,
                                'shipping_addr' =>$client->shipping_address_1,
                                'shipping_pin' =>$client->shipping_zip_code,
                                'shipping_phone' =>$client->phone_number,
                                'place_of_supply' =>$client->shipping_state,
                                //'invoice_number' =>,
                                'product_id' =>$order_product->product_id,
                                'product_title' =>$order_product->product_title,
                                'qty' =>$order_product->product_quantity,
                                'unit_price' =>$order_product->product_unit_price,
                                'net_amount' =>$order_product->product_total_price,
                                'gst_rate' =>$order_product->product_gst_rate,
                                'created_at' =>date('Y-m-d H:i:s')
                            );

                            // $item = array(
                            //     'id' => $order_product->id,
                            //     'seller' => (!empty($seller)) ? $seller->username : ""
                            // );
                            // array_push($invoice_items, $item);
                             $this->db->insert('invoices', $data);
                        }
                    }
                    // $data = array(
                    //     'order_id' => $order->id,
                    //     'order_number' => $order->order_number,
                    //     'client_username' => $client->username,
                    //     'client_first_name' => $client->first_name,
                    //     'client_last_name' => $client->last_name,
                    //     'client_address' => get_location($client),
                    //     'invoice_items' => @serialize($invoice_items),
                    //     'created_at' => date('Y-m-d H:i:s')
                    // );
                    return true;
                    //return $this->db->insert('invoices', $data);
                }
            //}
        }
        return false;
    }




    //get invoice
    public function get_invoice($id)
    {
        $this->db->where('id', clean_number($id));
        $query = $this->db->get('invoices');
        return $query->row();
    }

    //get invoice by order number
    public function get_invoice_by_order_number($order_number)
    {
       // $this->db->where('order_number', clean_number($order_number));
    $this->db->where('id', 1);
        $query = $this->db->get('invoices');
        return $query->row();
    }
  //get invoice by order number
    public function get_invoice_by_order_id_product_id_buyer_id($order_id,$product_id,$buyer_id)
    {
       $this->db->where('order_id', clean_number($order_id));
       $this->db->where('product_id', clean_number($product_id));
       $this->db->where('buyer_id', clean_number($buyer_id));
        $query = $this->db->get('invoices');
        return $query->row();
    }




    //////////////////////


    public function get_invoice_by_order_number_def($order_number)
    {
       // $this->db->where('order_number', clean_number($order_number));
    $this->db->where('id', $order_number);
        $query = $this->db->get('invoices');
        return $query->result();
    }

    public function get_invoice_by_order_id_buyer_id_def($order_id,$buyer_id)
    {
       $this->db->where('order_id', clean_number($order_id));
    //    $this->db->where('product_id', clean_number($product_id));
       $this->db->where('buyer_id', clean_number($buyer_id));
        $query = $this->db->get('invoices');
        return $query->result();
    }


    //////////////////
    


    /////////05/08/2022
       //add order
       public function add_membership_plan_order($data_transaction)
       {
           $cart_total = $this->cart_model->calculate_plan_cart_total();
           if (!empty($cart_total)) {
               $data = array(
                   'order_number' => uniqid(),
                   'buyer_id' => 0,
                   'buyer_type' => "guest",
                   'price_subtotal' => $cart_total->subtotal,
                   'price_total' => $cart_total->total,
                   'price_currency' => $cart_total->currency,
                   'status' => 0,
                   'payment_method' => $data_transaction["payment_method"],
                   'payment_status' => "payment_received",
                   'updated_at' => date('Y-m-d H:i:s'),
                   'created_at' => date('Y-m-d H:i:s')
               );
   
   
               if ($this->auth_check) {
                   $data["buyer_type"] = "registered";
                   $data["buyer_id"] = $this->auth_user->id;
               }
               if ($this->db->insert('orders', $data)) {
                   $order_id = $this->db->insert_id();
                   $this->update_order_number($order_id);
                   //add payment transaction
                   $this->add_payment_transaction($data_transaction, $order_id);
                   $this->update_user_plan($cart_total->plan_id);
                   //clear cart
                   $this->cart_model->clear_plan_cart();
                   return $order_id;
               }
               return false;
           }
           return false;
       }
   

       //update order number
    public function update_user_plan($plan_id)
    {
        $plan_id = clean_number($plan_id);
        $data = array(
            'plan_id' => $plan_id
        );
        $this->db->where('id', $this->auth_user->id);
        $this->db->update('users', $data);
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////ADMIN///////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////
    //update order payment as received
    public function update_order_payment_received_admin($order_id)
    {
        $order_id = clean_number($order_id);
        $order = $this->get_order($order_id);
        if (!empty($order)) {
            //update product payment status
            $data_order = array(
                'payment_status' => "payment_received",
                'updated_at' => date('Y-m-d H:i:s'),
            );
            $this->db->where('id', $order_id);
            $this->db->update('orders', $data_order);

            //update order products payment status
            $order_products = $this->get_order_products($order_id);
            if (!empty($order_products)) {
                foreach ($order_products as $order_product) {
                    $data = array(
                        'order_status' => "payment_received",
                        'updated_at' => date('Y-m-d H:i:s'),
                    );
                    if ($order_product->product_type == 'digital') {
                        $data['order_status'] = 'completed';
                        //add digital sale
                        $this->order_model->add_digital_sale($order_product->product_id, $order_id);
                        //add seller earnings
                        $this->earnings_model->add_seller_earnings($order_product);
                    }
                    $this->db->where('id', $order_product->id);
                    $this->db->update('order_products', $data);
                }
            }
        }
    }

    //update order product status
    public function update_order_product_status_admin($order_product_id,$order_id)
    {
        $order_product_id = clean_number($order_product_id);
        $order_product = $this->get_order_product($order_product_id);
        // return $order_product;
        if (!empty($order_product)) {
            $data = array(
                'order_status' => $this->input->post('order_status', true),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            if ($data["order_status"] == "completed" || $data["order_status"] == "cancelled") {
                $data['is_approved'] = 1;
            } else {
                $data['is_approved'] = 0;
            }

            // $this->db->where('id', $order_product_id);
            // $this->db->update('order_products', $data);

            if ($data["order_status"] == "completed"){
                $buyer_id = $this->get_userid_from_order($order_id);
                if(get_user_by_id($buyer_id)->role == 'dristributor'){
                    // $order_products = $this->get_order_products($order_id);
                    // foreach ($order_products as $item){
                        $datast = array(
                            'dristributor_id' => $buyer_id,
                            'product_id' => $order_product->product_id,
                            'stock' => $order_product->product_quantity,
                            'updated_at' => date('Y-m-d H:i:s')
                        );
                        $stock_data = $this->check_product_avalibility_for_distributer( $order_product->product_id,$buyer_id);
                        // return 
                        if($stock_data > 0 || $stock_data == -1){
                            $datast['stock'] += $stock_data;
                            $this->db->where('dristributor_id', $order_product->buyer_id );
                            $this->db->where('product_id',$order_product->product_id);
                            $this->db->update('dristributor_stocks', $datast);
                        }else{
                            $this->db->insert('dristributor_stocks', $datast);
                        }
                    // }
                }elseif(get_user_by_id($buyer_id)->role == 'retailer'){
                    // $order_products = $this->get_order_products($order_id);
                    // foreach ($order_products as $item){
                        // if($item->order_status == 'completed'){
                            $stock_data = $this->check_product_avalibility_for_distributer( $order_product->product_id,$order_product->seller_id);
                            if($stock_data > $order_product->product_quantity && $stock_data > 0){
                                $datastock['stock'] = ($stock_data - $order_product->product_quantity);
                                $this->db->where('dristributor_id', $order_product->seller_id);
                                $this->db->where('product_id',$order_product->product_id);
                                $this->db->update('dristributor_stocks', $datastock);
                            }
                        // }
                    // }
                }
            }
            $this->db->where('id', $order_product_id);
            return $this->db->update('order_products', $data);
        }
        return false;
    }

    //check order products status / update if all suborders completed
    public function update_order_status_if_completed($order_id)
    {
        $order_id = clean_number($order_id);
        $all_complated = true;
        $order_products = $this->get_order_products($order_id);
        if (!empty($order_products)) {
            foreach($order_products as $order_product){
                if($order_product->order_status != "completed" && $order_product->order_status != "cancelled") {
                    $all_complated = false;
                }
            }
            $data = array(
                'status' => 0,
                'updated_at' => date('Y-m-d H:i:s'),
            );
            if ($all_complated == true){
                $data["status"] = 1;
            }
            $this->db->where('id', $order_id);
            $this->db->update('orders', $data);

            if ($all_complated == true){
                $data1 = array(
                    'is_completed' => 1,
                    'is_completed_update' => date('Y-m-d H:i:s')
                );
                $this->db->where('id', $order_id);
                $this->db->update('order_tracking_status', $data1);
            }

            
            
        }
    }

    public function check_product_avalibility_for_distributer($product_id, $user_id){
		$this->db->select('*');
		$this->db->where('dristributor_id',$user_id);
		$this->db->where('product_id',$product_id);
		// $this->db->from('dristributor_stocks');
		$query = $this->db->get('dristributor_stocks');
		// return count($query->result());
		$res = $query->result();
        if(!empty($res)){
            if($res[0]->stock <= 0){
                return -1;
            }else{
                return $res[0]->stock;
            }
        }else{
            return 0;
        }
        // return $res;
        // return $res[0]->stock;
        // if(!empty($res)){
        //     if($status == 'entry_stock'){
        //         return $res[0]->stock <= 0 ? 1 : $res[0]->stock;
        //     }else{
        //         return $res[0]->stock;
        //     }
        // }else{
        //     return 0;
        // }
        // return $this->db->count_all_results();	
		// $res = $query->row();
		// return $res->buyer_id;
	}

    public function get_userid_from_order($order_id){
		$this->db->select('buyer_id');
		$this->db->where('id',$order_id);
		$query = $this->db->get('orders');
		// return $query->result();
		$res = $query->row();
		return $res->buyer_id;
	}

    //check order payment status / update if all payments received
    public function update_payment_status_if_all_received($order_id)
    {
        $order_id = clean_number($order_id);
        $all_received = true;
        $order_products = $this->get_order_products($order_id);
        if (!empty($order_products)) {
            foreach ($order_products as $order_product) {
                if ($order_product->order_status == "awaiting_payment" || $order_product->order_status == "cancelled") {
                    $all_received = false;
                }
            }
            $data = array(
                'payment_status' => 'awaiting_payment',
                'updated_at' => date('Y-m-d H:i:s'),
            );
            if ($all_received == true) {
                $data["payment_status"] = 'payment_received';
            }
            $this->db->where('id', $order_id);
            $this->db->update('orders', $data);

            if ($all_received == true) {
                $data1 = array(
                    'is_payment_received' => 1,
                    'is_awaiting_payment' => 0,
                    'is_awaiting_payment_update' => date('Y-m-d H:i:s'),
                    'is_payment_received_update' => date('Y-m-d H:i:s')
                );
                $this->db->where('id', $order_id);
                $this->db->update('order_tracking_status', $data1);
            }
        }
    }


     //delete order
     public function delete_order($id)
     {
         $id = clean_number($id);
         $order = $this->get_order($id);
         if (!empty($order)) {
             //delete order products
             $order_products = $this->get_order_products($id);
             if (!empty($order_products)) {
                 foreach ($order_products as $order_product) {
                     $this->db->where('id', $order_product->id);
                     $this->db->delete('order_products');
                 }
             }
             //delete order
             $this->db->where('id', $id);
             return $this->db->delete('orders');
         }
         return false;
     }

         //delete order product
    public function delete_order_product($order_product_id)
    {
        $order_product_id = clean_number($order_product_id);
        $order_product = $this->get_order_product($order_product_id);
        if (!empty($order_product)) {
            $this->db->where('id', $order_product_id);
            return $this->db->delete('order_products');
        }
        return false;
    }
    //get orders count
    public function get_any_orders_count($user_id,$status=0)
    {
            $user_id = clean_number($user_id);
            $this->db->where('buyer_id', $user_id);
            if($status!='all' && $status!='pending'){
                $this->db->where('status', $status);
            }
            if($status=='pending'){
                $this->db->where('status', 0);
            }
            if($status=='cancelled'){
                $this->db->where('is_canceled', 1);
            }
            $query = $this->db->get('orders');
            return $query->num_rows();
    }

    public function get_retailer_orders_count($dist_id,$status=0)
    {
            $user_id = clean_number($dist_id);
            $this->db->where('distributer_id', $user_id);
            if($status!='all' && $status!='pending'){
                $this->db->where('status', $status);
            }
            if($status=='pending'){
                $this->db->where('status', 0);
            }
            $query = $this->db->get('orders');
            return $query->num_rows();
    }


    ///////update shipping status
	public function updateTrackingNo($order_product_id,$tracking_number,$order_id){
        $data1 = array(
            'is_shipped' => 1,
            'is_shipped_update' => date('Y-m-d H:i:s'),
        );
        $this->db->where('id', $order_id);
        $this->db->update('order_tracking_status', $data1);
        $data = array(
            'order_status' => $this->input->post('order_status', true),
            // 'shipping_tracking_number' => $tracking_number,
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('id', $order_product_id);
        return $this->db->update('order_products', $data);

    }
}
