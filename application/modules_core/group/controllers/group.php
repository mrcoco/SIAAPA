<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once(APPPATH."libraries/AdminController.php");
class Group extends AdminController {  
	function __construct()   
	{
		parent::__construct();    
		$this->_set_action();
		$this->_set_action(array("access","edit","delete"),"ITEM");
		$this->cat_search = array(
			'all'			=> 'Pilih Kategory',
			'group_name'		=> 'Nama Group',
			'group_desc'		=> 'Penjelasan Group'
		);
		$this->_set_title('Setting > Group Akses');
		$this->_set_cat_search(array("all"	=> $this->cat_search));	
		$this->DATA->table="macs_acl_group";
		$this->load->model("mdl_group","MA");
		$this->folder_view = "module_core/";
		$this->prefix_view = strtolower($this->_getClass());

	}

	function index(){
		
		$this->_set_desc_title('Daftar Group Akses');	
		
		$this->data_table = $this->MA->data( array(
				"limit" 	=> $this->per_page, 
				"offset" 	=> $this->uri->segment($this->uri_segment)
		) );
		
		$data = $this->_data(array(
				'base_url'		=> $this->own_link.'index'
			)
		);	
					
		$this->_v($this->folder_view.$this->prefix_view,$data);
	}
	
	function search(){
		$this->_set_desc_title('Daftar Group Akses');	
		$this->load->helper('url');		
		$this->uri_segment = 6;
			
		$column = ''; $keyword = '';				
		if( isset($_POST['column']) && isset($_POST['keyword']) ){
			$column = $_POST['column'];
			$keyword = url_title($_POST['keyword']);
		}else{
			$column =  $this->uri->segment(4);
			$keyword =   $this->uri->segment(5);
		}	
			
		$this->data_table = $this->MA->data( array(
								"limit" 	=> $this->per_page, 
								"offset" 	=> $this->uri->segment($this->uri_segment),
								"column"	=> $column,
								"keyword"	=> $keyword
							) );
		$data = $this->_data(
			array(
				'base_url'		=>$this->own_link.'search/'.$column.'/'.$keyword
			)
		);	
		
		
		$this->header_page['key']=$keyword;
		$this->header_page['col']=$column;	
		$this->header_page['cat_search'] = array($column	=>	$this->cat_search);	
		$this->_v($this->folder_view.$this->prefix_view,$data);
	}
	
	function add(){			
		$this->_set_desc_title('Tambah Group Akses');		
		$this->_v($this->folder_view.$this->prefix_view."_form",array());
	}
	
	function edit($id=''){
		$id=dbClean(trim($id));
		$this->_set_desc_title('Update Data Group Akses');	
		
		if(trim($id)!=''){
			$this->data_form = $this->DATA->data_id(array(
					'id'	=> $id
				));
				
			$this->_v($this->folder_view.$this->prefix_view."_form",array());
		}else{
			redirect($this->own_link);
		}
	}
	
	function delete($id=''){
		$id=dbClean(trim($id));		
		if(trim($id) != ''){
			$o = $this->DATA->_delete(
				array("id"	=> idClean($id))
			);
			
			$this->message = ($o)?_l('success_exec'):_l('fail_exec');
			
		}
		redirect($this->own_link);
	}

	function save(){
		$data = array(
			'group_name'		=> dbClean($_POST['group_name']),
			'group_desc'		=> dbClean($_POST['group_desc']),
			'group_status'		=> dbClean($_POST['group_status'])
		);		
		$a = $this->_save_master( 
			$data,
			array(
				'id' => dbClean($_POST['group_id'])
			),
			dbClean($_POST['group_id'])			
		);
		$this->add();
	}
	
	function access($id=''){
		$id=dbClean(trim($id));		
		if(trim($id) != ''){
			if(isset($_POST['simpan'])){	
				$this->DATA->table="macs_acl_group_accesses";
				$this->DATA->_delete(array('group_id'=>$id));	
				
				if(isset($_POST['acc_name']) && count($_POST['acc_name']) > 0){
					foreach($_POST['acc_name'] as $id_access=>$v){
						if(count($v)>0){
							foreach($v as $id_action){
								$data_actions = array(
									'access_id'     => $id_access,
									'group_id'	=> $id,
									'action_id'	=> $id_action,
									'app_id'	=> $this->jCfg['app_id']
								);
								$this->DATA->_add($data_actions);
							}
						}
						
					}
				}
				redirect($this->own_link);
					
			}else{
				$this->DATA->table="macs_acl_group";
				$group=$this->DATA->data_id(array("id"=>$id));
				$this->DATA->table="macs_acl_actions";
				$actions = $this->DATA->_getall();
				$this->_set_desc_title('Group Akses '.ucwords($group->group_name));	
			
				$m_tbl=array();
				$this->DATA->table="macs_acl_accesses";
				$access_mod = $this->DATA->_getall();
				
				foreach($access_mod as $m){
					$action_module = array();
					foreach($actions as $o){
						$this->DATA->table="macs_acl_group_accesses";
						$val = $this->DATA->data_id(array(
											"access_id"	=> $m->id,
											"group_id"	=> $id,
											"action_id"	=> $o->id
									));
						$this->DATA->table="macs_acl_access_actions";
						$obj = $this->DATA->data_id(array(
											"access_id"	=> $m->id,
											"action_id"	=> $o->id
									));
						
						$action_module[]=array(
							'id'	=> $o->id,
							'name'	=> $o->action,
							'show'	=> count($obj),
							'value'	=> count($val)
						);
					}
					$m_tbl[$m->id] = array(
						'id_module'		=> $m->id,
						'module_name'	=> $m->access_name,
						'action'		=> $action_module
					);
				}			
				
				$this->_v($this->folder_view.$this->prefix_view."_access",array(
								  "actions"	=> $actions,
							      "access"	=> $m_tbl 
							)								 	
					);
			}	
		}
		
	}

}
