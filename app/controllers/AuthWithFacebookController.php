<?php 
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper; 

class AuthWithFacebookController extends BaseController {

	public function facebookCallback(){
		
		// try{
		// 	$session = $helper->getSessionFromRedirect();
		// 	die($session);
		// }catch(FacebookRequestException $ex){
		// 	// When facebook returns an error
		// 	die($ex);
		// }catch(\Exception $e){
		// 	// When validation fails or othe local error
		// 	die($e);
		// }
		// if($session){
		// 	die('Logged in');
		// }else{
		// 	die('error');
		// }

		dd(Session::get('state'));
	}

	public function facebookRedirect(){

		
		
		

	}

}




