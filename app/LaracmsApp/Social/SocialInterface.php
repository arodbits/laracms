<?php namespace LaracmsApp\Social;

interface SocialInterface {
	
	public function getSession();
	
	public function getLogoutUrl($next_url);
	
	public function getLoginUrl($permission);

}