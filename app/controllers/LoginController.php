<?php 
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;

class LoginController extends BaseController{

	public function index(){
		return View::make('auth.login', array('facebookLoginUrl'=>FacebookLogin::getLoginUrl()));
	}

	public function doLoginWithPassword(){
		$username = Input::username();
		$password = Input::password();
	}

	public function facebookCallback(){
		
		$session = FacebookLogin::getSession();

		if($session){

			// This will have a better solution, by now let's just stick to it. 

			$request = new FacebookRequest($session, 'GET', '/me');
			$response = $request->execute();
			$object = $response->getGraphObject();
			dd($object);
		}

	}   

}



