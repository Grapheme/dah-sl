<?php

class RoomsController extends BaseController {

	protected $room;

	public function __construct(Room $room){
		$this->room = $room;
	}
	
	public function index(){
		
		$rooms = $this->room->all();
		return View::make('admin_interface.rooms.index',compact('rooms'));
	}

	public function create(){
		
		$properties = Room_property::orderBy('sort')->get();
		return View::make('admin_interface.rooms.create',compact('properties'));
	}

	public function store(){
		
		$validation = Validator::make(Input::all(), Room::$rules);
		if ($validation->passes()):
			$this->room->title = Input::get('title');
			$this->room->housing = Input::get('housing');
			$this->room->description = Input::get('description');
			$this->room->small_description = Input::get('small_description');
			$this->room->price = Input::get('price');
			$this->room->place = Input::get('place');
			$this->room->sort = Input::get('sort');
			$this->room->properties = (Input::get('property'))?json_encode(Input::get('property')):'[]';
			if(Input::hasFile('file')):
				$fileName = str_random(16).'.'.Input::file('file')->getClientOriginalExtension();
				Input::file('file')->move(getcwd().'/download',$fileName);
				$this->room->image = 'download/'.$fileName;
			endif;
			$this->room->save();
			self::saveSeoData($this->room->id,'rooms');
			return Redirect::route('control-panel.rooms.index');
		endif;
		return Redirect::route('control-panel.rooms.create')->withInput()->withErrors($validation);
	}

	public function show($id){
		
		$room = $this->room->findOrFail($id);
		return View::make('admin_interface.rooms.show', compact('room'));
	}

	public function edit($id){
		
		$room = $this->room->find($id);
		if (is_null($room)):
			return Redirect::route('rooms.index');
		endif;
		if(!empty($room->properties)):
			$room->properties = json_decode($room->properties,TRUE);
		endif;
		$page = Page::where('group','rooms')->where('item_id',$room->id)->first();
		if(empty($page)):
			self::saveSeoData($id,'rooms');
		endif;
		$properties = Room_property::orderBy('sort')->get();
		return View::make('admin_interface.rooms.edit',compact('room','page','properties'));
	}

	public function update($id){
		
		$validation = Validator::make(Input::all(), Room::$rules);
		if ($validation->passes()):
			$room = $this->room->find($id);
			$room->title = Input::get('title');
			$room->housing = Input::get('housing');
			$room->description = Input::get('description');
			$room->small_description = Input::get('small_description');
			$room->price = Input::get('price');
			$room->place = Input::get('place');
			$room->sort = Input::get('sort');
			$room->properties = (Input::get('property'))?json_encode(Input::get('property')):'[]';
			if(Input::hasFile('file')):
				File::delete(getcwd().'/'.$room->image);
				$fileName = str_random(16).'.'.Input::file('file')->getClientOriginalExtension();
				Input::file('file')->move(getcwd().'/download',$fileName);
				$room->image = 'download/'.$fileName;
			endif;
			$room->save();
			if($page = Page::find(Input::get('page_id'))):
				self::saveSeoData($id,'rooms',$page);
			endif;
			return Redirect::route('control-panel.rooms.show',$id);
		endif;
		return Redirect::route('control-panel.rooms.edit',$id)->withInput()->withErrors($validation);
	}
	
	public function destroy($id){
		
		File::delete(getcwd().'/'.$this->room->find($id)->image);
		self::geleteImages('rooms',$id);
		$this->room->find($id)->delete();
		Page::where('group','rooms')->where('item_id',$id)->delete();
		return Redirect::route('control-panel.rooms.index')->with('message','Номер удален');
	}

}
