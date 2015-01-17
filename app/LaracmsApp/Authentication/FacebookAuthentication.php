<?php namespace LaracmsApp\Authentication;
use LaracmsApp\User\UserRepositoryInterface;
use LaracmsApp\Social\SocialInterface; 

class FacebookAuthentication implements AuthenticationInterface {

	protected $user, $social;
	
	public function __construct(UserRepositoryInterface $user, SocialInterface $social){
		$this->user = $user;
		$this->social = $social;
	}

	public function auth(){
		$session = $this->social->getSession();

		if($session){
			$object = $this->social->request($session);
			$user = $this->user->getUser('email',$object->getEmail());
			if(!$user){
				$user = $this->user->create();
				$user->facebook_id=$object->getId();
				$user->email = $object->getEmail();
			}
			$user->facebook_access_token = $session->getToken();
			$user->save();
			return true;
		}
		return false;
	}

}