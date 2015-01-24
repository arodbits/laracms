<?php 
namespace LaracmsApp\Repository;
use Facebook\FacebookRequest;

class UserFacebookRepository {

	protected $session;
	
	private function make($session, $req='/me'){
		$request = new FacebookRequest($session, 'GET', $req);
		return $object = $request->execute();
	}

	public function getObject($session){
		return $this->make($session)->getGraphObject('Facebook\GraphUser');
	}

}