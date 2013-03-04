<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu extends MY_Controller
{
	// Used for registering and changing password form validation

	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
            $crud = new grocery_CRUD();
            $crud   ->set_table('aap_menu')
                    ->set_subject('Menu Config')
                    ->columns('id','title','url','parent_id','is_parent','show_menu','Jenis_Action')
                    ->fields('title','url','parent_id','is_parent','show_menu','Jenis_Action')
                    ->display_as('id','id')
                    ->display_as('title','Judul')
                    ->display_as('url','Controller')
                    ->display_as('parent_id','Parent ke')
                    ->display_as('is_parent','Parent')
                    ->display_as('show_menu','Tampilkan');
            $crud->set_relation('parent_id','aap_menu','Title');
            $crud->set_relation_n_n('Jenis_Action', 'aap_menu_actions', 'aap_actions', 'aap_menu_id', 'aap_actions_id', 'action_name');
            $crud->unset_delete();
            $output = $crud->render();

            $this->_v('menu',$output);                        
        }
}        
?>
