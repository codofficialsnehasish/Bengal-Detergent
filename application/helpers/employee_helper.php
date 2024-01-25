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