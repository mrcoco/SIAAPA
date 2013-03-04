<?php

function myDate($dt,$f="d/m/Y H:i",$s=true){
	$day = array(
		1 => "Senin",
		2 => "Selasa",
		3 => "Rabu",
		4 => "Kamis",
		5 => "Jum'at",
		6 => "Sabtu",
		7 => "Minggu"
	);
	$ts = strtotime($dt);
	return ($s)?$day[date("N",$ts)].", ".date($f,$ts):date($f,$ts);
}

function getCI(){
	$CI =& get_instance();
	return $CI;
}

function get_umur() {
    return 'floor((time() - strtotime($dob)) / 31556926)';
}
//
//function modUri(){
//	$CI =getCI();
//	if($CI->jCfg['mod_rewrite'] == 0){
//		return base_url().'index.php/';
//	}else{
//		return base_url();
//	}
//}

//function get_aap_config($id=''){
////        if(trim($id)!=""){
//		$CI  = getCI();
//		$q = $CI->db->query("
//			select config_value from aap_config where config_name = '".dbClean($id)."'
//		")->row();
//		if(count($q)>0)
//			return $q->config_value;
//		else
//			return "-";
////	}else
////		return "-";
//}

function getGroup($id='',$design=false){
	$CI =getCI();
	$q = "select aag.* from aap_acl_user_group aaug
		  left join aap_acl_group aag on aag.id = aaug.group_id 
		  where 
		  	aaug.user_id = '".idClean($id)."' 
			AND aaug.app_id = '".$CI->jCfg['app_id']."' 
		  limit 1";
	$sql = $CI->db->query($q)->row();
	if($design==false){
		return count($sql)>0?$sql->group_name:'';
	}else{
		return count($sql)>0?$sql->group_template:'';
	}
}



/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
