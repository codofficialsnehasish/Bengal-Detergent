<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends Core_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->employee='employee';
        $this->attendance='attendance';
		$this->users='users';
		$this->view_path='employee_management/attendance/';
		
	}

    public function add_attendance(){
        $header['pagecss']="contentCss";
		$header['title']='Add Attendance';
		$this->load->view('employee_management/partialss/header',$header);
		$data['all_employee']=$this->select->select_single_data($this->users,'role','employee');
		$this->load->view($this->view_path.'add_attendance',$data);
		$script['pagescript']='contentScript';
		$this->load->view('employee_management/partialss/footer',$script);
    }

    public function process_add_attendance(){
        // print_r($this->input->post());
		$this->form_validation->set_rules('employee_id', 'Employee', 'required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('date', 'Date', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect($this->agent->referrer());
		}else{
            $start_datetime = new DateTime($this->input->post('check_in_time', true));
            $end_datetime = new DateTime($this->input->post('check_out_time', true));
            $time_diff = $start_datetime->diff($end_datetime);
            $stay_time = $time_diff->format('%h:%i:%s');

            $date1_obj = DateTime::createFromFormat('d M, Y', $this->input->post('date', true));
            $date1_new_format = $date1_obj->format('Y-m-d');
			$data=array(
				'user_id'=> $this->input->post('employee_id', true),
				'date'=> $date1_new_format,
				'check_in_time'=> $this->input->post('check_in_time', true),
				'check_in_location'=> $this->input->post('latitude', true).','.$this->input->post('longitude', true),
				'check_out_time'=> $this->input->post('check_out_time', true),
				'check_out_location'=> $this->input->post('latitude', true).','.$this->input->post('longitude', true),
				'stay_time'=> $stay_time,
				'status'=> $this->input->post('status', true),
				'register_by'=> $this->auth_user->role,
				'updated_at'=> $this->currentTime
			);
			$configs = array(
				'tblName' => $this->attendance,
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

    public function today_log(){
        $header['pagecss']="contentCss";
		$header['title']='Today Log';
		$this->load->view('employee_management/partialss/header',$header);
		$data['all_attendance']=$this->select->select_single_data($this->attendance,'date',date('Y-m-d'));
		$this->load->view($this->view_path.'today_log',$data);
		$script['pagescript']='contentScript';
		$this->load->view('employee_management/partialss/footer',$script);
    }

    public function attendance_list(){
        $header['pagecss']="contentCss";
		$header['title']='Attendance List';
		$this->load->view('employee_management/partialss/header',$header);
		$data['all_attendance']=$this->select->select_table($this->attendance,'date','desc');
		$this->load->view($this->view_path.'attendance_list',$data);
		$script['pagescript']='contentScript';
		$this->load->view('employee_management/partialss/footer',$script);
    }

    public function edit_attendance(){
        $id = $this->uri->segment(4);
        $header['pagecss']="contentCss";
		$header['title']='Edit Attendance';
		$this->load->view('employee_management/partialss/header',$header);
        $data['all_employee']=$this->select->select_single_data($this->users,'role','employee');
		$sliderArray=$this->select->select_single_data($this->attendance,'id',$id);
		$data['item']=$sliderArray[0];
		$this->load->view($this->view_path.'edit_attendance',$data);
		$script['pagescript']='contentScript';
		$this->load->view('employee_management/partialss/footer',$script);
    }

    public function process_edit_attendance(){
        $this->form_validation->set_rules('employee_id', 'Employee', 'required|xss_clean|max_length[200]');
		$this->form_validation->set_rules('date', 'Date', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect($this->agent->referrer());
		}else{
            $start_datetime = new DateTime($this->input->post('check_in_time', true));
            $end_datetime = new DateTime($this->input->post('check_out_time', true));
            $time_diff = $start_datetime->diff($end_datetime);
            $stay_time = $time_diff->format('%h:%i:%s');

            $date1_obj = DateTime::createFromFormat('d M, Y', $this->input->post('date', true));
            $date1_new_format = $date1_obj->format('Y-m-d');
			$data=array(
				'user_id'=> $this->input->post('employee_id', true),
				'date'=> $date1_new_format,
				'check_in_time'=> $this->input->post('check_in_time', true),
				'check_out_time'=> $this->input->post('check_out_time', true),
				'stay_time'=> $stay_time,
				'status'=> $this->input->post('status', true),
				'register_by'=> $this->auth_user->role,
				'updated_at'=> $this->currentTime
			);
			$configs = array(
				'tblName' => $this->attendance,
				'data' => $data,
                'where' => array('id'=>$this->input->post('id', true))
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

    public function delete_attendance(){
        
    }
}