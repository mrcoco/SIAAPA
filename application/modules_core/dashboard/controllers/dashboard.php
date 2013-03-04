<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MY_Controller
{
	// Used for registering and changing password form validation
	var $min_username = 4;
	var $max_username = 20;
	var $min_password = 4;
	var $max_password = 20;

	function __construct()
	{
		parent::__construct();

	}
	
	function index()
	{
//            $sql = "SELECT *
//                    FROM `aap_message`
//                    where aap_message.status = 1
//                    and aap_message.receiver_user_id = ".$this->dx_auth->get_user_id()."
//                    ORDER BY `aap_message`.`id` DESC
//                    LIMIT 0 , 5";
//            $query = $this->db->query($sql);
//            $data['messages']           = $query->result();
            $sql = "SELECT *
                    FROM `aap_activity`
                    where aap_activity.status = 1
                    and aap_activity.user_add = ".$this->dx_auth->get_user_id()."
                    ORDER BY `aap_activity`.`id` DESC
                    LIMIT 0 , 5";
            $query = $this->db->query($sql);
            $data['activity']           = $query->result();
            
            $sql = "SELECT *
                    FROM `aap_activity`
                    where aap_activity.status = 2
                    and aap_activity.user_add = ".$this->dx_auth->get_user_id()."
                    ORDER BY `aap_activity`.`id` DESC
                    LIMIT 0 , 5";
            $query = $this->db->query($sql);
            $data['project_report']     = $query->result();
            
                   		//	1st parameter is controller, 2nd parameter is function/method, and 3th parameter is function's/method's parameters
//		$data['url1'] = $this->mza_secureurl->setSecureUrl_encode('count','say',array(1,'plus',2,'equal',3)); // the 3th parameter must be single dimension of array
//		$data['url2'] = $this->mza_secureurl->setSecureUrl_encode('dashboard','front_site'); // the function that haven't parameters
//                                    $data['notibar_message']= 'tes 123 123 123 123 123';
//                                    $data['notibar']= 'msginfo';
                
		$this->_v('dashboard',$data);
                        
                    }
	function secure($url){
		$data	= $this->mza_secureurl->setSecureUrl_decode($url);
		if($data != false){
			if (method_exists($this, trim($data['function']))){
				if(!empty($data['params'])){
					return call_user_func_array(array($this, trim($data['function'])), $data['params']);
				}else{
					return $this->$data['function']();
				}
			}
		}
		show_404();
	}
	
	function front_site(){
		$this->_v('dashboard',$data);
	}        
        function notice1(){
            $this->load->view($this->dx_auth->notice);
        }
        
}        
?>
