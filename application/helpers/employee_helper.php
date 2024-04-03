<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

// Employee Management Url
if (!function_exists('employee_url')) {
    function employee_url($str="")
    {
        return base_url() . 'employee-management/'.$str;
    }
}

//active menu
if (!function_exists('emp_active_menu')) {
    function emp_active_menu($val)
    {
        $ci =& get_instance();
        return $ci->uri->segment(3)==$val?'mm-active':'';
    }
}

//active link
if (!function_exists('emp_active_link')) {
    function emp_active_link($val)
    {
        $ci =& get_instance();
        return $ci->uri->segment(3)==$val?'active':'';
    }
}

//tab active link
if (!function_exists('emp_tab_active')) {
    function emp_tab_active($val)
    {
        $ci =& get_instance();
        return $ci->uri->segment(3)==$val?'active':'';
    }
}

// Get User Data By Id
if (!function_exists('get_user_data')) {
    function get_user_data($user_id)
    {
        $ci =& get_instance();
        $result= $ci->select->custom_qry("select * from users where id=".$user_id."");
        return $result[0];
    }
}

// Get Name by table name and id
if(!function_exists('get_name')) {
    function get_name($table_name,$id){
        $id = !empty($id) ? $id : 0;
        $ci =& get_instance();
        $result= $ci->select->custom_qry("select name from ".$table_name." where id=".$id."");
        if(!empty($result)){
            return $result[0]->name;
        }else{
            return '';
        }
    }
}


//Include javascript
if (!function_exists('PageSpecScriptEmp')) {
    function PageSpecScriptEmp($page=""){
	if($page!=''){
		$ci =& get_instance();
		return $ci->load->view('employee_management/pagescript/'.$page);
		}else{
			return null;
		}
    }
}
//Include css
if (!function_exists('PageSpecCssEmp')) {
    function PageSpecCssEmp($page=""){
	if($page!=''){
	$ci =& get_instance();
	return $ci->load->view('employee_management/pagecss/'.$page);
	}
	else{
		return null;
	}
    }
}

//print date
if (!function_exists('formated_date')) {
    function formated_date($datetime,$format='jS M, Y')
    {
		$d=date_create($datetime);
		$date= date_format($d,$format);
    	$formatedDate=	str_replace("th","<sup>th</sup>",$date);
        $formatedDate=	str_replace("st","<sup>st</sup>",$date);
        $formatedDate=	str_replace("rd","<sup>rd</sup>",$date);
        $formatedDate=	str_replace("nd","<sup>nd</sup>",$date);
		return $formatedDate;
    }
}

if(!function_exists('get_employee_designation')){
    function get_employee_designation($emp_id){
        $ci =& get_instance();
        // $ci->db->select('designation');
        // $ci->db->from('users');
        // $ci->db->where('users.id', $emp_id);

        $ci->db->select('role_id');
        $ci->db->from('user_role');
        $ci->db->where('user_id', $emp_id);
        $query = $ci->db->get();
        $result = $query->row();

        if ($result) {
            return $result->role_id;
        } else {
            return null;
        }
    }
}

if(!function_exists('get_employee_total_leave')){
    function get_employee_total_leave($emp_id){
        $des_id = get_employee_designation($emp_id);
        $ci =& get_instance();
        $ci->db->select_sum('no_of_days', 'total_leave');
        $ci->db->from('leave_according_designation');
        $ci->db->where('designation_id', $des_id);
        $query = $ci->db->get();
        $result = $query->row();
        return $result->total_leave;
    }
}

if(!function_exists('get_pending_leave_type_of_employee')){
    function get_pending_leave_type_of_employee($emp_id,$leave_id){
        $des_id = get_employee_designation($emp_id);
        $ci =& get_instance();
        $ci->db->select_sum('no_of_days', 'pending_leave');
        $ci->db->from('leave_according_designation');
        $ci->db->where('designation_id', $des_id);
        $ci->db->where('leave_id', $leave_id);
        $query = $ci->db->get();
        $result = $query->row();
        return $result->pending_leave;
    }
}

if(!function_exists('calculate_approved_leave')){
    function calculate_approved_leave($emp_id, $leave_id){
        $ci =& get_instance();
        $ci->db->select_sum('num_aprv_day', 'total_approve_leave');
        $ci->db->from('leave_apply');
        $ci->db->where('employee_id', $emp_id);
        $ci->db->where('leave_type_id', $leave_id);
        $query = $ci->db->get();
        $result = $query->row();
        return $result->total_approve_leave;
    }
}

if(!function_exists('check_todays_attendance')){
    function check_todays_attendance($emp_id){
        $ci =& get_instance();
        $ci->db->select('status');
        $ci->db->from('attendance_employee');
        $ci->db->where('user_id', $emp_id);
        $ci->db->where('date', 'CURDATE()', false);
        $ci->db->order_by('date', 'desc');
        $ci->db->limit(1);
        $query = $ci->db->get();
        $result = $query->row();

        if ($result) {
            return $result->status;
        } else {
            return "null";
        }
    }
}

if (!function_exists('check_permission')) {
    function check_permission($role_id,$module_id,$fieldName)
    {
        $ci =& get_instance();
        $result= $ci->select->custom_qry("select * from role_permission  where role_id=".$role_id." and fk_module_id=".$module_id);
        if(!empty($result)){
         if($result[0]->$fieldName == 1){
            return "checked";
         }else{
            return "";
         }
         }else{
             return '';
         }
     }
}