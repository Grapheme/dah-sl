<?php

class BaseController extends Controller{

	protected function setupLayout(){
		
		if ( ! is_null($this->layout)):
			$this->layout = View::make($this->layout);
		endif;
	}
	
	protected $skip_rows = 5;
	
	protected $raiting = array('Плохо','Неплохо','Хорошо','Отлично','Супер!');
	
	public function __construct() {

	}
	
	public function getView($view_path,$data = NULL){
		
		ob_start();
			echo View::make($view_path,$data);
		return ob_get_clean();
	}
	
	public function geleteImages($group,$item_id){
		
		if($images = Image::where('group',$group)->where('item_id',$item_id)->get()):
			foreach($images as $image):
				if(!empty($image->image)):
					$image->image = json_decode($image->image,TRUE);
					File::delete(getcwd().'/'.$image->image['image']);
					File::delete(getcwd().'/'.$image->image['thumbnail']);
				endif;
			endforeach;
			Image::where('group',$group)->where('item_id',$item_id)->delete();
		endif;
	}

	public function saveSeoData($item_id,$group,$page = NULL){
		
		if(is_null($page)):
			$page = new Page;
		endif;
		$input = Input::all();
		if(!empty($input)):
			$page->page_title = Input::get('page_title');
			$page->page_description = Input::get('page_description');
			$page->page_url = Input::get('page_url');
			$page->page_h1 = Input::get('page_h1');
		endif;
		$page->group = $group;
		$page->item_id = $item_id;
		$page->save();
		$page->touch();
		return $page;
	}
}