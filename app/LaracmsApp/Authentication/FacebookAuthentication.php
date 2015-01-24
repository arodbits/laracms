<?php 
namespace LaracmsApp\Authentication;
use LaracmsApp\Repository\UserEloquentRepository; 
use LaracmsApp\Facebook\FacebookLogin;
use Facebook\FacebookRequest;
use LaracmsApp\Repository\UserFacebookRepository;


class FacebookAuthentication {
	
	protected $user; 
	protected $facebookLogin;
	protected $session;
	protected $facebookUser; 
	protected $errors = array();

	public function __construct(UserEloquentRepository $user, UserFacebookRepository $facebookUser, FacebookLogin $facebookLogin){
		$this->user = $user;
		$this->facebookLogin = $facebookLogin;
		$this->facebookUser = $facebookUser;
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
			// Get user data from facebook
			$response = $this->facebookUser->getObject($this->session);
			// User Data from our repository
			$userData = $this->user->getFirstBy('facebook_id', $response->getId());

			// The user is already registered
			if($userData){
				$userData->facebook_access_token = $this->session->getToken();
				$userData->save();
			}

			// The user is not yet registered
			else{
				
				$newUser = array(
					"email" => $response->getEmail(),
					"facebook_access_token" => $this->session->getToken(),
					"facebook_id" => $response->getId()
				);

				if(!$this->user->create($newUser)){
					$this->errors[] = "Error creating the user profile";
					return false;
				}
			}
			return true;
		}
		$this->errors[] ="The authentication process did not succeed";
		return false;
	}

	public function errors(){
		return $this->errors;
	}

}