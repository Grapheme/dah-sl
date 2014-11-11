<?php

class Room_property extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required',
		'class_name' => 'required'
	);
}
