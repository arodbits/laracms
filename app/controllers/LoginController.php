<?php


class LoginController extends BaseController{
	protected $manager;
	public function __construct(SocialProviderMaganer $manager){
		$this->manager = $manager;
	}

	public function index($provider){
		$socialAgent = $this->manager->getProvider($provider);
		$tmp = $socialAgent->getTemporatyCredentials();
	}

	public function callback($provider){

	}

}