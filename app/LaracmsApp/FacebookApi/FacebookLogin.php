<?php 
namespace LaracmsApp\FacebookApi;
use Facebook\FacebookSession;

class FacebookLogin {

	protected $helper;

	public function __construct(){
		// The next information is supposed to be in a secure configuration file.
		// FacebookLogin Application Id
	

		FacebookSession::setDefaultApplication($appId, $appSecret);

		$this->helper = new MyFacebookRedirectLoginHelper('http://localhost:8000/login/facebookCallback');
		
	}

	public function login(){

	}
	public function logout(){

	}
	public function getLoginUrl(){
		$helper = $this->helper;
		return $helper->getLoginUrl();
	}

} 

