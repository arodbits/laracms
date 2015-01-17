<?php
namespace LaracmsApp\User;

interface UserRepositoryInterface {

	public function create();

	public function getUser($param, $value);

	public function delete($userId);

	public function all();




}