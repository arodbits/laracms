<?php 

class LoginController extends BaseController{
	
	protected $fbInstance;

	public function __construct(){
		$this->fbInstance = new LaracmsApp\FacebookApi\FacebookLogin(Config::get('facebookApi.callbackUrl'));
	}
		
	public function index(){
		return View::make('auth.login', array('facebookLoginUrl'=>$this->fbInstance->getLoginUrl()));
	}

	public function doLoginWithPassword(){

	}
	public function doLoginWithFacebook(){

	}
	public function facebookCallback(){
		dd($this->fbInstance->getSession()->getToken());
	}

}