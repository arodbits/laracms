<?php 
namespace LaracmsApp\Authentication;

interface AuthenticationInterface {

	public function auth();

	public function save($data);

}