<?php

class NewsController extends BaseController {

	protected $news;
	
	public function __construct(News $news){
		
		$this->news = $news;
	}

	public function index(){
		
		$news = $this->news->orderBy('sort','ASC')->orderBy('date_publication','DESC')->get();
		return View::make('admin_interface.news.index',compact('news'));
	}

	public function create(){
		
		return View::make('admin_interface.news.create');
	}

	public function store(){
		
		$validation = Validator::make(Input::all(),News::$rules);
		if ($validation->passes()):
			self::save();
			return Redirect::route('control-panel.news.index');
		endif;
		return Redirect::route('control-panel.news.create')->withInput()->withErrors($validation);
	}

	public function show($id){

		$news = $this->news->findOrFail($id);
		return View::make('admin_interface.news.show',compact('news'));
	}

	public function edit($id){
	
		$news = $this->news->find($id);
		if (is_null($news)):
			return Redirect::route('control-panel.news.index');
		endif;
		return View::make('admin_interface.news.edit',array('news'=>$news));
	}

	public function update($id){
		
		$input = array_except(Input::all(),'_method');
		$validation = Validator::make($input,News::$rules);
		if($validation->passes()):
			$news = $this->news->find($id);
			self::save($news);
			return Redirect::route('control-panel.news.show', $id);
		endif;
		return Redirect::route('control-panel.news.edit',$id)->withInput()->withErrors($validation);
	}

	public function destroy($id){
		
		$this->news->find($id)->delete();
		return Redirect::route('control-panel.news.index');
	}
	
	private function save($news = NULL){

		if(is_null($news)):
			$news = $this->news;
		endif;
		$news->title = Input::get('title');
		$news->preview = Input::get('preview');
		$news->content = Input::get('content');
		$news->sort = Input::get('sort');
		$news->date_publication = Input::get('date_publication') == '' ? date("Y-m-d H:i:s") : Input::get('date_publication');
		$news->save();
		$news->touch();
	}

}
