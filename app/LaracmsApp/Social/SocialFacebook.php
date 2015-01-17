<?php 
namespace LaracmsApp\Social;
use Facebook\FacebookRequest;
use Facebook\GraphUser;

class SocialFacebook implements SocialInterface{

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

	// Should be the next method part of the class?
	// It looks like NO!
	public function request($session){
		$request = new FacebookRequest($session, 'GET', '/me');
		$resposne = $request->execute();
		$object = $response->getGraphObject('Facebook\UserObject');
		return $object;
	}

} 

