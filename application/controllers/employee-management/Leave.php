<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave extends Core_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->payroll_holiday='payroll_holiday';
		$this->users='users';
		$this->weekly_holiday = 'weekly_holiday';
		$this->country = 'location_countries';
		$this->leave_apply = 'leave_apply';
		$this->state = 'location_states';
		$this->city = 'location_cities';
		$this->view_path='employee_management/leave/';
		$this->file_name = 'profile_picture';
		//$this->output->enable_profiler(TRUE);
		
	}


    public function weekly_holiday(){
        $header['pagecss']="contentCss";
		$header['title']='Weekly Holiday';
		$this->load->view('employee_management/partialss/header',$header);
		$data['allitems']=$this->select->select_table($this->weekly_holiday);
		$this->load->view($this->view_path.'weekly_holiday',$data);
		$script['pagescript']='contentScript';
		$this->load->view('employee_management/partialss/footer',$script);
    }

    public function update_weekly_holiday(){
        $id = $this->uri->segment(4);
        $header['pagecss']="contentCss";
		$header['title']='Weekly Holiday';
		$this->load->view('employee_management/partialss/header',$header);
		$item=$this->select->select_single_data($this->weekly_holiday,'wk_id',$id);
        $data['item'] = $item[0];
		$this->load->view($this->view_path.'edit_weekly_holiday',$data);
		$script['pagescript']='contentScript';
		$this->load->view('employee_management/partialss/footer',$script);
    }

    public function process_update_weekly_holiday(){
        $c = 0;
        $data = $this->input->post('dayname');
        $text = '';
        foreach($data as $d){
            if($c != 0){ $text .= ','; }
            $text .= $d;
            $c+=1;
        }

        $data=array(
            'dayname'=>$text,
        );
        $configs = array(
            'tblName' => $this->weekly_holiday,
            'data' => $data,
            'where' => array('wk_id'=>$this->input->post('wk_id', true))
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

    public function holiday(){
        $header['pagecss']="contentCss";
		$header['title']='Holiday';
		$this->load->view('employee_management/partialss/header',$header);
		$data['allitems']=$this->select->select_table($this->payroll_holiday,'id','asc');
		$this->load->view($this->view_path.'holiday',$data);
		$script['pagescript']='contentScript';
		$this->load->view('employee_management/partialss/footer',$script);
    }

    public function process_holiday(){
        // $date1_obj = DateTime::createFromFormat('d M, Y', $this->input->post('start_date', true));
        // $date1_new_format = $date1_obj->format('Y-m-d');

        // $date2_obj = DateTime::createFromFormat('d M, Y', $this->input->post('end_date', true));
        // $date2_new_format = $date2_obj->format('Y-m-d');

        $this->form_validation->set_rules('holiday_name', 'Holiday Name', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'holiday_name'=> $this->input->post('holiday_name', true),
				'start_date'=> $this->input->post('start_date', true),
				'end_date'=> $this->input->post('end_date', true),
				'no_of_days'=> $this->input->post('no_of_days', true),
				'created_by'=> $this->currentTime,
                'updated_by'=> $this->currentTime
			);
			$configs = array(
				'tblName' => $this->payroll_holiday,
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

	public function leave_application(){
        $header['pagecss']="contentCss";
		$header['title']='Leave Application';
		$this->load->view('employee_management/partialss/header',$header);
		$data['allitems']=$this->select->select_table($this->leave_apply,'leave_appl_id','asc');
		$data['allemployee']=$this->select->select_single_data($this->users,'role','employee');
		$data['allleavetype']=$this->select->select_table('leave_type_master','id','asc');
		$this->load->view($this->view_path.'leave_application',$data);
		$script['pagescript']='contentScript';
		$this->load->view('employee_management/partialss/footer',$script);
    }

	public function process_leave_application(){
        // $date1_obj = DateTime::createFromFormat('d M, Y', $this->input->post('start_date', true));
        // $date1_new_format = $date1_obj->format('Y-m-d');

        // $date2_obj = DateTime::createFromFormat('d M, Y', $this->input->post('end_date', true));
        // $date2_new_format = $date2_obj->format('Y-m-d');

        $this->form_validation->set_rules('employee_id', 'Employee', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('end_date', 'End Date', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$total_leave_type = get_pending_leave_type_of_employee($this->input->post('employee_id', true), $this->input->post('leave_type', true));
			$approved_leave = calculate_approved_leave($this->input->post('employee_id', true), $this->input->post('leave_type', true));
			$leave_type_name = get_name("leave_type_master",$this->input->post('leave_type', true));
			if(abs($total_leave_type-$approved_leave) < $this->input->post('no_of_days', true)){
				$masage = "You have only ".abs($total_leave_type - $approved_leave)." day ".$leave_type_name." avaliable";
				$this->session->set_flashdata('error', $masage);
		     	redirect($this->agent->referrer());
			}else{
				$data=array(
					'employee_id'=> $this->input->post('employee_id', true),
					'leave_type_id'=> $this->input->post('leave_type', true),
					'apply_strt_date'=> $this->input->post('start_date', true),
					'apply_end_date'=> $this->input->post('end_date', true),
					'apply_day'=> $this->input->post('no_of_days', true),
					'reason'=> $this->input->post('reason', true),
					'apply_date'=> date("Y-m-d"),
				);
				$configs = array(
					'tblName' => $this->leave_apply,
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
    }

	public function update_leave_status(){
		$id = $this->uri->segment(4); 
		$status = $this->uri->segment(5); 
		$data = array(
			'status'=>$this->uri->segment(5),
			'approved_by'=>$this->auth_user->full_name
		);
		// if($status == 1){
		// 	$data['approve_date'] = date("Y-m-d");
		// 	$data['num_aprv_day'] = date("Y-m-d");
		// }
		$edit_resp = $this->edit_model->edit($data,$id,'leave_appl_id ',$this->leave_apply);
		if($edit_resp){
			$this->session->set_flashdata('success', 'Status Updated Successfully');
			redirect($this->agent->referrer());
		}else{
			$this->session->set_flashdata('errors', 'Query error');
			redirect($this->agent->referrer());
		}
	}


	//======================= processing leave application ======================
	public function process_leave_approve(){
		$id = $this->input->post('leave_id');
		$data = array(
			'status'=>1,
			'approve_date'=>date("Y-m-d"),
			'num_aprv_day'=>$this->input->post('approved_days'),
			'approved_by'=>$this->auth_user->full_name
		);
		$edit_resp = $this->edit_model->edit($data,$id,'leave_appl_id ',$this->leave_apply);
		if($edit_resp){
			$this->session->set_flashdata('success', 'Status Updated Successfully');
			redirect($this->agent->referrer());
		}else{
			$this->session->set_flashdata('errors', 'Query error');
			redirect($this->agent->referrer());
		}
	}
	//======================= processing leave application ======================



	public function delete_leave_application(){
		$id = $this->uri->segment(4);
		$configs = array(
			'tblName' => $this->leave_apply,
			'where' => array('leave_appl_id'=>$id)
		);
		$this->delete_model->emp_delete($configs);
		$this->session->set_flashdata('success', 'Deleted Successfully');
		redirect($this->agent->referrer());
	}

	public function update_leave_application(){
		$id = $this->uri->segment(4);
        $header['pagecss']="contentCss";
		$header['title']='Edit Leave Application';
		$this->load->view('employee_management/partialss/header',$header);
		$items=$this->select->select_single_data($this->leave_apply,'leave_appl_id',$id);
		$data['item'] = $items[0];
		$data['allemployee']=$this->select->select_single_data($this->users,'role','employee');
		$data['allleavetype']=$this->select->select_table('leave_type_master','id','asc');
		$this->load->view($this->view_path.'edit_leave_application',$data);
		$script['pagescript']='contentScript';
		$this->load->view('employee_management/partialss/footer',$script);
    }

	public function process_update_leave_application(){
        // $date1_obj = DateTime::createFromFormat('d M, Y', $this->input->post('start_date', true));
        // $date1_new_format = $date1_obj->format('Y-m-d');

        // $date2_obj = DateTime::createFromFormat('d M, Y', $this->input->post('end_date', true));
        // $date2_new_format = $date2_obj->format('Y-m-d');

        $this->form_validation->set_rules('employee_id', 'Employee', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required|xss_clean|max_length[200]');
        $this->form_validation->set_rules('end_date', 'End Date', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'employee_id'=> $this->input->post('employee_id', true),
				'leave_type_id'=> $this->input->post('leave_type', true),
				'apply_strt_date'=> $this->input->post('start_date', true),
				'apply_end_date'=> $this->input->post('end_date', true),
				'apply_day'=> $this->input->post('no_of_days', true),
				'reason'=> $this->input->post('reason', true),
				'apply_date'=> date("Y-m-d"),
			);
			$configs = array(
				'tblName' => $this->leave_apply,
				'data' => $data,
				'where' => array('leave_appl_id'=>$this->input->post('leave_id', true))
			);
			$update=$this->edit_model->emp_edit($configs);
			if($update){
				$this->session->set_flashdata('success', 'Data has been Updated Successfully');
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', 'Query error');
		     	redirect($this->agent->referrer());
			}
		}
    }



	//========== for employee leave from employee personal profile ==============

	public function emp_leave(){
		$header['pagecss']="contentCss";
		$header['title']='Leave';
		$this->load->view('admin/partials/header',$header);
        $data['allitems']=$this->select->select_single_data($this->leave_apply,'employee_id',$this->auth_user->id);
		$data['allleavetype']=$this->select->select_table('leave_type_master','id','asc');
		$this->load->view($this->view_path.'emp_leave',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);
	}

	public function check_pending_leaves(){
		$emp_id = $this->input->post('emp_id');
		$leave_id = $this->input->post('leave');
		$leave = get_employee_total_leave($emp_id);
		$total_leave_type = get_pending_leave_type_of_employee($emp_id, $leave_id);
		$approved_leave = calculate_approved_leave($emp_id, $leave_id);
		$leave_type_name = get_name("leave_type_master",$leave_id);
		$masage = "You have ".abs($total_leave_type - $approved_leave)." ".$leave_type_name." avaliable, out of ".$total_leave_type;
		echo json_encode($masage);
	}

	//========== for employee leave from employee personal profile ==============
}