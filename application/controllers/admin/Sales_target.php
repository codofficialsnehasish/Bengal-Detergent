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
		$data['allitems']=$this->select->select_table($this->table_name,'id','asc');
		$this->load->view($this->view_path.'content',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);
	}
	public function add_new()
	{
		$header['pagecss']="";
		$header['title']='Add New Target';
		$this->load->view('admin/partials/header',$header);
		$data['dristributer']=$this->select->custom_qry("select * from users where role='dristributor' and is_approved=1 order by full_name asc");
		$data['teamleader']=$this->select->custom_qry("select * from users where role='employee' and is_approved=1");
		$data['gift']=$this->select->custom_qry("select * from gift where is_visible=1");
		$data['products']=$this->select->custom_qry("select * from products where is_draft=0 and is_visible=1");
		$this->load->view($this->view_path.'add_new',$data);
		$script['pagescript']='productScript';
		$this->load->view('admin/partials/footer',$script);
	}
	public function process()
	{
		$s_man = $this->input->post('salesman', true);
		// $pduct = implode(",",$this->input->post('perticilar_product', true));
		foreach($s_man as $data){
			$data=array(
				'month'=>$this->input->post('month', true),
				'start_date'=>$this->input->post('start_date', true),
				'end_date'=>$this->input->post('end_date', true),
				'salesman_id'=>$data,
				'terget_amount'=>$this->input->post('terget_amount', true),
				'gift'=>$this->input->post('gift', true),
				'is_visible'=>$this->input->post('is_visible', true),
				'massage'=>$this->input->post('massage', true),
				// 'perticilar_product'=>$pduct,
			);
			$product_id=$this->insert_model->insert_data($data,$this->table_name);
		}
		if($product_id){
			$this->session->set_flashdata('success', 'Data has been inserted successfully');
			redirect($this->agent->referrer());
		}else{
			$this->session->set_flashdata('errors', 'Query error');
			redirect($this->agent->referrer());
		}
	}

	public function edit()
	{
		$id=$this->uri->segment(4);
		$header['pagecss']="";
		$header['title']='Edit Target';
		$this->load->view('admin/partials/header',$header);
		$data['dristributer']=$this->select->custom_qry("select * from users where role='dristributor' and is_approved=1 order by full_name asc");
		$data['teamleader']=$this->select->custom_qry("select * from users where role='employee' and is_approved=1");
		$data['gift']=$this->select->custom_qry("select * from gift where is_visible=1");
		$data['products']=$this->select->custom_qry("select * from products where is_draft=0 and is_visible=1");
		$s_target=$this->select->select_single_data($this->table_name,'id',$id);
		$data['item']=$s_target[0];
		$this->load->view($this->view_path.'edit',$data);
		$script['pagescript']='formScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function update_process()
	{
		$id=$this->uri->segment(4);
		$data=array(
			'month'=>$this->input->post('month', true),
			'start_date'=>$this->input->post('start_date', true),
			'end_date'=>$this->input->post('end_date', true),
			'salesman_id'=>$this->input->post('salesman', true),
			'terget_amount'=>$this->input->post('terget_amount', true),
			'gift'=>$this->input->post('gift', true),
			'is_visible'=>$this->input->post('is_visible', true),
			'massage'=>$this->input->post('massage', true),
			// 'perticilar_product'=>$this->input->post('perticilar_product', true),
		);
		$update=$this->edit_model->edit($data,$id,'id',$this->table_name);
		if($update){
			$this->session->set_flashdata('success', 'Data has been updated successfully');
			redirect($this->agent->referrer());
		}else{
			$this->session->set_flashdata('errors', 'Query error');
			redirect($this->agent->referrer());
		}
	}

	public function delete(){
		$id= $this->input->post('id');
		$this->delete_model->delete($this->table_name,'id',$id);
		echo 'Deleted Successfully';
	}
}