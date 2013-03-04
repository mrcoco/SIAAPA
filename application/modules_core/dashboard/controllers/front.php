<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Front extends MY_Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	function index(){
		//	1st parameter is controller, 2nd parameter is function/method, and 3th parameter is function's/method's parameters
		$data['url1'] = $this->mza_secureurl->setSecureUrl_encode('count','say',array(1,'plus',2,'equal',3)); // the 3th parameter must be single dimension of array
		$data['url2'] = $this->mza_secureurl->setSecureUrl_encode('front','front_site'); // the function that haven't parameters
		$this->_v('home',$data);
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
		echo "This is front site.";
		if(isset($_POST['test'])){
			echo "<br> from me ".$_POST['test'];
		}
	}
}
?>
