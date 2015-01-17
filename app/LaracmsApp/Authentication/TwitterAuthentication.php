<?php
namespace LaracmsApp\Authentication;
use LaracmsApp\User\UserRepositoryInterface;

class TwitterAuthentication implements AuthenticationInterface {

	protected $user;
	
	public function __construct(UserRepositoryInterface $user){
		$this->user = $user;
	}

	public function save($data){
		$this->user->save($data);
	}

	public function auth(){
		$this->user->getUser('email',$object->getEmail());
	}

}