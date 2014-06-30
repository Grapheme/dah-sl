<?php

class Bills extends Eloquent {
	
	protected $table = "bills";
	
	protected $guarded = array('id');


	public static function validate($input) {
		
		$rules = array(
			'payer'   => 'required',
			'service' => 'required',
			'price'   => 'required|numeric|min:1',
		);
//		'id'	  => 'required|numeric|unique:bills,id'
		return Validator::make($input, $rules);
	}
}
