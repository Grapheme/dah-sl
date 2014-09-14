<?php

class LoginController extends BaseController {

	public function index(){
		
		Auth::logout();
		return View::make('admin_interface.login');
	}

	public function register(){
		
		return View::make('login.register');
	}

	public function store(){
		
		$rules = array('email'=>'required|email|unique:users,email','password'=>'required|alpha_num|between:4,50','username'=>'required|alpha_num|between:2,20|unique:users,username');
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()):
			return Redirect::back()->withInput()->withErrors($validator);
		endif;
		$user = new User;
		$user->email = Input::get('email');
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->save();
		Auth::loginUsingId($user->id);
		return Redirect::home()->with('message','Thank you for registration, now you can comment on offers!');
	}

	public function login(){
		
		$rules = array('login'=>'required','password'=>'required|min:6');
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()):
			return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));
		elseif(Auth::attempt(array('email'=>Input::get('login'),'password'=>Input::get('password'),'active'=>1),true) || Auth::attempt(array('username'=>Input::get('login'),'password'=>Input::get('password'),'active'=>1),true)):
			return Redirect::intended('control-panel');
		else:
			return Redirect::to('login')->with('message','Неверный пароль или логин')->withInput(Input::except('password'));
		endif;
	}
	
	public function logout(){
		
		Auth::logout();
		return Redirect::to('/');
	}
}
