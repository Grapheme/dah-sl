<?php

class Image extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'image' => 'image,mimes:jpeg,bmp,png',
	);
}
