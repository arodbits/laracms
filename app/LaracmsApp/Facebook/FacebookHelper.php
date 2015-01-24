<?php 
namespace LaracmsApp\Facebook;
use Facebook\FacebookSession;
use Facebook\FacebookRequest;

class FacebookHelper{
	
	protected $callbackUrl;

	public function __construct(){
		$appId=\Config::get('facebookApi.appId');
		$appSecret=\Config::get('facebookApi.appSecret');
		FacebookSession::setDefaultApplication($appId, $appSecret);
		$this->callbackUrl = \Config::get('facebookApi.callbackUrl');	
	}

	public function make(){
		return new MyFacebookRedirectLoginHelper($this->callbackUrl);
	}

}