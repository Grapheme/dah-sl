<?php

App::before(function($request){});
App::after(function($request,$response){});

Route::filter('admin.auth',function(){
	if(Auth::guest()):
		return Redirect::to('login');
	endif;
});

Route::filter('un_auth',function(){
	if(!Auth::guest()):
		Auth::logout();
	endif;
});


Route::filter('auth.basic',function(){
	return Auth::basic();
});

Route::filter('csrf',function(){
	if(Session::token() != Input::get('_token')):
		throw new Illuminate\Session\TokenMismatchException;
	endif;
});