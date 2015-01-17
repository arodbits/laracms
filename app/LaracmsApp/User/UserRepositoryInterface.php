<?php
namespace LaracmsApp\User;

interface UserRepositoryInterface {

	public function save($user);

	public function getUser($param, $value);

	public function delete($userId);

	public function all();




}