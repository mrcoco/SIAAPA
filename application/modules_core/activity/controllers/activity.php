<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Activity extends MY_Controller
{
	// Used for registering and changing password form validation
        // id 	id_employee 	id_mstr_company 	date 	note 	time_add 	time_update 	user_add 	user_update 	status

	function __construct()
	{
		parent::__construct();
	}
	
	function index(){
            $crud = new grocery_CRUD();
            $crud   ->set_table('aap_activity')
                    ->set_subject('Activity Reports')
                    ->columns('date','note')
                    ->set_relation('id_mstr_company','aap_mstr_company','company_name');
//            $crud->callback_column('note', array($this, '_callback_phone'));
//            if ($this->dx_auth->groupid_saya()== 120){
//                $crud->display_as('id_mstr_company','Company');
//                $crud->add_fields('id_mstr_company','note');
//            }else{
            $crud->where('user_add',$this->dx_auth->get_user_id());
            $crud->add_fields('note'); 
//                $crud->unset_jquery();
//            }
            $crud->required_fields('note');    
            $crud->callback_insert(array($this,'activity_insert'));
            $crud->callback_delete(array($this,'activity_delete'));
            $crud->where('status',1);$crud->where('id_employee',$this->dx_auth->get_employee_id());
            $output = $crud->render();
            $this->_v('activity',$output);                        
        }
        	
	function tampil(){
            $crud = new grocery_CRUD();
            $crud   ->set_table('aap_activity')
                    ->set_subject('Activity Reports')
                    ->columns('date','note')
                    ->set_relation('id_mstr_company','aap_mstr_company','company_name');
            $crud->unset_operations();
            $crud->unset_export();
//            $crud->unset_search();
            $crud->callback_column('note', array($this, '_callback_phone'));
            if ($this->dx_auth->groupid_saya()== 120){
                $crud->display_as('id_mstr_company','Company');
                $crud->add_fields('id_mstr_company','note');
            }else{
                $crud->add_fields('note'); 
            }
            $crud->callback_insert(array($this,'activity_insert'));
            $crud->callback_delete(array($this,'activity_delete'));
            $crud->where('status',1);$crud->where('id_employee',$this->dx_auth->get_employee_id());
            $output = $crud->render();
            $this->_v('activity',$output,FALSE);                        
        }
        
//        public function _callback_phone($value, $row)
//      {
//        $atts = array(
//        'width'	  => '500',
//        'height'	 => '500',
//        'scrollbars' => 'yes',
//        'status'	 => 'yes',
//        'resizable'  => 'yes',
//        'screenx'	=> '0',
//        'screeny'	=> '0'
//      );
//
//      return anchor_popup('examples/tampil', $value, $atts);
//      }
        function user($id){
            $crud = new grocery_CRUD();
            $crud   ->set_table('aap_activity')
                    ->set_subject('Activity Reports '.$this->aap_lib->get_employee_name($id))
                    ->columns('date','note');
            $crud->unset_delete();
            $crud->unset_edit();
            $crud->unset_add();
            $crud->where('status',1);
            $crud->where('user_add',$id);
            $output = $crud->render();
            $this->_v('activity',$output);                        
        }
        function activity_insert($post_array) {
            $post_array['id_employee']  = $this->dx_auth->get_employee_id();
            $post_array['status']       = 1;
            $post_array['date']         = date('Y-m-d');
            $post_array['user_add']     = $this->dx_auth->get_user_id();
            $post_array['time_add']     = date('Y-m-d H:i:s');
           return $this->db->insert('aap_activity',$post_array);
        }
        function activity_delete($post_array, $primary_key){
            $post_array['status']       = 9;
           return $this->db->update('aap_activity',$post_array,array('id' => $primary_key));
        }
        function project($id_company){
            $crud = new grocery_CRUD();
            $crud   ->set_table('aap_activity')
                    ->set_subject('Project Reports '.$this->aap_lib->get_company_name($id_company))
                    ->columns('id_mstr_company','date','note')
                    ->display_as('id_mstr_company','Project Companys')
//                    ->display_as('id_employee','Employee Person')
//                    ->set_relation('id_employee','aap_employee','employee_fullname')
                    ->set_relation('id_mstr_company','aap_mstr_company','company_name');
            $crud->add_fields('id_mstr_company','date','note');
            $crud->required_fields('note');
            $crud->where('user_add',$this->dx_auth->get_user_id());
            $crud->callback_insert(array($this,'insert_project'));
            $crud->callback_edit_field('id_mstr_company', array($this, 'get_company'));
            $crud->unset_delete();
            $crud->unset_edit();
//            $crud->unset_add();
            $crud->where('status',2);
            if ($id_company > 0){
                $crud->where('id_mstr_company',$id_company);
            }
            $output = $crud->render();
            $this->_v('activity',$output);                        
        }
        function insert_project($post_array) {
//            $post_array['id_employee']  = $this->dx_auth->get_employee_id();
            $post_array['status']       = 2;
            $post_array['date']         = date('Y-m-d');
            $post_array['user_add']     = $this->dx_auth->get_user_id();
            $post_array['time_add']     = date('Y-m-d H:i:s');
           return $this->db->insert('aap_activity',$post_array);
        }
        function get_company($value, $row){
            $name = Student::find_by_studentid($value);
            $nameAttr = $name->attributes();
            $string = $nameAttr['firstname'] . ' ' . $nameAttr['lastname'];
            return $string;
        }
        
}        
?>
