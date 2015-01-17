<?php 
namespace LaracmsApp\User;

interface UserHandlerInterface {

	public function save($data);
	public function delete($id);
	

}