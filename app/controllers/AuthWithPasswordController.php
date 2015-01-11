<?php 

class AuthWithPasswordController extends BaseController {

	public function index(){
		return View::make('auth.login');
	}

	public function doLogin(){
		dd('Stable');
	}

	public function create(){

	}

	public function store(){

	}

}



