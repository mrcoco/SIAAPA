<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * AAP Library
 *
 * Authentication library for Sistem Informasi PT AAP.
 *
 * @author		Reko
 * @version		0.1 Beta
 * @based on            (http://http://reko.web.id/)
 * @link		http://http://reko.web.id/)
 * @license		MIT License Copyright (c) 2012 Reko Srowako
 * @credits		(http://http://reko.web.id/)
 */
 
class Aap_lib
{
	// Private
	
	function Aap_lib()
	{
		$this->ci =& get_instance();

		log_message('debug', 'AAP Library');

		// Load required library
		$this->ci->load->library('Session');
		$this->ci->load->database();
		
		// Load DX Auth config
		$this->ci->load->config('dx_auth');
		
		// Initialize
		$this->_init();
	}

	/* Private function */
        
        function _init()
	{
		// When we load this library, auto Login any returning users
            
        }
        function menu_access($url_segment)
	{
            $this->ci->load->model('aap_model', 'appmodel');
            $url_menu = $this->ci->appmodel->aap_view($url_segment);
            $id_menu = $url_menu['id_menu'];
            
            $this->ci->load->model('aap_model', 'appmodel');
            $menu_access = $this->ci->appmodel->view_access($id_menu);
            return $menu_access['id_group_menus'];
        }
        function get_app_Config_value($cfg)
	{
            $this->ci->load->model('aap_model', 'appmodel');
            $cfg_config = $this->ci->appmodel->aap_config($cfg);
            return $cfg_config['cfg_value'];
        }
        
        function get_employee_name($cfg)
	{
            $this->ci->load->model('aap_model', 'appmodel');
            $cfg_config = $this->ci->appmodel->siapa_saya($cfg);
            return $cfg_config['fullname'];
        }
        
        function get_company_name($cfg)
	{
            $this->ci->load->model('aap_model', 'appmodel');
            $cfg_config = $this->ci->appmodel->companys($cfg);
            return $cfg_config['company_name'];
        }
        
        function kutip($kalimat, $jumlah_kata=10){
            $arr_str = explode(' ', $kalimat);
            $arr_str = array_slice($arr_str, 0, $jumlah_kata );
            return implode(' ', $arr_str);
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
            $html_out  = $output;
            return $html_out;

    }
    
function potong_text( $text, $limit ){ //Fungsi Untuk  mengatasi teks berformat
    $search = array ("'<script[^>]*?>.*?</script>'si",
                 "'<[/!]*?[^<>]*?>'si",   
                 "'&(quot|#34);'i",  
                 "'&(amp|#38);'i", 
                 "'&(lt|#60);'i", 
                 "'&(gt|#62);'i", 
                 "'&(nbsp|#160);'i", 
                 "'&(iexcl|#161);'i", 
                 "'&(cent|#162);'i", 
                 "'&(pound|#163);'i", 
                 "'&(copy|#169);'i", 
                 "'&#(d+);'e");                 
    $replace = array ("", 
                 "",  
                 "\"", 
                 "&", 
                 "<", 
                 ">", 
                 " ", 
                 chr(161), 
                 chr(162), 
                 chr(163), 
                 chr(169), 
                 "chr(\1)"); 
    $text = preg_replace($search, $replace, $text);
    $text = substr($text,0,$limit);
    return ($text);
}

function cari_data($tabel,$field,$kunci,$tampil){
    $query = $this->db->get_where($tabel, array($field => $kunci), $limit, $offset);
    $baris = $query->num_rows();
    $query_result = $query->result();
//    if($baris==0){
        foreach($query_result as $baris){
            $data = $baris->$tampil;
            return ($data);
        }
        
//    }
    
    
}

function get_aap_menu_actions($grp,$actions)
{
    $this->ci->load->model('aap_model', 'appmodel');
    $cfg_config = $this->ci->appmodel->aap_menu($grp,$actions);
    return $cfg_config['url'];
}
                
}

?>