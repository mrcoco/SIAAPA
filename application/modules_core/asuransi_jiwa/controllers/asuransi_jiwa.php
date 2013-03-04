<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Asuransi_jiwa extends MY_Controller
{
	// Used for registering and changing password form validation

	function __construct()
	{
		parent::__construct();
	}
	
	function kas()
	{
           $crud = new grocery_CRUD();
           $crud    ->set_table('aap_aj')
                    ->set_subject('Asuransi Jiwa Koperasi Aliansi Sejahtera')
                    ->columns('aap_mstr_aj_asuransi_id','nama_tertanggung','alamat','no_sertifikat','tanggal_akad','tanggal_lahir','usia_masuk','periode_pertanggungan','uang_pertanggungan','periode_bulan','kota')
                    ->fields('aap_mstr_aj_asuransi_id','nama_tertanggung','alamat','no_sertifikat','tanggal_akad','tanggal_lahir','usia_masuk','periode_pertanggungan','uang_pertanggungan','periode_bulan','kota','time_add','time_update');
           
           $crud    ->display_as('aap_mstr_aj_asuransi_id','Nomor');
           
           $crud    ->change_field_type('time_add', 'hidden')
                    ->change_field_type('time_update', 'hidden')
                    ->change_field_type('usia_masuk', 'hidden',60)
                    ->callback_field('periode_bulan',array($this,'callback_1'))
                   
                   ->set_relation('kota', 'aap_mstr_kota', 'nama_kota');
           
           $crud    ->callback_before_insert(array($this,'input_before_insert'))
                    ->callback_before_update(array($this,'input_before_update'));
           $output=$crud ->render(); 


        $this->_v('index',$output);
        }
       
        function input_before_insert ($post_array) 
        {
            $post_array['time_add'] = date('Y-m-d H:i:s');
            $post_array['user_add'] = $this->dx_auth->get_user_id();
            
            return $post_array;
        }
        
        function input_before_update ($post_array)
        {
            $post_array['time_update'] = date('Y-m-d H:i:s');
            $post_array['user_update'] = $this->dx_auth->get_user_id();
            return $post_array;
        }
       
        function callback_1($value = '', $primary_key = null)
        {
            return '<input type="text" maxlength="50" value="'.$value.'" name="periode_bulan" style="width:462px" class="date-picker">';
        }
        
}        
?>
