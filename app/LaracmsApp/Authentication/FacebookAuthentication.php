<?php
namespace LaracmsApp\Authentication;
use LaracmsApp\User\UserRepositoryInterface;
use LaracmsApp\Social\SocialInterface; 

class FacebookAuthentication implements AuthenticationInterface {

	protected $user, $social;
	
	public function __construct(UserRepositoryInterface $user, SocialInterface $social){
		$this->user = $user;
		$this->social = $social;
	}

	public function save($user){
		$user->email = $this->social->getEmail();
		$user->facebook_id = $social->getId();
		$user->save($data);
	}

	public function isAuthenticated(){
		return $this->social->getSession();
	}

	public function auth(){
		$session = $this->isAuthenticated();
		if($session){
			$object = $this->social->request($session);
			$user = $this->user->getUser('email',$object->getEmail());
			if(!$user){
				User::create($data);
			}
			$user->facebook_access_token = $this->social->getToken();
			$user->save();
			return true;
		}
		return false;
	}

}