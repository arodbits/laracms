@extends('layout.default')
@section('title')
	LOGIN
@stop

@section('content')
	<h1>LOGIN</h1>
	
	{{Form::open(['Route' => 'login', 'Method'=> 'post'])}}
	{{Form::text('username')}}
	{{Form::password('password')}}
	{{Form::submit('Enter')}}
	{{Form::close()}}

	| OR

	{{HTML::link($facebookLoginUrl, 'Sign in with Facebook')}} | 
	@if(isset($facebookLogoutUrl))
	{{HTML::link($facebookLogoutUrl, 'LogOut')}}
	@endif

@stop