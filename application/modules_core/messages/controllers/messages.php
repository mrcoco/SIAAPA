<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Messages extends MY_Controller
{
	// Used for registering and changing password form validation

	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
            $crud = new grocery_CRUD();
            $crud   ->set_table('aap_message') //id	from_user_id	note_sender	receiver_user_id	note_subject	note_content	note_read	status	note_date	note_as_id
                    ->set_subject('Pesan')
                    ->columns('id','from_user_id','note_sender','receiver_user_id','note_subject','note_content','note_read','note_status','note_date','note_as_id')
                    ->fields('from_user_id','note_sender','receiver_user_id','note_subject','note_content','note_read','note_status','note_date');
//            $crud->set_relation('from_user_id','aap_users','username');
            $crud->set_relation('receiver_user_id','aap_users','username');
            $crud->add_fields('receiver_user_id','note_subject','note_content');
            $crud   ->display_as('receiver_user_id','Send to')
                    ->display_as('note_subject','Subject')
                    ->display_as('note_content','Content')
                    ->set_rules('note_subject','Subject', 'required|min_length[1]|max_length[50]');
            $crud->required_fields('receiver_user_id','note_subject','note_content');
            $crud->callback_insert(array($this,'insert_messages'));
            $crud->unset_back_to_list();
            //$crud->set_relation_n_n('Jenis_Action', 'aap_menu_actions', 'aap_actions', 'aap_menu_id', 'aap_actions_id', 'action_name');
            //$crud->unset_delete();
            $output = $crud->render();
            
            
            $sql = "SELECT *
                    FROM `aap_message`
                    where aap_message.status = 1
                    and aap_message.receiver_user_id = ".$this->dx_auth->get_user_id()."
                    ORDER BY `aap_message`.`id` DESC
                    LIMIT 0 , 5";
            $query = $this->db->query($sql);
            $data['messages']     = $query->result();
            
            
            $output = array_merge($data,(array)$output);
            $this->_v('index',$output);                        
        }
        function insert_messages($post_array) {
//            $post_array['id_employee']  = $this->dx_auth->get_employee_id();
            $post_array['status']           = 1;
            $post_array['note_date']        = date('Y-m-d');
            $post_array['from_user_id']     = $this->dx_auth->get_user_id();
           return $this->db->insert('aap_message',$post_array);
        }
        
}        
?>
