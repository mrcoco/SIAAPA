<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Asuransi_jiwa extends MY_Controller
{
    // Used for registering and changing password form validation

    function __construct()
    {
        parent::__construct();
    }
   
    function index()
    {
            $crud = new grocery_CRUD();
            $crud   ->set_table('aap_aj')
                    ->set_subject('Asuransi Jiwa Koperasi Aliansi Sejahtera')
                    ->columns('id','title','url','parent_id','is_parent','show_menu')
                    ->fields('title','url','parent_id','is_parent','show_menu')
                    ->display_as('id','id')
                    ->display_as('title','Judul')
                    ->display_as('url','Controller')
                    ->display_as('parent_id','Parent ke')
                    ->display_as('is_parent','Parent')
                    ->display_as('show_menu','Tampilkan');
            $crud->set_relation('parent_id','aap_menu','Title');
            $crud->unset_delete();
            //$crud->set_language("indonesia");
            $output = $crud->render();

            $this->_v('menu',$output);                       
        }
       
        function kas()
    {
            $crud = new grocery_CRUD();
            $crud   ->set_table('aap_aj')
                    ->set_subject('Asuransi Jiwa Koperasi Aliansi Sejahtera')
                    ->columns('nama_tertanggung','alamat','no_sertifikat','tanggal_akad','tanggal_lahir','usia_masuk','usia_pertanggungan','uang_pertanggungan')
                    ->fields('client_id','nama_tertanggung','alamat','no_sertifikat','tanggal_akad','tanggal_lahir','usia_masuk','usia_pertanggungan','uang_pertanggungan','time_add','time_update','user_add','user_update')
                    ->display_as('nama_tertanggung','Nama Tertanggung')
                    ->display_as('alamat','Alamat')
                    ->display_as('no_sertifikat','No Sertifikat')
                    ->display_as('tanggal_akad','Tanggal Akad')
                    ->display_as('tanggal_lahir','Tanggal Lahir')
//                  ->display_as('usia_masuk','Usia Masuk')
                    ->display_as('usia_pertanggungan','Usia Pertanggungan')
                    ->display_as('uang_pertanggungan','Uang Pertanggungan');
          
           $crud    ->callback_before_update(array($this,'kas_sebelum_update'))
                    ->callback_before_insert(array($this,'kas_sebelum_insert'));
          
           $crud    ->change_field_type('time_add','hidden')
                    ->change_field_type('time_update','hidden')
                    ->change_field_type('tanggal_akad','date')
                    ->change_field_type('tanggal_lahir','date');
    
           
           $crud    ->change_field_type('client_id','hidden',1)
                    ->change_field_type('usia_masuk','hidden',30);

           
//            $crud->unset_delete();
            $output = $crud->render();

            $this->_v('index',$output);                       
        }
       
        function kas_sebelum_insert($post_array)
        {
            $post_array['time_add'] = date('Y-m-d H:i:s');
            $post_array['time_update'] = date('Y-m-d H:i:s');
            $post_array['tanggal_akad'] = date('Y-m-d H:i:s');
            $post_array['tanggal_lahir'] = date('Y-m-d H:i:s');
            return $post_array;

        }
       
        function kas_sebelum_update($post_array)
        {
            $post_array['time_update'] = date('Y-m-d H:i:s');
        }
       
      
}       
?>