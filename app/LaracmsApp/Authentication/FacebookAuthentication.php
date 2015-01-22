<?php 
namespace LaracmsApp\Authentication;
use LaracmsApp\Repository\UserEloquentRepository; 
use LaracmsApp\Facebook\FacebookLogin;

class FacebookAuthentication {
	
	protected $user; 
	protected $facebookLogin;

	public function __construct(UserEloquentRepository $user, FacebookLogin $facebookLogin){
		$this->user = $user;
		$this->facebookLogin = $facebookLogin;
	}

	public function getLoginUrl(){
		
		return $this->facebookLogin->getLoginUrl();
	}

	public function getSession(){

		return $this->facebookLogin->getSession();
	}

	public function auth(){
		
	}

}