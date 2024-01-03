<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_target extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='sales_target';
		$this->view_path='admin/sales_terget/';
		//$this->output->enable_profiler(TRUE);
		
	}
    public function index()
	{
		$header['pagecss']="contentCss";
		$header['title']='Sales Target';
		$this->load->view('admin/partials/header',$header);
		$data['allitems']=$this->select->select_single_data($this->table_name,'is_visible',1);
		$this->load->view($this->view_path.'content',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);
	}
	public function add_new()
	{
		$header['pagecss']="";
		$header['title']='Add New Target';
		$this->load->view('admin/partials/header',$header);
		$data['salesman']=$this->select->custom_qry("select * from users where role='dristributor' and role='teamlead' and is_approved=1");
		$this->load->view($this->view_path.'add_new',$data);
		$script['pagescript']='productScript';
		$this->load->view('admin/partials/footer',$script);
	}
	public function process()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'user_id'=>$this->auth_user->id,
				'category_id'=>$this->input->post('cat_id', true),
				'subcategory_id'=>$this->input->post('subcat_id', true),
				'slug'=>$this->slug->create_unique_slug($this->input->post('name', true), $this->table_name ,'slug'),
				'short_desc'=>$this->input->post('short_desc', true),
         	    'description'=>$this->input->post('description', true),
           		'product_specification'=>$this->input->post('product_specification', true),
				'is_visible'=>$this->input->post('is_visible', true),
            	'is_featured'=>$this->input->post('is_featured', true),
				'title'=>$this->input->post('name', true),
				'is_draft '=> 0

			);

			// echo $data['size_chart'];

			$product_id=$this->insert_model->insert_data($data,$this->table_name);
			if($product_id){
				$this->session->set_flashdata('success', 'Data has been inserted successfully');
				$user_data = array(
                    'modesy_sess_product_id' => $product_id
                );
                $this->session->set_userdata($user_data);
				redirect('admin/products/price-details-edit/'.$product_id);
				//redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', 'Query error');
		     	redirect($this->agent->referrer());
			}
		}
	}
}