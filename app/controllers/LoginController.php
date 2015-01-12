<?php 
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;

class LoginController extends BaseController{
	
	protected $fbInstance;

	public function __construct(){
		$this->fbInstance = Facebook::getFacebookLoginInstance();
	}

	public function index(){
		
		return View::make('auth.login', array('facebookLoginUrl'=>$this->fbInstance->getLoginUrl()));
	}

	public function doLoginWithPassword(){
		$username = Input::username();
		$password = Input::password();
	}

	public function facebookCallback(){
		
		// dd($this->fbInstance->getSession());
		// 
		// if($session) {
		$session = $this->fbInstance->getSession();
		
		try {
			$user_profile = (new FacebookRequest(
				$session, 'GET', '/me'
				))->execute()->getGraphObject(GraphUser::className());

			echo "Name: " . $user_profile->getName();

		} catch(FacebookRequestException $e) {

			echo "Exception occured, code: " . $e->getCode();
			echo " with message: " . $e->getMessage();

		}   

	}


}



