<?php 
namespace LaracmsApp\Validator2;

interface ValidableInterface {
	public function passes();
	public function with(array $data);
	public function errors();
}