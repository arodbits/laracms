<?php 
namespace LaracmsApp\FacebookApi;


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
	 * @param next_url redirect url 
	 */
	public function getLogoutUrl($next_url){
		$session = $this->getSession();
		$this->helper->getLogoutUrl($session, $next_url);
	}
	/*
	 * @return String url 
	 */
	public function getLoginUrl(){
		return $this->helper->getLoginUrl();
	}



} 

