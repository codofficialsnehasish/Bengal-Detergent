<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave_in_designation extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->table_name='leave_according_designation';
		$this->view_path='employee_management/master_data_manage/leave_in_designation/';
	}

	public function index()
	{
		$header['pagecss']="contentCss";
		$header['title']='Leave for Designation';
		$this->load->view('employee_management/partialss/header',$header);
		$data['allitems']=$this->select->select_table($this->table_name,'id','asc');
		$this->load->view($this->view_path.'content',$data);
		$script['pagescript']='contentScript';
		$this->load->view('employee_management/partialss/footer',$script);
	}
	public function add_new()
	{
		$header['pagecss']="";
		$header['title']='Asign Leave for Designation';
		$this->load->view('employee_management/partialss/header',$header);
		$data['designation']=$this->select->select_table('role','id','asc');
		$data['leave_type']=$this->select->select_table('leave_type_master','id','asc');
		$this->load->view($this->view_path.'add',$data);
		$script['pagescript']='formScript';
		$this->load->view('employee_management/partialss/footer',$script);
	}


	public function process()
	{
		$this->form_validation->set_rules('designation_id', 'Designation', 'required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('leave_id', 'Leave', 'required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('no_of_days', 'No of Days', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'designation_id'=> $this->input->post('designation_id', true),
				'leave_id'=> $this->input->post('leave_id', true),
				'no_of_days'=> $this->input->post('no_of_days', true),
				'created_at'=> $this->currentTime
			);
			$configs = array(
				'tblName' => $this->table_name,
				'data' => $data
			);
			$insert=$this->insert_model->emp_insert_data($configs);
			if($insert){
				$this->session->set_flashdata('success', 'Data has been inserted successfully');
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', 'Query error');
		     	redirect($this->agent->referrer());
			}
		}
	}

	public function edit()
	{
		$id=$this->uri->segment(5);
		$header['pagecss']="";
		$header['title']='Edit Leave for Designation';
		$this->load->view('employee_management/partialss/header',$header);
		$categoryArray=$this->select->select_single_data($this->table_name,'id',$id);
		$data['designation']=$this->select->select_table('role','id','asc');
		$data['leave_type']=$this->select->select_table('leave_type_master','id','asc');
		$data['item']=$categoryArray[0];
		$this->load->view($this->view_path.'edit',$data);
		$script['pagescript']='formScript';
		$this->load->view('employee_management/partialss/footer',$script);
	}

	public function update_process()
	{
		$id=$this->uri->segment(5);
		$this->form_validation->set_rules('designation_id', 'Designation', 'required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('leave_id', 'Leave', 'required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('no_of_days', 'No of Days', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'designation_id'=> $this->input->post('designation_id', true),
				'leave_id'=> $this->input->post('leave_id', true),
				'no_of_days'=> $this->input->post('no_of_days', true),
				'created_at'=> $this->currentTime
			);
			$configs = array(
				'tblName' => $this->table_name,
				'data' => $data,
				'where' => array('id'=>$id)
			);
			$update=$this->edit_model->emp_edit($configs);
			if($update){
				$this->session->set_flashdata('success', 'Data has been updated successfully');
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', 'Query error');
		     	redirect($this->agent->referrer());
			}
		}
	}


	public function delete(){
		$id= $this->input->post('id');
		$configs = array(
			'tblName' => $this->table_name,
			'where' => array('id'=>$id)
		);
		$this->delete_model->emp_delete($configs);
		echo 'Deleted Successfully';
	}

}
