<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Master extends MY_Controller
{
	// Used for registering and changing password form validation

	function __construct()
	{
		parent::__construct();
	}
	
	function aj_asuransi()
	{
            $crud = new grocery_CRUD();
            $crud   ->set_table('aap_mstr_aj_asuransi')
                    ->set_subject('Master ID Groups Asuransi Jiwa')
                    ->columns('id','asuransi_name')
                    ->fields('asuransi_name')
                    ->display_as('asuransi_name','Nama Asuransi');
            $output = $crud->render();
            $this->_v('index',$output);                        
        }
        
        function clauses()
	{
            $crud = new grocery_CRUD();
            $crud   ->set_table('aap_mstr_clauses')
                    ->set_subject('Master ID Clauses')
                    ->columns('clauses_name','clauses_Desc')
                    ->fields('clauses_name','clauses_Desc')
                    ->display_as('clauses_name','Clauses Name')
                    ->display_as('clauses_Desc','Clauses Description');
            $output = $crud->render();
            $this->_v('index',$output);                        
        }        
        
        function quotations()
	{
            $crud = new grocery_CRUD();
            $crud   ->set_table('aap_mstr_quotation')
                    ->set_subject('Master ID Groups Quotation')
                    ->columns('quotation_name')
                    ->fields('quotation_name')
                    ->display_as('quotation_name','Nama Quotation');
            $output = $crud->render();
            $this->_v('index',$output);                        
        }
        
        function client()
	{
            $crud = new grocery_CRUD();
            $crud   ->set_table('aap_mstr_client')
                    ->set_subject('Master ID Groups Client - AJ')
                    ->columns('client_name')
                    ->fields('client_name');
            
            $crud   ->display_as('client_name','Nama Client');
                    
            
            $output = $crud->render();
            $this->_v('index',$output);                        
        }
      
        function company()
        {
           $crud = new grocery_CRUD();
           $crud  ->set_table('aap_mstr_company')
                   ->set_subject('Master ID Company')
                   ->columns('company_name','email','contact','phone')
                   ->fields('company_name','email','contact','phone')
                   ->display_as('company_name','Company Name')
                   ->display_as('contact','Contact Person');
           $output = $crud->render();
           $this->_v('index', $output);
                  
        }
}        
?>
