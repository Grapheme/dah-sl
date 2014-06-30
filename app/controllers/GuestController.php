<?php

class GuestController extends BaseController {

	public function __construct(){

		parent::__construct();
	}

	public function index(){

		$sights = Sight::orderBy('sort')->get();
		$rooms = Room::orderBy('sort')->get();
		$images = array();
		if($page = Page::where('page_url','home')->first()):
			$images = self::getImagesItem('pages',$page->id);
		endif;
		return View::make('users_interface.index',compact('sights','rooms','images'));
	}

	public function templates($url){

		if($page = Page::where('page_url',$url)->first()):
			$images = self::getImagesItem('pages',$page->id);
			return View::make('users_interface.templates',array('content'=>$page['page_content'],'images'=>$images));
		else:
			return App::abort(404);
		endif;

	}

	public function services(){

		$services =  DB::table('services')->join('pages','services.id','=','pages.item_id')
			->where('pages.group','services')->orderBy('services.sort')->get(array('services.*', 'pages.page_url'));
		return View::make('users_interface.services',compact('services'));
	}

	public function service($title){

		if($page = Page::where('page_url',Request::segment(2))->where('group','services')->first()):
			if($service = Service::find($page->item_id)):
				$images = self::getImagesItem('services',$service->id);
				return View::make('users_interface.service',compact('service','page','images'));
			endif;
		endif;
		return App::abort(404);
	}

	public function sights(){

		$sights =  DB::table('sights')->join('pages','sights.id','=','pages.item_id')
			->where('pages.group','sights')->orderBy('sights.sort')->get(array('sights.*', 'pages.page_url'));
		return View::make('users_interface.sights',compact('sights'));
	}

	public function sight($title){

		if($page = Page::where('page_url',Request::segment(2))->where('group','sights')->first()):
			if($sight = Sight::find($page->item_id)):
				$images = self::getImagesItem('sights',$sight->id);
				return View::make('users_interface.sight',compact('sight','page','images'));
			endif;
		endif;
		return App::abort(404);
	}

	public function rooms(){

		$rooms =  DB::table('rooms')->join('pages','rooms.id','=','pages.item_id')->where('pages.group','rooms')
			->orderBy('rooms.sort')->get(array('rooms.*', 'pages.page_url'));
		$properties = Room_property::orderBy('sort')->get();
		foreach($rooms as $key => $room):
			$rooms[$key]->properties = json_decode($room->properties,TRUE);
		endforeach;
		return View::make('users_interface.roomlist',compact('rooms','properties'));
	}

	public function room(){

		if($page = Page::where('page_url',Request::path())->where('group','rooms')->first()):
			if($room = Room::find($page->item_id)):
				$images = self::getImagesItem('rooms',$room->id);
				return View::make('users_interface.room',compact('room','page','images'));
			endif;
		endif;
		return App::abort(404);
	}

	public function reviews(){

		$reviews = Review::where('valid',1)
			->orderBy('created_at','DESC')->orderBy('sort')
			->take($this->skip_rows)->skip(0)->get();
		$more = FALSE;
		if($reviews->count() < Review::count()):
			$more = $this->skip_rows;
		endif;
		$raiting = $this->raiting;
		return View::make('users_interface.reviews',compact('reviews','raiting','more'));
	}

	public function restaurant(){

		if($page = Page::where('page_url',Request::path())->first()):
			$images = self::getImagesItem('pages',$page->id);
			return View::make('users_interface.restaurant',array('content'=>$page['page_content'],'images'=>$images));
		else:
			return App::abort(404);
		endif;
	}

	public function reservation(){

		$rules = array('date-in'=>'required','date-out'=>'required','number'=>'required');
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()):
			return Redirect::to('/')->withErrors($validator)->withInput();
		else:
			return Redirect::to('rooms/booking')->withInput();
		endif;
	}

	public function RoomsBooking($room_id = NULL){

		if(!is_null($room_id)):
			return Redirect::to('rooms/booking')->with('number',$room_id);
		endif;
		$rooms = Room::orderBy('sort')->get();
		$json = Room::select(array('id','title','small_description','price'))->orderBy('sort')->get()->toArray();
		foreach($json as $key => $value):
			$json_room[$value['title']] = array('id'=>$value['id'],'price'=>$value['price'],'text'=>$value['small_description']);
		endforeach;
		return View::make('users_interface.booking',array('rooms'=>$rooms,'json_rooms'=>json_encode($json_room)));
	}

	public function ServicesBooking($service_id = NULL){

		if(!is_null($service_id)):
			return Redirect::to('services/booking')->with('service',$service_id);
		endif;
		$services = Service::orderBy('sort')->get();
		return View::make('users_interface.services-booking',compact('services'));
	}

    public function showActions() {    	$actions = Action::orderBy('order')->orderBy('created_at', 'DESC')->get();
    	foreach($actions as $a => $action) {            $images = self::getImagesItem('actions', $action->id);
            if (!is_object($images->first())) {            	## Не отображать акции без картинки
                unset($actions[$a]);
                #continue;
            } else {
                $action->image = $images->first()->image['image'];
                $actions[$a] = $action;
            }
    	}
    	return View::make('users_interface.actions',compact('actions'));
    }

	private function getImagesItem($group,$item_id){

		$images = Image::where('group',$group)->where('item_id',$item_id)->orderBy('sort')->get();
		foreach($images as $key => $image):
			if(!empty($image->image)):
				$images[$key]->image = json_decode($image->image,TRUE);
			endif;
		endforeach;
		return $images;
	}

}