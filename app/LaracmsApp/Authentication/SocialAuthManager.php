<?php 

class SocialAuthManager {
	private $providers = array();

	public function set($providerName, $providerInstance){
		$this->providers[$providerName]=$providerInstance;
	}

	public function get($provider){
		if(!array_key_exists($provider, $this->providers)){
			return false;
		}
		return $this->providers[$provider];
	}
}