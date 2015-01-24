<?php 
namespace LaracmsApp\Authentication;
use LaracmsApp\Repository\UserEloquentRepository; 
use LaracmsApp\Facebook\FacebookLogin;
use Facebook\FacebookRequest;
use LaracmsApp\Repository\UserFacebookRepository;
use LaracmsApp\Validator2\FacebookUserCreateValidator;

class FacebookAuthentication {
	
	protected $user; 
	protected $facebookLogin;
	protected $session;
	protected $facebookUser; 
	protected $errors = array();
	protected $validator;
	protected $userModel;

	public function __construct(FacebookUserCreateValidator $validator, UserEloquentRepository $user, UserFacebookRepository $facebookUser, FacebookLogin $facebookLogin){
		$this->user = $user;
		$this->facebookLogin = $facebookLogin;
		$this->facebookUser = $facebookUser;
		$this->validator = $validator;
	}

	public function getLoginUrl(){
		
		return $this->facebookLogin->getLoginUrl();
	}

	public function getSessionFromRedirect(){

		$this->session = $this->facebookLogin->getSessionFromRedirect();
		return $this->session;
	}

	public function authenticate(){
		// If a session is returned from getSessionFromRedirect, the user is already authenticated. 
		// We don't know if the user is registered. 
		if ($this->session){
			// User Data from our repository
			$facebookUser = $this->getFacebookUser();
			$this->userModel = $this->getUserFromRepository($facebookUser->getId());
			// The user is already registered
			if($this->userModel){
				$this->userModel->facebook_access_token = $this->session->getToken();
				$this->userModel->save();
			}
			// The user got authenticated and Authorized
			else if(!$this->registerUser($this->getFacebookUser()))
				return false;

			\Auth::login($this->userModel);
			return true;
		}
		$this->errors[] ="The authentication process did not succeed";
		return false;
	}

	private function getUserFromRepository($fbId){
		// Get user data from facebook
		return $this->user->getFirstBy('facebook_id', $fbId);
	}

	private function getFacebookUser(){
		return $this->facebookUser->getObject($this->session);
	}

	private function registerUser($response){
		$newUser = array(
			"email" =>$response->getEmail(),
			"facebook_access_token" => $this->session->getToken(),
			"facebook_id" => $response->getId()
		);

		if($this->validate($userData)){
			$this->userModel = $this->user->create($newUser);
			return true;
		}
		return false;
	}

	private function validate(){
		$isValid = $this->validator->with($userData)->passes();
		if($isValid)
			return true;
		$this->errors[] = $this->validator->errors();
		return false;
	}

	public function errors(){
		return $this->errors;
	}

}