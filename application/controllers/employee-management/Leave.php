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
        $date1_obj = DateTime::createFromFormat('d M, Y', $this->input->post('start_date', true));
        $date1_new_format = $date1_obj->format('Y-m-d');

        $date2_obj = DateTime::createFromFormat('d M, Y', $this->input->post('end_date', true));
        $date2_new_format = $date2_obj->format('Y-m-d');

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
}