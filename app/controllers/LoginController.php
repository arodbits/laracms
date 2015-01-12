<?php 

class LoginController extends BaseController{
	
	protected $fbInstance;

	public function __construct(){
		$this->fbInstance = Facebook::getFacebookLoginInstance();
	}
		
	public function index(){
		return View::make('auth.login', array('facebookLoginUrl'=>$this->fbInstance->getLoginUrl()));
	}

	public function doLoginWithPassword(){

	}

	public function facebookCallback(){
		if(!$this->fbInstance->getSession());
		dd($this->fbInstance->getSession()->getToken());
	}

}