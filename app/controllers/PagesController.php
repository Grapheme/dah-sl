<?php

class PagesController extends BaseController {

	protected $page;

	public function __construct(Page $page){
		$this->page = $page;
	}

	public function index(){

		$pages = $this->page->where('group','static')->get();
		return View::make('admin_interface.pages.index',compact('pages'));
	}

	public function create(){
		
		return View::make('admin_interface.pages.create');
	}

	public function store(){
		
		$input = Input::all();
		$validation = Validator::make($input,Page::$rules);
		if ($validation->passes()):
			$this->page->create($input);
			return Redirect::route('control-panel.pages.index');
		endif;
		return Redirect::route('control-panel.pages.create')->withInput()->withErrors($validation);
	}

	public function show($id){
		
		$page = $this->page->findOrFail($id);
		return View::make('admin_interface.pages.show',compact('page'));
	}

	public function edit($id){
		
		$page = $this->page->find($id);
		if(is_null($page)):
			return Redirect::route('control-panel.pages.index');
		endif;
		return View::make('admin_interface.pages.edit', compact('page'));
	}

	public function update($id){
		
		$input = array_except(Input::all(),'_method');
		$validation = Validator::make($input,Page::$rules);
		if ($validation->passes()):
			$page = $this->page->find($id);
			$page->update($input);
			return Redirect::route('control-panel.pages.show',$id);
		endif;
		return Redirect::route('control-panel.pages.edit', $id)->withInput()->withErrors($validation);
	}

	public function destroy($id){
	
		$this->page->find($id)->delete();
		self::geleteImages('pages',$id);
		return Redirect::route('control-panel.pages.index');
	}

}