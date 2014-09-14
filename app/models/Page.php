<?php

class Page extends Eloquent {
	
	protected $guarded = array();

	public static $rules = array(
		'page_title' => '',
		'page_description' => '',
		'page_url' => 'required|',
		'page_h1' => '',
		'page_content' => ''
	);
	
	public function room(){
		
		return $this->belongsTo('Room','item_id');
	}
	
	public static function getField($field,$url = 'home'){
		
		if(!Request::is('/')):
			$url = Request::path();
		endif;
		$page = self::where('page_url',$url)->first();
		if(isset($page->$field)):
			return $page->$field;
		else:
			return Config::get('app.default_meta');
		endif;
	}
}
