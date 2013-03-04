<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
    var $DATA;
    protected $uriNotLoginAllowed = array('/auth');
    
    function __construct() {

        parent::__construct();        
//        ENVIRONMENT != 'development' || $this->output->enable_profiler(true);
//        $this->log_event();
//        $this->_initConfig();
    }

    function _v($file,$data,$Tampil=TRUE){
//                    $data['sg1'].=$this->uri->segment(1.0);
//                    $data['sg2'].=$this->uri->segment(2.0);
//                    $data['sg3'].=$this->uri->segment(3.0); 
        if ( ! $this->dx_auth->is_logged_in()){
                redirect($this->own_link.'auth');
       }  else {
           if ($this->uri->segment(1.0)==0){ $url_segment = $this->uri->segment(1);
           }else{
               $url_segment = $this->uri->segment(1);
               if ($this->uri->segment(2.0)==0){
               }else{
                   $url_segment .= '/'.$this->uri->segment(2);
               }
           }
           
//           $this->ci->load->model('aap_model', 'appmodel');
//           $url_menu = $this->ci->appmodel->aap_view($url_segment);
           
                if($Tampil==TRUE){

                    $this->load->view($this->dx_auth->header_view);
//                    $this->load->view($this->dx_auth->sidebar);
                                                        //$this->load->view($this->dx_auth->notice);
                                                        //$this->load->view($this->dx_auth->stats);
                    $this->load->view($this->dx_auth->page_index_head,$data);
                    $this->load->view('/'.$file,$data);
                    $this->load->view($this->dx_auth->page_index_foot);
                    $this->load->view($this->dx_auth->footer_view, $data);
		}else{
                    $this->load->view('/'.$file,$data);
		}
          }
    }
    function _vg($file,$data,$Tampil=TRUE){
        if ( ! $this->dx_auth->is_logged_in()){
                redirect($this->own_link.'auth');
       }  else {       
                if($Tampil==TRUE){
                    
			$this->load->view($this->dx_auth->header_view);
                                                        //$this->load->view($this->dx_auth->sidebar);
                                                        //$this->load->view($this->dx_auth->notice);
                                                        //$this->load->view($this->dx_auth->stats);
                                                        $this->load->view($this->dx_auth->page_index_head,$data);
			$this->load->view('/'.$file,$data);
                                                        $this->load->view($this->dx_auth->page_index_foot);
			$this->load->view($this->dx_auth->footer_view, $data);
		}else{
                                                         $this->load->view('/'.$file,$data);
		}
          }
    }
    
    function log_event(){
    }
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */ 
    
 }
?>
