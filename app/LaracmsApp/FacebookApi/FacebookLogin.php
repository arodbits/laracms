<?php 
namespace LaracmsApp\FacebookApi;
use Facebook\FacebookRequest;
use Facebook\GraphUser;

class FacebookLogin {

	protected $helper;

	public function __construct(MyFacebookRedirectLoginHelper $helper){
		$this->helper = $helper;
	}

	/*
	 * @return FacebookSession object 
	 */
	public function getSession(){
		try{
			$session = $this->helper->getSessionFromRedirect();
		}catch(FacebookSessionException $ex){
			die($ex);
		}catch(\Exception $e){
			die($e);
		}
		return $session;
	}
	/*
	 * @param next_url  
	 */
	public function getLogoutUrl($next_url){
		
	}
	/*
	 * @return String url 
	 */
	public function getLoginUrl($permission=array()){
		return $this->helper->getLoginUrl($permission);
	}

} 

