<?php

class Room_propertiesController extends BaseController {

	protected $room_property;

	public function __construct(Room_property $room_property){
		$this->room_property = $room_property;
	}

	public function index(){
		
		$room_properties = $this->room_property->orderBy('sort')->get();
		return View::make('admin_interface.room_properties.index',compact('room_properties'));
	}

	public function create(){
		
		return View::make('admin_interface.room_properties.create');
	}

	public function store(){
		
		$input = Input::all();
		$validation = Validator::make($input, Room_property::$rules);
		if ($validation->passes()):
			$this->room_property->create($input);
			return Redirect::route('control-panel.room_properties.index');
		endif;
		return Redirect::route('control-panel.room_properties.create')->withInput()->withErrors($validation);
	}

	public function show($id){
		
		$room_property = $this->room_property->findOrFail($id);
		return View::make('admin_interface.room_properties.show', compact('room_property'));
	}

	public function edit($id){
		$room_property = $this->room_property->find($id);
		if(is_null($room_property)):
			return Redirect::route('control-panel.room_properties.index');
		endif;
		return View::make('admin_interface.room_properties.edit', compact('room_property'));
	}

	public function update($id){
		
		$input = array_except(Input::all(),'_method');
		$validation = Validator::make($input, Room_property::$rules);
		if($validation->passes()):
			$room_property = $this->room_property->find($id);
			$room_property->update($input);
			return Redirect::route('control-panel.room_properties.show',$id);
		endif;
		return Redirect::route('control-panel.room_properties.edit',$id)->withInput()->withErrors($validation);
	}

	public function destroy($id){
	
		$this->room_property->find($id)->delete();
		return Redirect::route('control-panel.room_properties.index');
	}

}
