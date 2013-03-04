<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
      class Bav extends MY_Controller
 {
      function __construct() 
      {
          parent::__construct();
      }
      
      function index ()
      {
          $crud   =new grocery_CRUD();
          $crud->where('pa_status',1);
          $crud->or_where('entry_by_user_id',352);
          $crud->or_where('entry_by_user_id',352);
          $crud   ->set_table('aap_pa')
                  ->set_subject('BAV') 
                  ->where('entry_by_user_id',1)
                  ->columns('id', 'pa_cabang', 'pa_bulan', 'pa_type', 'pa_status', 'pa_kembali', 'kembali_id', 'pa_note', 'entry_by_user_id', 'entry_by_emp_id')
                  ->fields('id', 'pa_cabang', 'pa_bulan', 'pa_type', 'pa_status', 'pa_kembali', 'kembali_id', 'pa_note', 'entry_by_user_id', 'entry_by_emp_id') 
                  ->unset_columns('id', 'pa_cabang', 'pa_bulan', 'pa_type', 'pa_status', 'pa_kembali', 'kembali_id', 'pa_note', 'entry_by_user_id', 'entry_by_emp_id');
                  
        
//         $crud->set_js('assets/grocery_crud/js/jquery_plugins/config/jquery.tine_mce.config.js');
//         $crud->set_js('assets/grocery_crud/texteditor/jquery.tinymce.js');
          
         $crud->change_field_type('entry_by_user_id', 'hidden', '352');
         
         //$crud    ->set_field_upload('cv_file_id','assets/uploads/files') ;
         $output  =$crud->render();
         $this    ->_v('index',$output);
      }
      function entry(){
          
                        $crud       =new grocery_CRUD();
                        $crud       ->set_table('aap_pa');
                        $crud       ->set_subject('BAV')
                                        ->columns();
                        
      }
      function gerai_tabel(){
          $crud     =new grocery_CRUD();
//          $crud->set_theme('flexigrid');
          $crud     ->set_theme('datatables');
          $crud     ->set_table('aap_bav_detail');
          $crud     ->set_subject('Bahana Artha Ventura - Gerai Report');
          $crud     //->unset_delete()
                    ->unset_edit()
                    ->unset_add();
//          $crud     ->where('user_add',2);
          $crud     ->or_where('detail_status',9);
//          $crud     ->or_where('detail_tarif_premi',2);
          $crud     ->columns('detail_no','detail_nama','detail_uang_ptg','detail_premi_pag','detail_premi_paa');
          $crud     ->add_action('Detail', '', 'bav/detail','ui-icon-clipboard');
          $crud     ->add_action('Edit', '', 'bav/edit','ui-icon-pencil');
//          $crud     ->add_action('Delete', '', 'bav/delete','ui-icon-trash');
          $output   =$crud->render();
          $this     ->_v('gerai_index',$output);
      }
      
      function detail($id = NULL){
          
      }
      function edit($id = NULL){
          
      }
      function delete($id = NULL){
          
      }
 }
 
 ?>
