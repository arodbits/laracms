<?php 

class LoginController extends BaseController{


	public function index(){
		$fbLogin = new LaracmsApp\FacebookApi\FacebookLogin();
		$facebookLoginUrl = $fbLogin->getLoginUrl();
		return View::make('auth.login')->with(array('facebookLoginUrl'=>$facebookLoginUrl));
	}

}