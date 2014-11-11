<?php

class Room extends Eloquent {
	
	protected $guarded = array();
	public static $rules = array();
	
	public function page(){
		
		return $this->hasOne('Page','item_id');
	}
	
}
