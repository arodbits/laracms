<?php 
namespace LaracmsApp\User;

class UserMySQLRepository implements UserRepositoryInterface{

	
	public function save($user){

	}

	public function getUser($param, $value){
		return \User::where($param, $value)->first();
	}

	public function delete($userId){

	}

	public function all(){
		return \User::all()->toArray();
	}

}

