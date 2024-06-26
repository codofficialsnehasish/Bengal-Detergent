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
				'register_by'=> $this->auth_user->full_name,
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
				'register_by'=> $this->auth_user->full_name,
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

    public function delete(){
        $id= $this->input->post('id');
		$configs = array(
			'tblName' => $this->attendance,
			'where' => array('id'=>$id)
		);
		$this->delete_model->emp_delete($configs);
		echo 'Deleted Successfully';
    }




	//========== for employee attendance from employee personal profile ==============

	public function emp_attendance(){
		$header['pagecss']="contentCss";
		$header['title']='Attendance';
		$this->load->view('admin/partials/header',$header);
        $data = [];
		$this->load->view($this->view_path.'emp_attendance',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);
	}

	// public function get_attendance_for_user(){
	// 	$attendanceData = $this->select->select_single_data('attendance_employee','user_id',$this->auth_user->id);
	// 	$formattedData = [];
    //     foreach ($attendanceData as $attendance) {
    //         $formattedData[] = array(
    //             'title' => $attendance->status == 'Check In' ? 'Check In' : 'Check Out',
    //             'start' => $attendance->date . 'T' . $attendance->time,
    //             'allDay' => false,
    //             'className' => $attendance->status == 'Check In' ? 'bg-success' : 'bg-danger'
    //         );
    //     }
	// 	echo json_encode($formattedData);
	// }

	////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////
	public function get_attendance_for_user() {
		$get_month = $this->uri->segment(2);
		if ($get_month && $get_month != date("m") && $get_month < date("m")) {
			$month = intval($get_month);
			if ($month >= 1 && $month <= 12) {
				$currentMonthStart = date('Y-' . sprintf('%02d', $month) . '-01');
				$endDate = date('Y-' . sprintf('%02d', $month) . '-t', strtotime($currentMonthStart));
			} else {
				$currentMonthStart = date('Y-m-01');
				// $endDate = date('Y-m-d');
				$endDate = date('Y-m-t');
			}
		} else {
			$currentMonthStart = date('Y-m-01');
			// $endDate = date('Y-m-d');
			$endDate = date('Y-m-t');
		}


		// $currentMonthStart = date('Y-m-01');
		// $endDate = date('Y-m-d');
		$currentDate = date('Y-m-d');
		$u_id = $this->auth_user->id;
		$formattedData = [];

		$currentDateTimestamp = strtotime($currentMonthStart);
		while ($currentDateTimestamp <= strtotime($endDate)) {
			$date = date('Y-m-d', $currentDateTimestamp);
	
			// $attendanceData = $this->select->select_single_data('attendance_employee', 'date', $date);
			$attendanceData = $this->select->custom_qry("SELECT * FROM attendance WHERE date = '$date' AND user_id = ".$u_id);
			$payroleHolidayData = $this->select->custom_qry("SELECT * FROM payroll_holiday WHERE '$date' BETWEEN start_date AND end_date");
			$weekliHolidayData = $this->select->select_single_data('weekly_holiday','wk_id',1);
			
			$is_holiday = false;
			if($weekliHolidayData){
				$weekdata = explode(',',$weekliHolidayData[0]->dayname); 
				foreach ($weekdata as $wholiday) {
					$current_day = date("l",$currentDateTimestamp);
					// $is_holiday = true;
					if($current_day == $wholiday){
						$formattedData[] = array(
							'title' => 'Weekend',
							'start' => $date,
							'allDay' => true,
							'className' => 'bg-dark'
						);
					}
				}
			}
			if($payroleHolidayData){
				foreach ($payroleHolidayData as $holiday) {
					$is_holiday = true;
					$formattedData[] = array(
						'title' => $holiday->holiday_name,
						'start' => $date,
						'allDay' => true,
						'className' => 'bg-primary'
					);
				}
			}
			if ($attendanceData) {
				$attendanceData = $attendanceData[0];
				if(!empty($attendanceData->check_in_time)){
					$formattedData[] = array(
						'title' => 'Check In',
						'start' => $attendanceData->date . 'T' . $attendanceData->check_in_time,
						'allDay' => false,
						'className' => 'bg-success'
					);
				}
				if(!empty($attendanceData->check_out_time)){
					$formattedData[] = array(
						'title' => 'Check Out',
						'start' => $attendanceData->date . 'T' . $attendanceData->check_out_time,
						'allDay' => false,
						'className' => 'bg-warning'
					);
				}
				// foreach ($attendanceData as $attendance) {
				// 	$formattedData[] = array(
				// 		'title' => $attendance->status == 'Check In' ? 'Check In' : 'Check Out',
				// 		'start' => $attendance->date . 'T' . $attendance->time,
				// 		'allDay' => false,
				// 		'className' => $attendance->status == 'Check In' ? 'bg-success' : 'bg-warning'
				// 	);
				// }
			}else {
				if ($date != $currentDate && $date < $currentDate && $is_holiday == false) {
					$leaveData = $this->select->custom_qry("SELECT * FROM leave_apply WHERE employee_id = '$u_id' AND '$date' BETWEEN apply_strt_date AND DATE_ADD(apply_strt_date, INTERVAL (num_aprv_day-1) DAY) AND status = 1");
					if ($leaveData) {
						foreach ($leaveData as $leave) {
							$formattedData[] = array(
								'title' => get_name("leave_type_master",$leave->leave_type_id),
								'start' => $date,
								'allDay' => true,
								'className' => 'bg-info'
							);
						}
					} else {
						$formattedData[] = array(
							'title' => 'Absent',
							'start' => $date,
							'allDay' => true,
							'className' => 'bg-danger'
						);
					}
				}
			}
			$currentDateTimestamp = strtotime('+1 day', $currentDateTimestamp);
		}
		echo json_encode($formattedData);
	}
	///////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////

	public function save_attendance(){
		$emp_id = $this->auth_user->id;
		$attendance_status = $this->input->post('title', true);
		$today_check_in_time = get_todays_check_in_time($emp_id);
		if(check_todays_attendance($emp_id) == 'Check In' && $attendance_status == 'Check Out'){
			$data=array(
				'check_out_time'=> date('H:i:s'),
				'check_out_location'=> $this->input->post('latitude', true).','.$this->input->post('longitude', true),
				'stay_time'=> getTimeDifference($today_check_in_time,date('H:i:s')),
				'status'=> $attendance_status,
				'register_by'=> $this->auth_user->full_name,
				'updated_at'=> $this->currentTime
			);
			$configs = array(
				'tblName' => $this->attendance,
				'data' => $data,
                'where' => array(
					'user_id'=>$emp_id,
					'date'=>date("Y-m-d")
				)
			);
			$update=$this->edit_model->emp_edit($configs);
		}else if($attendance_status == 'Check In' && check_todays_attendance($emp_id) != 'Check In'){
			$data=array(
				'user_id'=> $emp_id,
				'date'=> date("Y-m-d"),
				'check_in_time'=> date('H:i:s'),
				'check_in_location'=> $this->input->post('latitude', true).','.$this->input->post('longitude', true),
				'status'=> $attendance_status,
				'register_by'=> $this->auth_user->full_name,
				'created_at'=> $this->currentTime,
				'updated_at'=> $this->currentTime
			);
			$configs = array(
				'tblName' => $this->attendance,
				'data' => $data
			);
			$insert=$this->insert_model->emp_insert_data($configs);
		}else{
			echo json_encode('Sorry, You need to First Check In');
		}
	}
}