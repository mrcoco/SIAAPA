<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Count extends MY_Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	function index(){}
	
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

	function say($a, $b, $c, $d, $e){
		echo "$a $b $c $d $e";
	}
}
?>
