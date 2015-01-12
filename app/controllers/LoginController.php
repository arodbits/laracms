<?php 
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;

class LoginController extends BaseController{

	public function index(){
		return View::make('auth.login', array('facebookLoginUrl'=>Facebook::getLoginUrl()));
	}

	public function doLoginWithPassword(){
		$username = Input::username();
		$password = Input::password();
	}

	public function facebookCallback(){

		// Store the FacebookSession AccessToken
		$fbAccessToken = Facebook::getSession()->getAccessToken();
		Session::set('AccessToken', $fbAccessToken) ?: $fbAccessToken;

	}   

}



