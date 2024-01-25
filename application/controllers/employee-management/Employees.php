<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->members='members';
		$this->users='users';
		$this->bodymeasurement='members_bodymeasurement';
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
		$data['allitems']=$this->select->select_table($this->members,'member_id','asc');
		$this->load->view($this->view_path.'content',$data);
		$script['pagescript']='contentScript';
		$this->load->view('employee_management/partialss/footer',$script);
	}
	public function add_new()
	{
		$id=$this->uri->segment(3);
		if(!empty($id)){
			$inquiry_data = array(
		        'tblName'=>'inquiry',
		        'where'=> array(
		            'id'=>$id
		        )
		    );
			$dataitems = $this->select->getResult($inquiry_data);
			$data['inquiry_data']= $dataitems[0];
		}
		$header['pagecss']="";
		$header['title']='Add New Member';
		$this->load->view('partials/header',$header);
		
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

		$this->load->view($this->view_path.'add',$data);
		$script['pagescript']='formScript';
		$this->load->view('partials/footer',$script);
	}


	public function process()
	{
		$this->form_validation->set_rules('name', 'Title', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$data=array(
				'first_name'=> $this->input->post('name', true),
				'is_visible'=> $this->input->post('is_visible', true),
				'created_at'=> $this->currentTime
			);
			$configs = array(
				'tblName' => $this->members,
				'data' => $data
			);
			$insert=$this->insert_model->insert_data($configs);
			if($insert){
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
			'tblName'=>$this->members,
			'where'=> array(
					'user_id'=> $id
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
		$script['pagescript']='memberScript';
		$this->load->view('employee_management/partialss/footer',$script);
	}


    /*
    Basic Info
    */

    public function basicinfo(){
		$this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$status = 0;
			$msg = validation_errors();
		}else{
			$data=array(
				////'user_id'=> $this->input->post('user_id', true),
			//	'dated'=> formated_date($this->input->post('dated', true),'Y-m-d'),
				'status'=> $this->input->post('status', true),
				'first_name'=> $this->input->post('first_name', true),
				'middle_name'=> $this->input->post('middle_name', true),
				'last_name'=> $this->input->post('last_name', true),
				'gender'=> $this->input->post('gender', true),
				'dob'=> $this->input->post('dob', true),
				'religion'=> $this->input->post('religion', true),
				'marital_status'=> $this->input->post('marital_status', true),
				'blood_group'=> $this->input->post('blood_group', true),
				'nationality'=> $this->input->post('nationality', true)
		    	//	'created_at'=> $this->currentTime
			);
			$configs = array(
				'tblName' => $this->users,
				'data' => $data,
				'where' => array('id'=>$this->input->post('user_id', true))
			);
			$update=$this->edit_model->edit($configs);
			if($update){
			    $dta = array(
				    'date_of_joining'=> formated_date($this->input->post('date_of_joining', true),'Y-m-d'),
				    'shift_id'=> $this->input->post('shift_id', true)
				    );
				if(!empty($this->input->post('date_of_leaving', true))){
				    $dta['date_of_leaving'] = formated_date($this->input->post('date_of_leaving', true),'Y-m-d');
				}

			    $mconfigs = array(
				'tblName' => $this->members,
				'data' => $dta,
				'where' => array('user_id'=>$this->input->post('user_id', true)));
			     $this->edit_model->edit($mconfigs);

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
			$update=$this->edit_model->edit($configs);
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
		echo $this->mediaupload->doUpload($this->file_name);
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
				'tblName' => $this->members,
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
			'tblName' => $this->members,
			'where' => array('id'=>$id)
		);
		$this->delete_model->delete($configs);
		echo 'Deleted Successfully';
	}

}
