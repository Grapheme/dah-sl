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

	public static function stringTranslite($string,$return_length = NULL){

		$rus = array("1","2","3","4","5","6","7","8","9","0","ё","й","ю","ь","ч","щ","ц","у","к","е","н","г","ш","з","х","ъ","ф","ы","в","а","п","р","о","л","д","ж","э","я","с","м","и","т","б","Ё","Й","Ю","Ч","Ь","Щ","Ц","У","К","Е","Н","Г","Ш","З","Х","Ъ","Ф","Ы","В","А","П","Р","О","Л","Д","Ж","Э","Я","С","М","И","Т","Б"," ");
		$eng = array("1","2","3","4","5","6","7","8","9","0","yo","iy","yu","","ch","sh","c","u","k","e","n","g","sh","z","h","","f","y","v","a","p","r","o","l","d","j","е","ya","s","m","i","t","b","Yo","Iy","Yu","CH","","SH","C","U","K","E","N","G","SH","Z","H","","F","Y","V","A","P","R","O","L","D","J","E","YA","S","M","I","T","B","-");
		$string = str_replace($rus,$eng,trim($string));
		if(!empty($string)):
			$string = preg_replace('/[^a-z0-9-]/','',strtolower($string));
			$string = preg_replace('/[-]+/','-',$string);
			if (is_null($return_length)):
				return $string;
			elseif(is_numeric($return_length)):
				return Str::limit($string,$return_length,'');
			endif;

		else:
			return FALSE;
		endif;
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