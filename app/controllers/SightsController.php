<?php

class SightsController extends BaseController {

	protected $sight;

	public function __construct(Sight $sight){
		$this->sight = $sight;
	}

	public function index(){
		
		$sights = $this->sight->all();
		return View::make('admin_interface.sights.index',compact('sights'));
	}

	public function create(){
		
		return View::make('admin_interface.sights.create');
	}

	public function store(){

		$validation = Validator::make(Input::all(),Sight::$rules);
		if($validation->passes()):
            $sightID = self::saveSights();
			self::saveSeoData($sightID,'sights');
			return Redirect::route('control-panel.sights.index');
		endif;
		return Redirect::route('control-panel.sights.create')->withInput()->withErrors($validation);
	}

	public function show($id){
		
		$sight = $this->sight->findOrFail($id);
		return View::make('admin_interface.sights.show', compact('sight'));
	}

	public function edit($id){
		
		$sight = $this->sight->find($id);
		if(is_null($sight)):
			return Redirect::route('control-panel.sights.index');
		endif;
		$page = Page::where('group','sights')->where('item_id',$sight->id)->first();
		if(empty($page)):
			$page = self::saveSeoData($id,'sights');
		endif;
		return View::make('admin_interface.sights.edit',compact('sight','page'));
	}

	public function update($id){
		
		$input = array_except(Input::all(),'_method');
		$validation = Validator::make($input, Sight::$rules);
		if($validation->passes()):
			$sight = $this->sight->find($id);
			self::saveSights($sight);
			if($page = Page::find(Input::get('page_id'))):
				self::saveSeoData($id,'sights',$page);
			endif;
			return Redirect::route('control-panel.sights.show', $id);
		endif;
		return Redirect::route('control-panel.sights.edit',$id)->withInput()->withErrors($validation);
	}

	public function destroy($id){
		
		File::delete(getcwd().'/'.$this->sight->find($id)->photo);
		self::geleteImages('sights',$id);
		$this->sight->find($id)->delete();
		Page::where('group','sights')->where('item_id',$id)->delete();
		return Redirect::route('control-panel.sights.index');
	}
	
	private function saveSights($sight = NULL){
		
		if(is_null($sight)):
			$sight = $this->sight;
		endif;
		$sight->title = Input::get('title');
		$sight->description = Input::get('description');
		$sight->sort = Input::get('sort');
		if(Input::hasFile('file')):
			File::delete(getcwd().'/'.$sight->photo);
			$fileName = str_random(16).'.'.Input::file('file')->getClientOriginalExtension();
			Input::file('file')->move(getcwd().'/download/sights',$fileName);
			$sight->photo = 'download/sights/'.$fileName;
		endif;
		$sight->save();
		$sight->touch();
		return $sight->id;
	}
}
