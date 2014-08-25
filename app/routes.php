<?php

/*************************************************** LOGIN INTRERFACE ***********************************************/
Route::get('logout',array('as'=>'login.logout','uses'=>'LoginController@logout'));
Route::group(array('before'=>'un_auth'),function(){
	Route::get('login',array('as'=>'login.index','uses'=>'LoginController@index'));
	Route::post('login',array('uses'=>'LoginController@login'));
});
/*************************************************** GUEST INTRERFACE ***********************************************/
Route::get('/','GuestController@index');
Route::get('login',function(){return View::make('admin_interface.login');});
Route::get('about', function(){return View::make('users_interface.about');});

Route::get('rooms/booking','GuestController@RoomsBooking');
Route::get('rooms/booking/{room_id}','GuestController@RoomsBooking');

Route::get('services/booking','GuestController@ServicesBooking');
Route::get('services/booking/{service_id}','GuestController@ServicesBooking');

Route::get('services','GuestController@services');
Route::get('services/{title}','GuestController@service');

Route::get('reviews','GuestController@reviews');

Route::get('contacts', function(){return View::make('users_interface.contacts');});
Route::get('sights','GuestController@sights');
Route::get('sights/{title}','GuestController@sight');

Route::get('restaurant','GuestController@restaurant');
Route::get('payment', function(){return View::make('users_interface.payment');});

Route::get('rooms',"GuestController@rooms");
Route::get('rooms/{name}',"GuestController@room");

Route::post('send-reservation',"GuestController@reservation");
/*=================== BILLS ==================*/
Route::get('payment/form','PaymentController@paymentForm');
Route::post('payment/form','PaymentController@paymentForm');
Route::post('payment/callback','PaymentController@paymentCallback');
Route::get('payment/callback','PaymentController@paymentCallback');
Route::get('payment/success','PaymentController@onSuccess');
Route::get('payment/fail','PaymentController@onFail');
Route::get('payment/return','PaymentController@onReturn');
/*********************************************** GUEST AJAX INTRERFACE ***********************************************/
Route::post('send-booking',"GuestAjaxController@booking");
Route::post('send-sevice-booking',"GuestAjaxController@service_booking");
Route::post('send-review',"GuestAjaxController@review");
Route::post('reviews/load-reviews','GuestAjaxController@load_reviews');
/*************************************************** ADMIN INTRERFACE ***********************************************/
Route::get('password/reset/{token}',function($token) {
	return View::make('admin_interface.password-reset')->with('token',$token);
});
Route::post('password/reset/{token}',function(){
	$credentials = array('email' => Input::get('email'));
	return Password::reset($credentials,function($user,$password){
		$user->password = Hash::make($password);
		$user->save();
		return Redirect::to('login');
	});
});
Route::group(array('before'=>'admin.auth'),function(){
	Route::get('control-panel/password-remind',function(){return View::make('admin_interface.password-remind');});
	Route::post('control-panel/password-remind',function(){
		$credentials = array('email' => Input::get('email'));
		return Password::remind($credentials, function ($message, $user) {
			$message->subject('Сброс пароля администратора.');
			$message->from('dah-sl@yandex.ru','Даховская Слобода');
		});
	});
	Route::get('control-panel',array('as'=>'cpanel','uses'=>'AdminController@cpanel'));
	/*=================== IMAGES ===================*/
	Route::get('control-panel/images/{group}/{item_id}',array('as'=>'control-panel.images.index','uses'=>'ImagesController@index'));
	Route::get('control-panel/images/create/{group}/{item_id}',array('as'=>'control-panel.images.create','uses'=>'ImagesController@create'));
	Route::post('control-panel/images/store/{group}/{item_id}',array('as'=>'control-panel.images.store','uses'=>'ImagesController@store'));
	Route::get('control-panel/images/{id}/edit/{group}/{item_id}',array('as'=>'control-panel.images.edit','uses'=>'ImagesController@edit'));
	Route::patch('control-panel/images/{id}/{group}/{item_id}',array('as'=>'control-panel.images.update','uses'=>'ImagesController@update'));
	Route::get('control-panel/images/{id}/{group}/{item_id}',array('as'=>'control-panel.images.show','uses'=>'ImagesController@show'));
	Route::delete('control-panel/images/{id}/{group}/{item_id}',array('as'=>'control-panel.images.destroy','uses'=>'ImagesController@destroy'));
	/*==================== ROOMS ===================*/
	Route::resource('control-panel/rooms','RoomsController');
	Route::resource('control-panel/room_properties','Room_propertiesController');
	/*=================== REVIEWS ==================*/
	Route::resource('control-panel/reviews','ReviewsController');
	/*==================== PAGES ===================*/
	Route::resource('control-panel/pages','PagesController');
	/*================== SERVICES ==================*/
	Route::resource('control-panel/services','ServicesController');
	/*=================== SIGHTS ==================*/
	Route::resource('control-panel/sights','SightsController');
	/*=================== BILLS ==================*/
	Route::resource('control-panel/bills','BillsController');
	Route::get('control-panel/bills/{id}/delete','BillsController@delete');
	Route::get('control-panel/statistic/bills/year/{year}',array('as'=>'control-panel.statistic','uses'=>'BillsController@statistic'));

	/*=================== ACTIONS ==================*/
    Route::resource('control-panel/actions', 'ActionsController');

});
Route::resource('actions', 'GuestController@showActions');
Route::get("{url}",'GuestController@templates');