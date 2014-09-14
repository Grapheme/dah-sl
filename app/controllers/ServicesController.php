<?php

class ServicesController extends BaseController {

	protected $service;

	public function __construct(Service $service){
		$this->service = $service;
	}

	public function index(){
		
		$services = $this->service->all();
		return View::make('admin_interface.services.index',compact('services'));
	}

	public function create(){
		
		return View::make('admin_interface.services.create');
	}

	public function store(){
		
		$validation = Validator::make(Input::all(), Service::$rules);
		if($validation->passes()):
			self::saveService();
			self::saveSeoData($this->service->id,'services');
			return Redirect::route('control-panel.services.index');
		endif;
		return Redirect::route('control-panel.services.create')->withInput()->withErrors($validation);
	}

	public function show($id){
		
		$service = $this->service->findOrFail($id);
		return View::make('admin_interface.services.show',compact('service'));
	}

	public function edit($id){
		
		$service = $this->service->find($id);
		if(is_null($service)):
			return Redirect::route('control-panel.services.index');
		endif;
		$page = Page::where('group','services')->where('item_id',$service->id)->first();
		if(empty($page)):
			$page = self::saveSeoData($id,'services');
		endif;
		return View::make('admin_interface.services.edit',compact('service','page'));
	}

	public function update($id){

		$input = array_except(Input::all(),'_method');
		$validation = Validator::make($input, Service::$rules);
		if ($validation->passes()):
			$service = $this->service->find($id);
			self::saveService($service);
			if($page = Page::find(Input::get('page_id'))):
				self::saveSeoData($id,'services',$page);
			endif;
			return Redirect::route('control-panel.services.show', $id);
		endif;
		return Redirect::route('control-panel.services.edit',$id)->withInput()->withErrors($validation);
	}

	public function destroy($id){
		
		File::delete(getcwd().'/'.$this->service->find($id)->photo);
		self::geleteImages('services',$id);
		$this->service->find($id)->delete();
		Page::where('group','services')->where('item_id',$id)->delete();
		return Redirect::route('control-panel.services.index');
	}
	
	private function saveService($service = NULL){
		
		if(is_null($service)):
			$service = $this->service;
		endif;
		$service->title = Input::get('title');
		$service->list_text = Input::get('list_text');
		$service->short_description = Input::get('short_description');
		$service->description = Input::get('description');
		$service->prices = Input::get('prices');
		$service->sort = Input::get('sort');
		if(Input::get('booking')):
			$service->booking = 1;
		else:
			$service->booking = 0;
		endif;
		
		if(Input::hasFile('file')):
			$fileName = str_random(16).'.'.Input::file('file')->getClientOriginalExtension();
			Input::file('file')->move(getcwd().'/download/services',$fileName);
			$service->photo = 'download/services/'.$fileName;
		endif;
		$service->save();
		$service->touch();
		return $service->id;
	}
	
}
