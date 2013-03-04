<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
      class Chat extends MY_Controller {
    //Global variable to holds the output data for each view 
    public $outputData;
    public $loggedInUser;
    function Chat()
    {
        parent::Controller();
        session_start();
        //Get Config Details From Db
        $this->config->db_config_fetch();
       //Manage site Status 
        if($this->config->item('site_status') == 1)
        redirect('offline');
        $this->ci->load->model('aap_model','aapmodel');
        //load Helpers
        $this->load->helpers('users');
        //Load the session library
        $this->load->library('session');
    }
}  // End of the class
 
 ?>
