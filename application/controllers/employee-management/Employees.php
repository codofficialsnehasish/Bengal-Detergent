<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->employee='employee';
		$this->users='users';
		$this->employee_qualification = 'employee_qualification';
		$this->country = 'location_countries';
		$this->state = 'location_states';
		$this->city = 'location_cities';
		$this->view_path='employee_management/employee/';
		$this->file_name = 'profile_picture';
		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$header['pagecss']="contentCss";
		$header['title']='Role';
		$this->load->view('employee_management/partialss/header',$header);
		$data['allitems']=$this->select->select_single_data($this->users,'role','employee');
		$this->load->view($this->view_path.'content',$data);
		$script['pagescript']='contentScript';
		$this->load->view('employee_management/partialss/footer',$script);
	}
	public function add_new()
	{
		// $id=$this->uri->segment(3);
		// if(!empty($id)){
		// 	$inquiry_data = array(
		//         'tblName'=>'inquiry',
		//         'where'=> array(
		//             'id'=>$id
		//         )
		//     );
		// 	$dataitems = $this->select->getResult($inquiry_data);
		// 	$data['inquiry_data']= $dataitems[0];
		// }
		$header['pagecss']="";
		$header['title']='Add New Member';
		$this->load->view('employee_management/partialss/header',$header);
		
		$genderCon = array(
		        'tblName'=>'gender_master',
		        'where'=> array(
		                'is_visible'=>1
		            )
		    );
		$data['gender_master']= $this->select->getResult($genderCon);
		
		$medicalHistoryCon = array(
		        'tblName'=>'medical_history_master',
		        'where'=> array(
		                'is_visible'=>1
		            )
		    );
		$data['medical_history_master']= $this->select->getResult($medicalHistoryCon);

		$bloodGroupCon = array(
		        'tblName'=>'blood_group_master',
		        'where'=> array(
		                'is_visible'=>1
		            )
		    );
		$data['blood_group_master']= $this->select->getResult($bloodGroupCon);

		$maritialstatusCon = array(
		        'tblName'=>'marital_status_master',
		        'where'=> array(
		                'is_visible'=>1
		            )
		    );
		$data['marital_status_master']= $this->select->getResult($maritialstatusCon);

		$religionCon = array(
		        'tblName'=>'religion_master',
		        'where'=> array(
		                'is_visible'=>1
		            )
		    );
		$data['religion_master']= $this->select->getResult($religionCon);

		$nationalityCon = array(
		        'tblName'=>'nationality_master',
		        'where'=> array(
		                'is_visible'=>1
		            )
		    );
		$data['nationality_master']= $this->select->getResult($nationalityCon);
		
		
		$shiftCon = array(
		        'tblName'=>'shift_master',
		        'where'=> array(
		                'is_visible'=>1
		            )
		    );
		$data['shift_master']= $this->select->getResult($shiftCon);

		$countryConnections = array(
		        'tblName' => 'location_countries',
		        'where' => array(
		                'is_visible'=>1
		            )
		    );
		$data['countries']= $this->select->getResult($countryConnections);

		$designationdata = array(
			'tblName' => 'designation_master',
			'where' => array(
					'is_visible'=>1
				)
		);
		$data['designation']= $this->select->getResult($designationdata);

		$this->load->view($this->view_path.'add',$data);
		// $script['pagescript']='formScript';
		$script['pagescript']='memberScript';
		$this->load->view('employee_management/partialss/footer',$script);
	}


	public function process()
	{
		// print_r($this->input->post());
		$this->form_validation->set_rules('first_name', 'Title', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'first_name'=> $this->input->post('first_name', true),
				'middle_name'=> $this->input->post('middle_name', true),
				'last_name'=> $this->input->post('last_name', true),
				'phone_number'=> $this->input->post('phone_number', true),
				'official_phone_number'=> $this->input->post('home_phone_number', true),
				'email'=> $this->input->post('email', true),
				'gender'=> $this->input->post('gender', true),
				'dob'=> $this->input->post('dob', true),
				'nationality'=> $this->input->post('nationality', true),
				'religion'=> $this->input->post('religion', true),
				'marital_status'=> $this->input->post('marital_status', true),
				'blood_group'=> $this->input->post('blood_group', true),
				'aadhar_no'=> $this->input->post('aadhar_no', true),
				'pan_no'=> $this->input->post('pan_no', true),
				'country_id'=> $this->input->post('country_id', true),
				'state_id'=> $this->input->post('state_id', true),
				'city_id'=> $this->input->post('city_id', true),
				'zip_code'=> $this->input->post('zip_code', true),
				'address'=> $this->input->post('address', true),
				'pn_country_id'=> $this->input->post('pn_country_id', true),
				'pn_state_id'=> $this->input->post('pn_state_id', true),
				'pn_city_id'=> $this->input->post('pn_city_id', true),
				'pn_zip_code'=> $this->input->post('pn_zip_code', true),
				'pn_address'=> $this->input->post('pn_address', true),
				'role'=>'employee',
				'designation'=> $this->input->post('designation', true),
				'status'=>$this->input->post('status', true) == null ? 0 : $this->input->post('status', true),
				'created_at'=> $this->currentTime,
				'date_of_joining'=> date('Y-m-d')
			);
			if(!empty($data['middle_name'])){
				$data['full_name'] = $data['first_name'].' '.$data['middle_name'].' '.$data['last_name'];
			}else{
				$data['full_name'] = $data['first_name'].' '.$data['last_name'];
			}
			if(is_uploaded_file($_FILES['file']['tmp_name'])) 
			{  
				$data['user_image']=$this->mediaupload->doUpload('file');
			}
			$configs = array(
				'tblName' => $this->users,
				'data' => $data
			);
			$insert=$this->insert_model->emp_insert_data($configs);
			if($insert){
				$datas=array(
					'user_id'=>'EMP/BDP/'.strtoupper(remove_special_characters($this->input->post('first_name', true))).'/0'.$insert
				);
				$update=$this->edit_model->edit($datas,$insert,'id',$this->users);
				$this->session->set_flashdata('success', 'Data has been inserted successfully');
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', 'Query error');
		     	redirect($this->agent->referrer());
			}
		}
	}


	public function details(){
		$id=$this->uri->segment(4);
		$header['pagecss']="contentCss";
		$header['title']='Role';
		$this->load->view('employee_management/partialss/header',$header);
        $user=$this->auth_model->get_user_by_id($id);
		$data['user']=$user;

        $stateCon = array(
			'tblName'=>$this->state,
			'where'=> array(
					'country_id'=> $user->country_id
				)
		);
		$data['stateData']= $this->select->getResult($stateCon);

        $cityCon = array(
			'tblName'=>$this->city,
			'where'=> array(
					'state_id'=> $user->state_id
				)
		);
		$data['cityData']= $this->select->getResult($cityCon);


        $pmstateCon = array(
			'tblName'=>$this->state,
			'where'=> array(
					'country_id'=> $user->pn_country_id
				)
		);
		$data['pmstateData']= $this->select->getResult($pmstateCon);

        $pmcityCon = array(
			'tblName'=>$this->city,
			'where'=> array(
					'state_id'=> $user->pn_state_id
				)
		);
		$data['pmcityData']= $this->select->getResult($pmcityCon);


        $memberCon = array(
			'tblName'=>$this->users,
			'where'=> array(
				'id'=> $id
			)
		);
		$memberData= $this->select->getResult($memberCon);
		
		
        $data['member'] = $memberData[0];

		$genderCon = array(
			'tblName'=>'gender_master',
			'where'=> array(
					'is_visible'=>1
				)
		);
		$data['gender_master']= $this->select->getResult($genderCon);
		
		$medicalHistoryCon = array(
				'tblName'=>'medical_history_master',
				'where'=> array(
						'is_visible'=>1
					)
			);
		$data['medical_history_master']= $this->select->getResult($medicalHistoryCon);

		$bloodGroupCon = array(
				'tblName'=>'blood_group_master',
				'where'=> array(
						'is_visible'=>1
					)
			);
		$data['blood_group_master']= $this->select->getResult($bloodGroupCon);

		$maritialstatusCon = array(
				'tblName'=>'marital_status_master',
				'where'=> array(
						'is_visible'=>1
					)
			);
		$data['marital_status_master']= $this->select->getResult($maritialstatusCon);

		$religionCon = array(
				'tblName'=>'religion_master',
				'where'=> array(
						'is_visible'=>1
					)
			);
		$data['religion_master']= $this->select->getResult($religionCon);

		$nationalityCon = array(
				'tblName'=>'nationality_master',
				'where'=> array(
						'is_visible'=>1
					)
			);
		$data['nationality_master']= $this->select->getResult($nationalityCon);
		
		
		$shiftCon = array(
				'tblName'=>'shift_master',
				'where'=> array(
						'is_visible'=>1
					)
			);
		$data['shift_master']= $this->select->getResult($shiftCon);

		$countryConnections = array(
				'tblName' => 'location_countries',
				'where' => array(
						'is_visible'=>1
					)
			);
		$data['countries']= $this->select->getResult($countryConnections);
		
		$data['page_head'] = "Employee Details";
		$this->load->view($this->view_path.'details/content',$data);
		$script['pagescript']='employeeScript';
		$this->load->view('employee_management/partialss/footer',$script);
	}

	public function employee_profile(){
		$id = $this->uri->segment(4);
		$header['pagecss']="contentCss";
		$header['title']='Employee Profile';
		$this->load->view('employee_management/partialss/header',$header);
		$userdata=$this->select->select_single_data($this->users,'id',$id);
		$data['userdata']=$userdata[0];
		$this->load->view($this->view_path.'profile',$data);
		$script['pagescript']='contentScript';
		$this->load->view('employee_management/partialss/footer',$script);
	}


    /* Basic Info */
    public function basicinfo(){
		$this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean|max_length[200]');
		if($this->form_validation->run() == false) {
			$status = 0;
			$msg = validation_errors();
		}else{
			$data=array(
				'status'=> $this->input->post('status', true) == null ? 0 : $this->input->post('status', true),
				'first_name'=> $this->input->post('first_name', true),
				'middle_name'=> $this->input->post('middle_name', true),
				'last_name'=> $this->input->post('last_name', true),
				'gender'=> $this->input->post('gender', true),
				'user_id'=>'EMP/BDP/'.strtoupper(remove_special_characters($this->input->post('first_name', true))).'/0'.$this->input->post('user_id', true),
				'dob'=> $this->input->post('dob', true),
				'religion'=> $this->input->post('religion', true),
				'marital_status'=> $this->input->post('marital_status', true),
				'blood_group'=> $this->input->post('blood_group', true),
				'nationality'=> $this->input->post('nationality', true),
				'date_of_joining' => formated_date($this->input->post('date_of_joining', true),'Y-m-d'),
				'date_of_leaving' => formated_date($this->input->post('date_of_leaving', true),'Y-m-d'),
				'modified_at' => date("Y-m-d h:i:s")
			);
			if(!empty($data['middle_name'])){
				$data['full_name'] = $data['first_name'].' '.$data['middle_name'].' '.$data['last_name'];
			}else{
				$data['full_name'] = $data['first_name'].' '.$data['last_name'];
			}
			// print_r($data);
			$configs = array(
				'tblName' => $this->users,
				'data' => $data,
				'where' => array('id'=>$this->input->post('user_id', true))
			);
			$update=$this->edit_model->emp_edit($configs);
			if($update){
			    $status = 1;
			    $msg = 'Data has been updated successfully';
			}else{
			    $status = 0;
			    $msg = 'Query error';
			}
		}
		echo json_encode(array('status'=>$status,'msg'=>$msg));
	}

    public function contactinfo(){
		$this->form_validation->set_rules('email', 'Email', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$status = 0;
			$msg = validation_errors();
		}else{
			$data=array(
				'email'=> $this->input->post('email', true),
				'phone_number'=> $this->input->post('phone_number', true),
				'official_phone_number'=> $this->input->post('official_phone_number', true),
				'country_id'=> $this->input->post('country_id', true),
				'state_id'=> $this->input->post('state_id', true),
				'city_id'=> $this->input->post('city_id', true),
				'zip_code'=> $this->input->post('zip_code', true),
				'address'=> $this->input->post('address', true),
				'pn_country_id'=> $this->input->post('pn_country_id', true),
				'pn_state_id'=> $this->input->post('pn_state_id', true),
				'pn_city_id'=> $this->input->post('pn_city_id', true),
				'pn_zip_code'=> $this->input->post('pn_zip_code', true),
				'pn_address'=> $this->input->post('pn_address', true)
			);
			$configs = array(
				'tblName' => $this->users,
				'data' => $data,
				'where' => array('id'=>$this->input->post('user_id', true))
			);
			$update=$this->edit_model->emp_edit($configs);
			if($update){
			    $status = 1;
			    $msg = 'Data has been updated successfully';
			}else{
			    $status = 0;
			    $msg = 'Query error';
			}
		}
		echo json_encode(array('status'=>$status,'msg'=>$msg));
	}

	public function profilepicture(){	
		if(is_uploaded_file($_FILES['file']['tmp_name'])) 
		{    
			$data['user_image']=$this->mediaupload->doUpload('file');
			$configs = array(
				'tblName' => $this->users,
				'data' => $data,
				'where' => array('id'=>$this->input->post('user_id', true))
			);
			$update=$this->edit_model->emp_edit($configs);
			if($update){
				$this->session->set_flashdata('success', 'Data has been updated successfully');
            	redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', 'Query error');
            	redirect($this->agent->referrer());
			}
		}else{
			$this->session->set_flashdata('error', 'Same Image Given');
            	redirect($this->agent->referrer());
		}

		// $this->edit->emp_edit()
		// echo $this->mediaupload->doUpload($this->file_name);0
	}

	public function documentinfo(){
		$this->form_validation->set_rules('aadhar_no', 'Aadhar', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$status = 0;
			$msg = validation_errors();
		}else{
			$data=array(
				'aadhar_no'=> $this->input->post('aadhar_no', true),
				'pan_no'=> $this->input->post('pan_no', true),
			);
			if(is_uploaded_file($_FILES['pan_froof']['tmp_name'])) 
			{  
				$data['pan_proof']=$this->mediaupload->doUpload('pan_froof');
			}
			if(is_uploaded_file($_FILES['aadhar_proof']['tmp_name'])) 
			{  
				$data['aadhar_proof']=$this->mediaupload->doUpload('aadhar_proof');
			}
			$configs = array(
				'tblName' => $this->users,
				'data' => $data,
				'where' => array('id'=>$this->input->post('user_id', true))
			);
			$update=$this->edit_model->emp_edit($configs);
			if($update){
			    $status = 1;
			    $msg = 'Data has been updated successfully';
			}else{
			    $status = 0;
			    $msg = 'Query error';
			}
		}
		echo json_encode(array('status'=>$status,'msg'=>$msg));
	}

	public function qualificationinfo(){
		$this->form_validation->set_rules('qualification', 'Qualification', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$status = 0;
			$msg = validation_errors();
		}else{
			$data=array(
				'employee_id'=> $this->input->post('user_id', true),
				'qualification'=> $this->input->post('qualification', true),
				'board_university'=> $this->input->post('board_university', true),
				'subject'=> $this->input->post('subject', true),
				'passing_year'=> $this->input->post('passing_year', true),
				'percentage'=> $this->input->post('percentage', true),
			);
			$configs = array(
				'tblName' => $this->employee_qualification,
				'data' => $data
			);
			$update=$this->insert_model->emp_insert_data($configs);
			if($update){
			    $status = 1;
			    $msg = 'Data has been updated successfully';
			}else{
			    $status = 0;
			    $msg = 'Query error';
			}
		}
		echo json_encode(array('status'=>$status,'msg'=>$msg));
	}

	public function workexprenceinfo(){
		$this->form_validation->set_rules('name', 'Name', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$status = 0;
			$msg = validation_errors();
		}else{
			$data=array(
				'trainer_id'=> $this->input->post('trainer_id', true),
				'name'=> $this->input->post('name', true),
				'exp_year'=> $this->input->post('exp_year', true),
				'exp_months'=> $this->input->post('exp_months', true),
			);
			$configs = array(
				'tblName' => $this->work_exprence,
				'data' => $data
			);
			$update=$this->insert_model->insert_data($configs);
			if($update){
			    $status = 1;
			    $msg = 'Data has been updated successfully';
			}else{
			    $status = 0;
			    $msg = 'Query error';
			}
		}
		echo json_encode(array('status'=>$status,'msg'=>$msg));
	}

	public function achievementsinfo(){
		$this->form_validation->set_rules('prize_name', 'Prize_name', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$status = 0;
			$msg = validation_errors();
		}else{
			$data=array(
				'trainer_id'=> $this->input->post('trainer_id', true),
				'prize_name'=> $this->input->post('prize_name', true),
				'competition_name'=> $this->input->post('competition_name', true),
				'date'=> $this->input->post('date', true),
			);
			$configs = array(
				'tblName' => $this->achievements,
				'data' => $data
			);
			$update=$this->insert_model->insert_data($configs);
			if($update){
			    $status = 1;
			    $msg = 'Data has been updated successfully';
			}else{
			    $status = 0;
			    $msg = 'Query error';
			}
		}
		echo json_encode(array('status'=>$status,'msg'=>$msg));
	}

	public function bankinfo(){
		$this->form_validation->set_rules('bank_name', 'Bank_name', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$status = 0;
			$msg = validation_errors();
		}else{
			$data=array(
				'trainer_id'=> $this->input->post('trainer_id', true),
				'bank_name'=> $this->input->post('bank_name', true),
				'account_number'=> $this->input->post('account_number', true),
				'ifsc_code'=> $this->input->post('ifsc_code', true),
			);
			$configs = array(
				'tblName' => $this->bank,
				'data' => $data
			);
			$update=$this->insert_model->insert_data($configs);
			if($update){
			    $status = 1;
			    $msg = 'Data has been updated successfully';
			}else{
			    $status = 0;
			    $msg = 'Query error';
			}
		}
		echo json_encode(array('status'=>$status,'msg'=>$msg));
	}


	public function update_process()
	{
		$id=$this->uri->segment(3);
		$this->form_validation->set_rules('name', 'Title', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'name'=> $this->input->post('name', true),
				'is_visible'=> $this->input->post('is_visible', true),
				'created_at'=> $this->currentTime
			);
			$configs = array(
				'tblName' => $this->employee,
				'data' => $data,
				'where' => array('id'=>$id)
			);
			$update=$this->edit_model->edit($configs);
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
			'tblName' => $this->users,
			'where' => array('id'=>$id)
		);
		$this->delete_model->emp_delete($configs);
		echo 'Deleted Successfully';
	}

	public function getQualification(){
		$id = $this->input->post('id');
		$qualifications = array(
			'tblName'=>$this->employee_qualification,
			'where'=> array(
					'employee_id'=> $id
				)
		);
		$qualificationdata = $this->select->getResult($qualifications);
		$html = '';
		if(!empty($qualificationdata)){
			foreach($qualificationdata as $q){
				$html .= '<tr>';
				$html .= '<td>'. $q->qualification .'</td>';
				$html .= '<td>'. $q->board_university .'</td>';
				$html .= '<td>'. $q->subject .'</td>';
				$html .= '<td>'. $q->passing_year .'</td>';
				$html .= '<td>'. $q->percentage .'</td>';
				$html .= '<td><a class="btn btn-danger" onclick="delete_qualification(this.id);" id="'. $q->id .'"><i class="ti-trash"></i></a></td>';
				$html .= '</tr>';
			}
		}
		echo $html;
	}

	public function deleteQualification(){
		$id = $this->input->post('id');
		$configs = array(
			'tblName' => $this->employee_qualification,
			'where' => array('id'=>$id)
		);
		$delete = $this->delete_model->delete($configs);
		if($delete){
			$status = 1;
			$msg = 'Data has been deleted successfully';
		}else{
			$status = 0;
			$msg = 'Query error';
		}
		echo json_encode(array('status'=>$status,'msg'=>$msg));
	}
	
	public function getworkExprence(){
		$id = $this->input->post('id');
		$exprence = array(
			'tblName'=>$this->work_exprence,
			'where'=> array(
					'trainer_id'=> $id
				)
		);
		$exp = $this->select->getResult($exprence);
		$html = '';
		if(!empty($exp)){
			foreach($exp as $e){
				$html .= '<tr>';
				$html .= '<td>'. $e->name .'</td>';
				$html .= '<td>'. $e->exp_year .'</td>';
				$html .= '<td>'. $e->exp_months .'</td>';
				$html .= '<td><a class="btn btn-danger" onclick="delete_qualification(this.id);" id="'. $e->id .'"><i class="ti-trash"></i></a></td>';
				$html .= '</tr>';
			}
		}
		echo $html;
	}

	public function getachievements(){
		$id = $this->input->post('id');
		$achievements = array(
			'tblName'=>$this->achievements,
			'where'=> array(
					'trainer_id'=> $id
				)
		);
		$achiv = $this->select->getResult($achievements);
		$html = '';
		if(!empty($achiv)){
			foreach($achiv as $a){
				$html .= '<tr>';
				$html .= '<td>'. $a->prize_name .'</td>';
				$html .= '<td>'. $a->competition_name .'</td>';
				$html .= '<td>'. $a->date .'</td>';
				$html .= '<td><a class="btn btn-danger" id="'. $a->id .'"><i class="ti-trash"></i></a></td>';
				$html .= '</tr>';
			}
		}
		echo $html;
	}

	public function getbankaccounts(){
		$id = $this->input->post('id');
		$bank_data = array(
			'tblName'=>$this->bank,
			'where'=> array(
					'trainer_id'=> $id
				)
		);
		$bank = $this->select->getResult($bank_data);
		$html = '';
		if(!empty($bank)){
			foreach($bank as $a){
				$html .= '<tr>';
				$html .= '<td>'. $a->bank_name .'</td>';
				$html .= '<td>'. $a->account_number .'</td>';
				$html .= '<td>'. $a->ifsc_code .'</td>';
				$html .= '<td><a class="btn btn-danger" id="'. $a->id .'"><i class="ti-trash"></i></a></td>';
				$html .= '</tr>';
			}
		}
		echo $html;
	}

}
