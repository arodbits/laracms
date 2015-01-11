<?php 
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper; 

class AuthWithFacebookController extends BaseController {

	public function facebookCallback(){
		
		try{
			$session = $helper->getSessionFromRedirect();
			die($session);
		}catch(FacebookRequestException $ex){
			// When facebook returns an error
			die($ex);
		}catch(\Exception $e){
			// When validation fails or othe local error
			die($e);
		}
		if($session){
			die('Logged in');
		}else{
			die('error');
		}
	}

	public function facebookRedirect(){

		// The next information is supposed to be in a secure configuration file.
		// FacebookLogin Application Id
		

		FacebookSession::setDefaultApplication($appId, $appSecret);

		$helper = new FacebookRedirectLoginHelper('http://localhost:8000/facebookCallback');
		$helper->disableSessionStatusCheck();
		$loginUrl = $helper->getLoginUrl();

		

	}

}


