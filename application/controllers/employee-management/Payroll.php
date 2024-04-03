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
	}

    public function index(){
        $header['pagecss']="contentCss";
		$header['title']='Create Payslip';
		$this->load->view('employee_management/partialss/header',$header);
		$data['allitems']=$this->select->select_table('payroll_payslip','id','desc');
		$this->load->view($this->view_path.'payslip_list',$data);
		$script['pagescript']='contentScript';
		$this->load->view('employee_management/partialss/footer',$script);
    }


    public function create_payslip(){
        $header['pagecss']="contentCss";
		$header['title']='Create Payslip';
		$this->load->view('employee_management/partialss/header',$header);
		$designationdata = array(
			'tblName' => 'role',
			'where' => array(
				'is_visible'=>1
			)
		);
		$data['designation']= $this->select->getResult($designationdata);
		$data['allitems']=$this->select->select_single_data($this->users,'role','employee');
		$this->load->view($this->view_path.'create_payslip',$data);
		// $script['pagescript']='contentScript';
		$script['pagescript']='payrollScript';
		$this->load->view('employee_management/partialss/footer',$script);
    }

	public function employee_according_designation(){
		$role_id = $this->input->post('designation_id',true);
		// $conditions['tblName'] = 'users';
		// $conditions['where'] = array('designation'=>$this->input->post('designation_id'));
		// $conditions['is_visible'] = 1;
		$result = $this->select->select->custom_qry("SELECT users.* FROM users LEFT JOIN user_role on users.id = user_role.user_id WHERE user_role.role_id = ".$role_id);
		echo json_encode($result);
	}

	public function get_salary_config_by_employee_id(){
		$conditions['tblName'] = 'salary_configuration';
		$conditions['where'] = array('user_id'=>$this->input->post('emp_id'));
		$result = $this->select->select->getResult($conditions);
		echo json_encode($result);
	}

	public function check_employee_payslip_created_or_not(){
		$date_str = explode('-',$this->input->post('salary_month', true));
		$emp_id = $this->input->post('empid');
		$q = "SELECT * FROM `payroll_payslip` WHERE employee_id = '$emp_id' and salary_month = '$date_str[1]' AND salary_year = '$date_str[0]'";
		$result = $this->select->select->custom_qry($q);
		if(!empty($result[0])){
			echo json_encode("Payslip is created at ".$result[0]->created_at);
		}
		else{
			echo json_encode('');
		}
	}

	public function create_pay_slip(){
		$this->form_validation->set_rules('employee', 'Employee', 'required|xss_clean|max_length[200]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('errors', validation_errors());
			//$this->session->set_flashdata('form_data', $this->auth_model->input_values());
			redirect($this->agent->referrer());
		}else{
			$date_str = explode('-',$this->input->post('salary_date', true));
			$data=array(
				'employee_id'=> $this->input->post('employee', true),
				'salary_month'=> $date_str[1],
				'salary_year'=> $date_str[0],
				'basic_pay'=> $this->input->post('base_salary', true),
				'pf_pay'=> $this->input->post('provident_fund', true),
				'health_insurance_pay'=> $this->input->post('health_insurance', true),
				'income_tax_pay'=> $this->input->post('income_tax', true),
				'other_deductions_pay'=> $this->input->post('other_deductions', true),
				'bonas_pay'=> $this->input->post('bonas', true),
				'net_salary_pay'=> $this->input->post('net_salary_pay', true),
				'payment_method'=> $this->input->post('payment_method', true),
				'status'=> $this->input->post('status', true),
				'comments'=> $this->input->post('comments', true),
				'created_at'=> date('Y-m-d H:i:s')
			);
			$configs = array(
				'tblName' => 'payroll_payslip',
				'data' => $data
			);
			$insert=$this->insert_model->emp_insert_data($configs);
			if($insert){
				$this->session->set_flashdata('success', 'Payslip Created Successfully');
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('errors', 'Query error');
		     	redirect($this->agent->referrer());
			}
		}
	}

	public function payslip(){
		$id = $this->uri->segment(4);
		$header['pagecss']="contentCss";
		$header['title']='Employee Profile';
		// $this->load->view('employee_management/partialss/header',$header);
		$userdata=$this->select->select_single_data('payroll_payslip','id',$id);
		$data['paydata']=$userdata[0];
		$this->load->view($this->view_path.'payslip',$data);
		// $script['pagescript']='contentScript';
		// $this->load->view('employee_management/partialss/footer',$script);
	}

	public function delete(){
		$id= $this->input->post('id');
		$configs = array(
			'tblName' => 'payroll_payslip',
			'where' => array('id'=>$id)
		);
		$this->delete_model->emp_delete($configs);
		echo 'Deleted Successfully';
	}




	//========== for employee payslip from employee personal profile ==============

	public function emp_payslip(){
		$header['pagecss']="contentCss";
		$header['title']='Leave';
		$this->load->view('admin/partials/header',$header);
        $data['allitems']=$this->select->select_single_data('payroll_payslip','employee_id',$this->auth_user->id);
		$this->load->view($this->view_path.'emp_payslip',$data);
		$script['pagescript']='contentScript';
		$this->load->view('admin/partials/footer',$script);
	}

	//========== for employee payslip from employee personal profile ==============
}