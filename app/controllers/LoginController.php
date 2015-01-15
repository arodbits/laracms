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
		$username = Input::username();
		$password = Input::password();
	}

	public function facebookCallback(){
		
		$session = FacebookLogin::getSession();

		if($session){

			// This will have a better solution, by now let's just stick to it. 

			$request = new FacebookRequest($session, 'GET', '/me/');
			$response = $request->execute();
			$object = $response->getGraphObject('Facebook\GraphUser');
			

			$user = User::where('email', $object->getEmail())->first();

			if(!$user){
				
				$user = new User();
				$user->email = $object->getEmail();
				$user->facebook_id=$object->getId();
				$user->save();
			}

			$user->facebook_access_token = $session->getToken();
			$user->save();

			return Redirect::to('dashboard');
			
		}

	}   

}



