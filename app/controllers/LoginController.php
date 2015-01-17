<?php 
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use LaracmsApp\Social\SocialInterface as SocialInterface;

class LoginController extends BaseController{
	
	protected $socialInterface; 

	public function __construct(SocialInterface $socialInterface){

		$this->socialInterface = $socialInterface;
	}

	public function index(){
		$permission = array('public_profile','email', 'user_friends');
		return View::make('auth.login', array('facebookLoginUrl'=>$this->socialInterface->getLoginUrl($permission)));
	}

	public function doLoginWithPassword(){
		
	}

	public function facebookCallback(){
		
		if(App::make("LaracmsApp\Authentication\FacebookAuthentication")->auth())
	    	return Redirect::to('dashboard');
	}   

}



