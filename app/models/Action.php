<?php

class Action extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'order' => 'required',
		#'short' => 'required',
		#'image' => 'required',
		'link' => 'required'
	);

	#public static $msgs = array(
	#    'name.required' => 'имя не пустое',
	#);
}
