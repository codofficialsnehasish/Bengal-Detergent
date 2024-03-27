<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payroll extends Core_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->is_not_logged_in();
		$this->employee='employee';
		$this->users='users';
		$this->employee_qualification = 'employee_qualification';
		$this->salary_configuration = 'salary_configuration';
		$this->work_exprence = 'work_exprence';
		$this->bank = 'bank';
		$this->country = 'location_countries';
		$this->state = 'location_states';
		$this->city = 'location_cities';
		$this->view_path='employee_management/payslip/';
		$this->file_name = 'profile_picture';
		//$this->output->enable_profiler(TRUE);
	}

    public function index(){
        $header['pagecss']="contentCss";
		$header['title']='Create Payslip';
		$this->load->view('employee_management/partialss/header',$header);
		$data['allitems']=$this->select->select_single_data($this->users,'role','employee');
		$this->load->view($this->view_path.'payslip_list',$data);
		$script['pagescript']='contentScript';
		$this->load->view('employee_management/partialss/footer',$script);
    }


    public function create_payslip(){
        $header['pagecss']="contentCss";
		$header['title']='Create Payslip';
		$this->load->view('employee_management/partialss/header',$header);
		$designationdata = array(
			'tblName' => 'designation_master',
			'where' => array(
				'is_visible'=>1
			)
		);
		$data['designation']= $this->select->getResult($designationdata);
		$data['allitems']=$this->select->select_single_data($this->users,'role','employee');
		$this->load->view($this->view_path.'create_payslip',$data);
		$script['pagescript']='contentScript';
		$this->load->view('employee_management/partialss/footer',$script);
    }
}