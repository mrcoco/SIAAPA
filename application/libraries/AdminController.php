<?php
class AdminController extends My_Controller{
    function __construct(){  

		parent::__construct();
    }
    
    function getCI(){
	$CI =& get_instance();
	return $CI;
    }
    
//    function get_aap_config($id=''){
//        if(trim($id)!=""){
//		$CI  = getCI();
//		$q = $CI->db->query("
//			select config_value from aap_config where config_name = '".dbClean($id)."'
//		")->row();
//		if(count($q)>0)
//			return $q->config_value;
//		else
//			return "-";
//	}else
//		return "-";
//    }
}




/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
