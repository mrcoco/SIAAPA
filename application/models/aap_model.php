<?php

class Aap_model extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}
	
	// Fungsi Model General
        function aap_view($url="")
        {
            $r=array(
		"id_menu"       => "N/A",
		"title_menu"    => "N/A",
                "url_menu"      => "N/A",
                "parent_menu"   => "N/A",
                "show_menu"     => "0"
            ); 
            if(trim($cfg)!=""){
		$q = $this->db->query("
				select * from aap_menu
				where url = '".$url."'
		")->row();
		if(count($q) > 0){
                    $r=array(
			"id_menu"       => $q->id,
                        "title_menu"    => $q->title,
                        "url_menu"      => $q->url,
                        "parent_menu"   => $q->is_parent,
                        "show_menu"     => $q->show_menu
                    ); 
		}
            }
            return $r;            
        }
        
        function view_access($id_menu="")
        {
            $r=array(
                "id_group_menus"     => 0
            ); 
            if(trim($cfg)!=""){
		$q = $this->db->query("
				select * from aap_group_menus,
				where aap_menu_id = '".$id_menu."'
                                and aap_groups_id = '".$this->dx_auth->groupid_saya()."'
		")->row();
		if(count($q) > 0){
                    $r=array(
			"id_group_menus"       => $q->id
                    ); 
		}
            }
            return $r;            
        }
        
        //Menetukan Config yang sudah di tentukan 
        function aap_config($cfg="")
        {
		$r=array(
			"cfg_value"     => "N/A",
			"cfg_desc"      => "N/A",
                        "cfg_status"    => "N/A",
			"id"            => "0"
		); 
		if(trim($cfg)!=""){
			$q = $this->db->query("
				select ac.* from aap_config ac
				where ac.config_name = '".$cfg."'
			")->row();
			if(count($q) > 0){
				$r=array(
					"cfg_value"     => $q->config_value,
					"cfg_desc"      => $q->config_desc,
                                        "cfg_status"    => $q->config_status,
					"id"            => $q->id
				); 
			}
		}
		
		return $r;
	}
        
        function siapa_saya($uid="")
        {
		$r=array(
			"fullname" => "N/A",
			"foto"	   => "no-photo.jpg",
			"id" => "0"
		); 
		if(trim($uid)!=""){
			$q = $this->db->query("
				select * from aap_users au, aap_employee ae
				where au.employee_id = ae.id
				and au.id = '".$uid."'
			")->row();
			if(count($q) > 0){
				$r=array(
					"fullname"      => $q->employee_fullname,
                                        "email"            => $q->email,
					"foto"              => $q->employee_url,
					"id"                => $q->id
				); 
			}
		}
		
		return $r;
	}
        
        
        function jenis_group($uid="")
        {
		$r=array(
			"groupname" => "N/A",
			"id" => "0"
		); 
		if(trim($uid)!=""){
			$q = $this->db->query("
				select ag.* from aap_user_groups aug, aap_groups ag
				where aug.aap_groups_id = ag.id
				and aug.app_users_id = '".$uid."'
			")->row();
			if(count($q) > 0){
				$r=array(
					"groupname"      => $q->group_name,
					"id"             => $q->id
				); 
			}
		}
		
		return $r;
        }

        function menu_atas($uid="")
        {
		$r=array(
                        "menu"  => ""
		); 
                
		if(trim($uid)!=""){
			$q = $this->db->query("
				select ag.* from aap_user_groups aug, aap_groups ag
				where aug.aap_groups_id = ag.id
				and aug.app_users_id = '".$uid."'
			")->row();
			if(count($q) > 0){
                            $menu=$this->aap_menu->build_menu($q->id);
                            $r=array(
                                    "menu"          => $menu
                            ); 
			}
		}
                
		return $r;
        }        
        
        function companys($uid="") //id	company_name	address	email	contact	phone
        {
		$r=array(
			"company_name" => "N/A",
			"email"	   => "no-mail",
			"id" => "0"
		); 
		if(trim($uid)!=""){
			$q = $this->db->query("
				select * from aap_mstr_company amc
				where amc.id = '".$uid."'
			")->row();
			if(count($q) > 0){
				$r=array(
					"company_name"          => $q->company_name,
                                        "email"                 => $q->email,
					"address"               => $q->address,
                                        "contact"               => $q->contact,
                                        "phone"                 => $q->phone,
					"id"                    => $q->id
				); 
			}
		}
		
		return $r;
	}
        
        function aap_menu($grp="", $actions="") //id	title	link_type	page_id	module_name	url	uri	dyn_group_id	position	target	parent_id	is_parent	show_menu	time_add	time_update	user_add	user_update
        {
		$r=array(
			"title"         => "N/A",
                        "url"           => "N/A",
			"actions"       => 0,
			"id"            => 0
		); 
                if(trim($grp)!=""){
                        $q = $this->db->query("
                                SELECT aap_menu.id, aap_menu.title, aap_group_menus_actions.aap_actions_id, aap_menu.url
                                FROM aap_groups
                                INNER JOIN aap_group_menus ON aap_group_menus.aap_groups_id = aap_groups.id
                                INNER JOIN aap_menu ON aap_menu.id = aap_group_menus.aap_menu_id
                                INNER JOIN aap_group_menus_actions ON aap_group_menus_actions.aap_group_menus_id = aap_group_menus.id
                                WHERE aap_groups.id = '".$grp."'
                                AND aap_group_menus_actions.aap_actions_id = '".$actions."'
                                ORDER BY `aap_menu`.`id` ASC
                                ")->row();
                        if(count($q) > 0){
				$r=array(
					"title"                 => $q->title,
					"actions"               => $q->aap_actions_id,
                                        "url"                   => $q->url,
					"id"                    => $q->id
				); 
			}
                }
		
		return $r;
	}
 
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
