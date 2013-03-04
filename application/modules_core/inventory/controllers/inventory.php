<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory extends MY_controller
{
    function __construct() 
    {
        parent::__construct();

        
    }
    
    function index()
    {
        $asset =new grocery_CRUD();
        $asset ->set_table('aap_inventory')
               ->set_subject('Inventory IT')
               ->columns('id','descripton','employee','vendor','asset_category','department','model_numb','serial_numb','os','computer_name','processor','memory','m_k','total_price');
        
        $asset ->add_fields('descripton','employee','vendor','asset_category','department','model_numb','serial_numb','total_price','os','computer_name','processor','memory','m_k')
               ->required_fields('id','descripton','employee','vendor','asset_category','department','model_numb','serial_numb','total_price','os','computer_name','processor','memory','m_k');
        
        $asset ->display_as('model_numb','Jenis Monitor')
               ->display_as('serial_numb','VGA')
               ->display_as('m_k','Mouse & Keyboard')
               ->display_as('os','Operating System') 
               ->display_as('total_price','Estimasi Biaya');
        $output=$asset->render();
        
        $this->_v('inventory',$output);
        
        
    }
    
      function company()    
    {
        
        $crud    = new grocery_CRUD();
        $crud    ->set_table('aap_cmp_inv')            
                 ->set_subject('All Inventory')
                 ->columns('id','cd_brg','nama_brg','jenis_brg','tgl','note','price','ruangan','pic')
                 ->fields('cd_brg','nama_brg','jenis_brg','tgl','note','price','ruangan','pic')
                
                 ->set_rules('price', 'Price', 'numeric');
        
        $crud   ->display_as('ruangan','Ruangan/Divisi')
                ->display_as('tgl','Bulan Pendapatan')
                ->display_as('pic','Gambar')
                ->display_as('nama_brg','Nama Barang')
                ->display_as('jenis_brg','Jenis Barang')
                ->display_as('id','No Barang')
                ->display_as('cd_brg','Barcode Barang');
        $crud   ->field_type('jenis_brg', 'enum', array('ASET INTERIOR','PERABOT KANTOR','ASET MESIN-MESIN KANTOR','PESAWAT KANTOR','ASET PERALATAN','PERLENGKAPAN KANTOR'))
                ->field_type('ruangan', 'enum', array('Ruang Depan','Ruang Tamu','Ruang Meeting','Ruang Tengah','Ruang SekPer(Pak Herra)','Ruang Divisi Marketing','Ruang Dirut(Pak Fadjar)','Ruang Direktur Utama(Pak Wasith)','Ruang Keuangan','Ruang Dokumen','Ruang Server','Ruang Mushola','Ruang Dapur'))
                ->callback_field('tgl',array($this,'field_callback_1'))
                ->callback_before_insert(array($this,'test_callback'))
//                ->callback_edit_field('cd_brg',array($this,'set_cd_brg_to_empty'))
                ->change_field_type('cd_brg', 'hidden')
//                ->callback_after_update(array($this, 'log_user_after_update'))
                ->callback_before_update(array($this,'cd_brg_callback'));      
        $crud ->set_field_upload('pic','uploads/foto');
        

        $output =$crud->render();
        
        $this->_v('inventory',$output);
    }
    
    
    function field_callback_1($value = '', $primary_key = null)
        {
            return '<input type="text" maxlength="50" value="'.$value.'" name="tgl" style="width:462px" class="date-picker">';
        }
     
//        function cd_acak($post_array, $primary_key){
//            $testing=array(
//            "id" => $primary_key,
//            "cd_brg" => number_format($this->dx_auth->_gen('acak'))
//            );
//            
//            $this->db->insert('aap_cmp_inv',$post_array,array('id' => $testing));
//            
//            return true;
//        }
        
//    function cd_brg_callback($post_array, $primary_key) {
//    $this->dx_auth-> _gen('8');
// 
//    //Encrypt password only if is not empty. Else don't change the password to an empty field
//    if(!empty($post_array['cd_brg']))
//    {
////        $key = 'super-secret-key';
//        $post_array['cd_brg'] = $this->dx_auth-> _gen('8');
//    }
//    else
//    {
//        unset($post_array['cd_brg']);
//    }
// 
//  return $post_array;
//}
//
//    function set_cd_brg_to_empty() 
//    {
//         return "<input type='text' name='cd_brg' value='' />";
//    }

    function test_callback($post_array)
    {
        $post_array['cd_brg'] = $this->dx_auth-> _gen('8');
        
        return $post_array;
    }    
}

?>