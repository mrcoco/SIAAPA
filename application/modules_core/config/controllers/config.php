<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Config extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}
        
	function index()
	{
                        $data['auth_message'] = 'Your password has successfully been changed.';
                        $this->load->_v('change_password_form',$data);

	}
        
        function libraries() 
	{
            $crud = new grocery_CRUD();
            $crud   ->set_table('aap_config')
                    ->set_subject('Sistem Configure')
                    ->columns('config_name','config_value','config_desc','config_status')
                    ->fields('config_name','config_value','config_desc','config_status')
                    ->display_as('config_status','Status');
            $output = $crud->render();
            $this->_v('config',$output);
        }
        
        function user()
        {
             if($this->uri->segment(3)=='success'){
                 redirect($this->own_link.'config/user/edit/'.$this->dx_auth->get_user_id());
            }
            $crud = new grocery_CRUD();
            $crud   ->set_table('aap_users')
                    ->set_subject('Users Control')
                    ->display_as('employee_id','Employee')
                    ->set_relation_n_n('Group_Access', 'aap_user_groups', 'aap_groups', 'app_users_id', 'aap_groups_id', 'group_name','priority');
            if ($this->dx_auth->groupid_saya()== 1){
                $crud->columns('employee_id','username','email','banned','Group_Access');
                $crud->fields('employee_id','username','email','banned','Group_Access');
                $crud->set_relation('employee_id','aap_employee','employee_fullname');
            } else {
                if($this->uri->segment(4) != $this->dx_auth->get_user_id()) {
                  redirect('/config/user/edit/'.$this->dx_auth->get_user_id());
                  }
                $crud->where('username',$this->dx_auth->get_username());
                $crud->columns('username','email');
                $crud->fields('username','email');
                $crud->unset_delete();
                $crud->unset_add();
                $crud->unset_list();
                $crud->change_field_type('username','readonly');
            }
            $output = $crud->render();
            $this->_v('config',$output);
        }
       
        function employee()
        {
            if($this->uri->segment(3)=='success'){
                 redirect($this->own_link.'config/employee/edit/'.$this->dx_auth->get_employee_id());
            }
            $crud = new grocery_CRUD();
            $crud->set_table('aap_employee');
            $crud    ->set_subject('Employee Profile')
                     ->columns('employee_fullname','employee_datebirth','employee_placebirth','employee_gender','employee_url','employee_alamat','employee_provinsi','employee_kota','employee_notlp')
                     ->fields('employee_fullname','employee_datebirth','employee_placebirth','employee_gender','employee_url','employee_alamat','employee_provinsi','employee_kota','employee_notlp')
                     ->display_as('employee_fullname','Fullname')
                     ->display_as('employee_datebirth','Tanggal Lahir')
                     ->display_as('employee_placebirth','Tempat Lahir')
                     ->display_as('employee_gender','Jenis Kelamin')
                     ->display_as('employee_url','Foto')
                     ->display_as('employee_alamat','Alamat')
                     ->display_as('employee_notlp','No Telepon')
                     ->display_as('employee_provinsi','Provinsi')
                     ->display_as('employee_kota','Kota')
                     ->change_field_type('employee_datebirth','date')
                     ->change_field_type('time_add','hidden')
                     ->change_field_type('time_update','hidden');  
            
            if ($this->dx_auth->groupid_saya()== 1){
                
            }elseif ($this->uri->segment(4) == $this->dx_auth->get_employee_id()) {
                    $crud->where('employee_fullname',$this->dx_auth->nama_saya());
                    $crud->set_subject('Employee '. $this->dx_auth->get_employee_id().' Profile');
                    $crud->unset_delete();
                    $crud->unset_add();
                    $crud->unset_list();  
            }  else {
                redirect('/dasboard');
            }
            $crud    ->callback_before_insert(array($this,'employee_sebelum_insert'))
                     ->callback_update(array($this,'employee_sebelum_update'));
            $crud    ->set_relation('employee_provinsi', 'aap_mstr_provinsi', 'nama_provinsi')
                     ->set_relation('employee_kota', 'aap_mstr_kota', 'nama_kota');
            
            $crud->set_field_upload('employee_url','uploads/foto');
            
            $output = $crud->render();
            $this->_v('config',$output);
        }
        //Pengaturan Time insert 
        function employee_sebelum_insert($post_array, $primary_key)
        {
           $post_array['time_add'] = date('Y-m-d H:i:s');
           return $this->db->update('aap_employee',$post_array,array('id' => $primary_key));
        }
        
        //Pengaturan Time update
        function employee_sebelum_update($post_array, $primary_key)
        {
           $post_array['time_update'] = date('Y-m-d H:i:s');
           return $this->db->update('aap_employee',$post_array,array('id' => $primary_key));
        }
               
        function groups()
        {
            $crud = new grocery_CRUD();
            $crud->set_table('aap_groups');
            $crud   ->columns('group_name','group_desc','Module_Access')  
                    ->add_fields('group_name','group_desc','Module_Access')
                    ->edit_fields('group_name','group_desc','Module_Access')
                    ->change_field_type('time_add','hidden')
                    ->change_field_type('time_update','hidden')
                    ->set_relation_n_n('Module_Access', 'aap_group_menus', 'aap_menu', 'aap_groups_id', 'aap_menu_id', 'title','priority');
            $crud   ->callback_before_insert(array($this,'groups_sebelum_insert'))
                    ->callback_before_update(array($this,'groups_sebelum_update'));
            $crud->add_action('Menu Access', '', 'config/access_menu','ui-icon-plus');
            $output = $crud->render();
            $this->_v('config',$output);
        }
        //Pengaturan Time Insert
        function groups_sebelum_insert($post_array)
        {
           $post_array['time_add'] = date('Y-m-d H:i:s');  
        }
        
        //Pengaturan Time update
        function groups_sebelum_update($post_array)
        {
           $post_array['time_update'] = date('Y-m-d H:i:s');  
        }
        
        function access_menu($id = NULL)
        {
            $crud   = new grocery_CRUD();
            $crud   ->where('aap_groups_id',$id);
            $crud   ->set_table('aap_group_menus') 
                    ->set_relation('aap_menu_id','aap_menu','title')            
                    ->columns('aap_menu_id','Access')
                    ->add_fields('aap_menu_id','Access')
                    ->edit_fields('aap_menu_id','Access')
                    ->display_as('aap_menu_id','Module Name')
                    ->unset_add() ->unset_delete()
                    ->change_field_type('aap_menu_id','hidden')
                    ->set_relation_n_n('Access', 'aap_group_menus_actions', 'aap_actions', 'aap_group_menus_id', 'aap_actions_id', 'action_name','priority');
            
            $crud    ->callback_before_insert(array($this,'input_before_insert'))
                    ->callback_before_update(array($this,'input_before_update'));
            
            $output = $crud->render();
            $this   ->_v('config',$output);
        }
        //Pengaturan Time Insert
        function input_before_insert ($post_array) 
        {
            $post_array['time_add'] = date('Y-m-d H:i:s');
            $post_array['user_add'] = $this->dx_auth->get_user_id();
            
            return $post_array;
        }
        //Pengaturan Time Update
        function input_before_update ($post_array)
        {
            $post_array['time_update'] = date('Y-m-d H:i:s');
            $post_array['user_update'] = $this->dx_auth->get_user_id();
            return $post_array;
        }
      
}        
?>
