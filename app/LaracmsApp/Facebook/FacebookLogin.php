<?php 
namespace LaracmsApp\Facebook;
use Facebook\FacebookRequest;
use Facebook\FacebookSession;
use Facebook\FacebookRequestException;

class FacebookLogin{

	protected $callbackUrl, $helper;

	public function __construct(FacebookHelper $facebookHelper){
		$this->helper = $facebookHelper;
	}

	public function getLoginUrl(){
		return $this->helper->make()->getLoginUrl();
	}

	public function getSessionFromRedirect(){
		$session = null;
		$helper = $this->helper->make();
		try {
			$session = $helper->getSessionFromRedirect();
		} catch(FacebookRequestException $ex) {
    		
		} catch(\Exception $ex) {
   			// When validation fails or other local issues
		}
		if ($session) {
  			// Logged in.
		}
		return $session;
	}

}