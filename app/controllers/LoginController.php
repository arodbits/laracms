<?php 
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;

class LoginController extends BaseController{

	public function index(){
		$permission = array('public_profile','email', 'user_friends');
		return View::make('auth.login', array('facebookLoginUrl'=>FacebookLogin::getLoginUrl($permission)));
	}

	public function doLoginWithPassword(){
		
	}

	public function facebookCallback(){
		
		if(App::make("FacebookAuthentication")->auth())
	    	return Redirect::to('dashboard');
	}   

}



