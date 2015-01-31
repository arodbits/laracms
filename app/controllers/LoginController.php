<?php
use LaracmsApp\Authentication\SocialAuthManager;

class LoginController extends BaseController{
	protected $manager;
	public function __construct(SocialAuthManager $manager){
		$this->manager = $manager;
	}

	public function index($provider){
		$socialAgent = $this->manager->get($provider);
		$credentials = $socialAgent->getTemporaryCredentials();

		Session::put('credentials',$credentials);
		Session::save();		

		return $socialAgent->authorize($credentials);
	}

	public function callback($provider){
		$socialAgent = $this->manager->get($provider);

		// Credentials and data
		$tempCredentials=Session::get('credentials');
		
		$oauth_token = Input::get('oauth_token');
		$oauth_verifier = Input::get('oauth_verifier');

		// get accessCredentials 
		$tokenCredentials = $socialAgent->getTokenCredentials($tempCredentials,$oauth_token,$oauth_verifier);
		
		dd($socialAgent->getUserDetails($tokenCredentials)->nickname);

		

			
	}

}