<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?> 
<?php $check_option = true; ?>


<div id="page-content">
   <!-- Page Title -->
   <div class="page section-header text-center">
      <div class="page-title">
         <div class="wrapper"><h1 class="page-title">Checkout</h1></div>
      </div>
   </div>
   <!-- End Page Title -->

   <div class="container">
   <?php echo form_open('payment-method-post',  'class="needs-validation" id="orderform" autocomplete="off"  novalidate '); ?>
      <div class="row billing-fields">
         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3 mb-md-0">
               <div class="create-ac-content">
                  <!-- <form method="post" action="#"> -->
                     <fieldset>
                        <h2 class="login-title mb-3">Billing details</h2>
                        <?php 
                        if(!empty($shipping_address)):
                           foreach($shipping_address as $addr):  
                        ?>
                        <div class="">
                           <label>
                              <input type="radio" name="addrradio" required required value="2" <?= $addr->is_default==1?'checked':'';?>>
                              <p class="name"><?= $addr->billing_first_name?> <?= !empty($addr->billing_first_name)?', '.$addr->billing_phone_number:'';?>
                              <span class="addr_type"><?= address_type($addr->address_type);?></span>
                           </p>
                              <p><?= get_address_by_id($addr->id)?></p><div class="invalid-tooltip" style="width:23%;">Address is Required</div>
                           </label>
                           
                        </div>
                        <?php endforeach;endif;?>
                        <div class="">
                           <label>
                              <input type="radio" name="addrradio" required value="fornewaddr" required <?php if(empty($shipping_address)) echo 'checked'; ?>>
                              <p class="name">Add New</p><div class="invalid-tooltip" style="width:23%;">Address is Required</div>
                           </label>
                        </div>
                        <div id="orderdiv" style='display:<?php if(empty($shipping_address)){ echo '';}else{ echo 'none';} ?>;'>
                           <div class="row">
                              <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                 <label for="input-firstname">First Name <span class="required-f">*</span></label>
                                 <input name="billing_first_name" value="" id="input-firstname" type="text" required>
                                 <div class="invalid-feedback">This is Required</div>
                              </div>
                              <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                 <label for="input-lastname">Last Name <span class="required-f">*</span></label>
                                 <input name="billing_last_name" value="" id="input-lastname" type="text" required>
                                 <div class="invalid-feedback">This is Required</div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                 <label for="input-email">E-Mail <span class="required-f">*</span></label>
                                 <input name="billing_email" value="" id="input-email" type="email">
                              </div>
                              <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                 <label for="input-telephone">Telephone <span class="required-f">*</span></label>
                                 <input name="billing_phone_number" value="" id="input-telephone" type="tel" required>
                                 <div class="invalid-feedback">This is Required</div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                 <label for="input-company">Address</label>
                                 <input name="billing_address_1" value="" id="input-company" type="text" required>
                                 <div class="invalid-feedback">This is Required</div>
                              </div>
                              <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                 <label for="input-address-1">Street <span class="required-f">*</span></label>
                                 <input name="billing_address_2" value="" id="input-address-1" type="text" required>
                                 <div class="invalid-feedback">This is Required</div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                 <label for="input-address-2">Landmark <span class="required-f">*</span></label>
                                 <input name="billing_landmark" value="" id="input-address-2" type="text" required>
                                 <div class="invalid-feedback">This is Required</div>
                              </div>
                              <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                 <label for="input-postcode">Pin Code <span class="required-f">*</span></label>
                                 <input name="billing_zip_code" value="" id="input-postcode" type="text" required>
                                 <div class="invalid-feedback">This is Required</div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                 <label for="country_id">Country <span class="required-f">*</span></label>
                                 <select name="country_id" id="country_id" name="billing_country" required>
                                 <option value="">Choose....</option>
                                    <?php 
                                       if(!empty($countries)):
                                          foreach($countries as $country):?> 
                                             <option value="<?= $country->id;?>"> <?= $country->name;?> </option> 
                                             <?php 
                                          endforeach;
                                       endif;
                                    ?>
                                 </select>
                                 <div class="invalid-feedback">This is Required</div>
                              </div>
                              <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                 <label for="states_id">Region / State <span class="required-f">*</span></label>
                                 <select name="billing_state" id="states_id" required >
                                 </select>
                                 <div class="invalid-feedback">This is Required</div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                 <label for="citys_id">City <span class="required-f">*</span></label>
                                 <select name="billing_city" id="citys_id" required>
                                 </select>
                                 <div class="invalid-feedback">This is Required</div>
                              </div>
                              <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                 <label for="adtype">Address Type:<span class="req"> *</span></label>
                                 <select class="form-control form-select validate" name="address_type">
                                    <option value="1" selected>Home</option>
                                    <option value="2">Office</option>
                                 </select>
                                 <div class="invalid-tooltip">This field is required</div>
                              </div>
                           </div>
                           <!-- <div class="row">
                              <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                 <div class="customCheckbox cart_tearm">
                                       <input type="checkbox" class="form-check-input" id="account" value="">
                                       <label for="account"><strong>Create an account ?</strong></label>
                                 </div>
                              </div>
                           </div> -->
                           <div class="row">
                              <div class="form-group col-md-12 col-lg-12 col-xl-12 mb-0">
                                 <label for="input-company">Order Notes <span class="required-f">*</span></label>
                                 <textarea class="form-control resize-both" name="addl_info" rows="3">Optional</textarea>
                              </div>
                           </div>
                        </div>
                     </fieldset>
                  <!-- </form> -->
               </div>
         </div>
         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
               <div class="your-order-payment">
                  <div class="your-order">
                     <h2 class="order-title mb-4">Your Order</h2>
                     <div class="table-responsive-sm order-table"> 
                           <table class="bg-white table table-bordered table-hover text-center">
                              <thead>
                                 <tr>
                                    <th class="text-start">Product Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                    if(!empty($cartitems)):
                                       $total =0;
                                       $totalshippinhg= 0;			
                                       foreach($cartitems as $item):
                                       $product = $this->product_model->get_product_by_id($item->product_id);
                                       $appended_variations = $this->cart_model->get_selected_variations($product->id)->str;
                                       if(!empty($item->variations) || $item->variations!='' || $item->variations!=null){
                                          $cartvariations=explode(',',$item->variations);
                                       }else{
                                          $cartvariations[]="";
                                       }
                                       array_filter($cartvariations);
                                       //print_r(array_filter($cartvariations));
                                       $object=$this->cart_model->get_product_price_and_stock($product,$cartvariations,$item->quantity);
                                 ?>
                                 <tr>
                                       <td class="text-start"><?= $product->title;?></td>
                                       <td><?= select_value_by_id('currencies','id',$product->currency_code,'hex');?> <?= $object->price_calculated;?></td>
                                       <td><?= $item->quantity;?></td>
                                       <td><?= select_value_by_id('currencies','id',$product->currency_code,'hex');?> <?= $object->price_calculated*$item->quantity;?></td>
                                 </tr>
                                 <?php 
                                    unset($cartvariations);
                                    $total += (int)$object->price_calculated * (int)$item->quantity;
                                    // $total+=$price;
                                    $currency=select_value_by_id('currencies','id',$product->currency_code,'hex');
                                    endforeach;  else:  
                                 ?>
                                 <div class="col-lg-12 col-md-6 mb-4 mb-lg-0">
                                    <p class="text-center">No Items in Cart</p>
                                 </div>
                                 <?php endif;?>
                              </tbody>
                              <tfoot class="font-weight-600">
                                 <tr>
                                       <td colspan="3" class="text-end">Shipping </td>
                                       <td>₹ 0.00</td>
                                 </tr>
                                 <tr>
                                       <td colspan="3" class="text-end">Total</td>
                                       <td><?= formatted_price($cart_total->total, $cart_total->currency);?></td>
                                 </tr>
                              </tfoot>
                           </table>
                     </div>
                  </div>

                  <hr>

                  <div class="your-payment">
                     <h2 class="payment-title mb-3">Payment Method</h2>
                     <div class="payment-method">
                        <div class="payment-accordion">
                           <?php //if ($this->payment_settings->square_enabled): ?>
                              <!-- <li style="list-style:none;">
                                 <div class="option-payment">
                                    <div class="list-left">
                                          <input type="radio" class="payment-way-input" id="option_razorpay" name="payment_option" value="square" required <?php //echo ($check_option == true) ? 'checked' : ''; ?>>
                                          <label class="ps-4" for="option_razorpay">
                                          <div class="payment-way-hd">Pay Now</div>
                                          <div class="payment-way-text">We accept all major credit and debit cards.</div>
                                          <div class="payment-way-image">
                                          <label for="option_razorpay">
                                          <img src="<?php //echo base_url(); ?>assets/admin/images/icon/paymant/visa.png" alt="visa" width="50">
                                          <img src="<?php //echo base_url(); ?>assets/admin/images/icon/paymant/discover.png" alt="mastercard" width="50">
                                          <img src="<?php //echo base_url(); ?>assets/admin/images/icon/paymant/american.png" alt="amex" width="50">
                                          <img src="<?php //echo base_url(); ?>assets/admin/images/icon/paymant/master-card.png" alt="maestro" width="50">
                                          <img src="<?php //echo base_url(); ?>assets/admin/images/icon/paymant/giro-pay.png" alt="diners" width="50">
                                          </label>
                                          </div>
                                       </label>
                                    </div>
                                    
                                 </div>
                              </li> -->
                           <?php //$check_option = false; endif; ?>
								
									<?php if ($this->auth_check == 1 && $this->payment_settings->cash_on_delivery_enabled): ?>
										<li style="list-style:none;">
											<div class="option-payment">
												<div class="list-left">
													<input type="radio" id="option_cash_on_delivery" name="payment_option" value="cash_on_delivery" required <?php echo ($check_option == true) ? 'checked' : ''; ?>>
                                       <label class="ps-4" for="option_cash_on_delivery">
                                          <div class="payment-way-hd">Cash On Delivery/Pay on Delivery</div>
                                          <div class="payment-way-text">We only collect the amount printed on the invoice.</div>
                                       </label>
                                    </div>
							            </div>
						            </li>
						         <?php endif; ?>
                        </div>
                        <?php if($this->auth_user->role == 'retailer'){ ?>
                        <h2 class="payment-title mb-3 mt-3">Distributer</h2>
                        <?php $dist = get_dristributer_data($this->auth_user->zip_code); $check_this = true; ?>
                        <li style="list-style:none;">
                           <div class="option-payment">
                              <?php foreach($dist as $destributer){ ?>
                              <div class="list-left">
                                 <input type="radio" id="option_cdistributer<?= $destributer->id; ?>" name="distributer_option" value="1" required <?php echo ($check_this == true) ? 'checked' : ''; ?>>
                                 <input type="hidden" name="dist_id" value="<?= $destributer->id; ?>">
                                 <label class="ps-4" for="option_cdistributer<?= $destributer->id; ?>">
                                    <div class="payment-way-hd"><?= $destributer->full_name; ?></div>
                                    <div class="payment-way-hd">Address - <?= $destributer->address; ?></div>
                                 </label>
                              </div>
                              <hr>
                              <?php $check_this = false; } ?>
                           </div>
                        </li>
                        <?php } ?>
                        <div class="order-button-payment">
                           <button type="submit" class="btn">Place order</button>
                        </div>
                     </div>
                  </div>
               </div>
         </div>
      </div>
      <!--End Main Content-->        
   </div>
   <?php echo form_close(); ?>
</div>