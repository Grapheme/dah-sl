<?php

class AdminController extends BaseController {
	
	public function __construct(){
		
		parent::__construct();
		
		if(Auth::check() === FALSE):
			$this->beforeFilter('login');
		endif;
	}
	
	public function cpanel(){
		
		return View::make('admin_interface.cpanel');
	}
	
}