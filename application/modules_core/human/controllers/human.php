<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
      class Human extends MY_Controller
 {
      function __construct() 
      {
          parent::__construct();
      }
      
      function index ()
      {
          $crud   =new grocery_CRUD();
          $crud   ->set_table('aap_hrm_job_candidate')
                  ->set_subject('Job Candidate') 
                  ->columns('first_name', 'last_name', 'email', 'contact_number', 'status', 'comment', 'mode_of_application', 'date_of_application', 'cv_file_id', 'cv_text_version', 'keywords', 'added_person')
                  ->fields('first_name', 'last_name', 'email', 'contact_number', 'status', 'comment', 'mode_of_application', 'date_of_application', 'cv_file_id', 'cv_text_version', 'keywords', 'added_person') ;
        
         $crud->set_js('assets/grocery_crud/js/jquery_plugins/config/jquery.tine_mce.config.js');
         $crud->set_js('assets/grocery_crud/texteditor/jquery.tinymce.js');
         
         $crud    ->set_field_upload('cv_file_id','uploads/files') ;
         $output  =$crud->render();
         $this    ->_v('index',$output);
      }
      
      function absensi()
      {
         $crud     =new grocery_CRUD();
         $crud     ->set_table('aap_absensi')
                   ->set_subject('Data Absensi')
                   ->columns('nik','nama','auto_assign','tanggal','jam_kerja','jam_masuk','jam_pulang','scan_masuk','scan_pulang','normal','riil','terlambat','plg_cpt','absent','lembur','jml_jam_kerja','pengecualian','check_in','check_out','departement','hari_normal','akhir_pekan','hari_libur','jml_kehadiran','lembur_hr_libur')
                   ->fields('no_id','nik','nama','auto_assign','tanggal','jam_kerja','jam_masuk','jam_pulang','scan_masuk','scan_pulang','normal','riil','terlambat','plg_cpt','absent','lembur','jml_jam_kerja','pengecualian','check_in','check_out','departement','hari_normal','akhir_pekan','hari_libur','jml_kehadiran','lembur_hr_libur');
                  
         $output   =$crud->render();
         $this     ->_v('index',$output) ;
      }
 }
 
 ?>
