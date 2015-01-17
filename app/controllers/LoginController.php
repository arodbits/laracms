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

			$request = new FacebookRequest($session, 'GET', '/me');
			$response = $request->execute();
			$object = $response->getGraphObject('Facebook\GraphUser');
		
			// A class should handle this responsability @param($facebookResponse)
			
			// $user = User::where('email', $object->getEmail())->first();
			$user = App::make("UserRepositoryInterface")->getUser('email',$object->getEmail());
			
			if($user){
				App::make("UserRepositoryInterface")->save($user);
			}
			

			return Redirect::to('dashboard');
			
		}else{

		}

	}   

}



