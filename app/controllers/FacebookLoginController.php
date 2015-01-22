<?php 

use LaracmsApp\Authentication\FacebookAuthentication;

class FacebookLoginController extends BaseController{
	
	protected $auth;

	public function __construct(FacebookAuthentication $auth){
		$this->auth=$auth;
		
	}
	public function index(){
		return View::make('auth.login',array('loginUrl'=>$this->auth->getLoginUrl()));
		
	}

	public function facebookCallback(){
		dd($this->auth->getSession());
	}

	

}



