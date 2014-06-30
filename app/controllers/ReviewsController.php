<?php

class ReviewsController extends BaseController {

	protected $review;
	
	public function __construct(Review $review){
		
		$this->review = $review;
	}

	public function index(){
		
		$reviews = $this->review->orderBy('created_at','DESC')->orderBy('sort')->get();
		return View::make('admin_interface.reviews.index',compact('reviews'));
	}

	public function create(){
		
		return View::make('admin_interface.reviews.create',array('raiting' => $this->raiting));
	}

	public function store(){
		
		$validation = Validator::make(Input::all(),Review::$rules);
		if ($validation->passes()):
			self::save();
			return Redirect::route('control-panel.reviews.index');
		endif;
		return Redirect::route('control-panel.reviews.create')->withInput()->withErrors($validation);
	}

	public function show($id){

		$review = $this->review->findOrFail($id);
		return View::make('admin_interface.reviews.show',compact('review'));
	}

	public function edit($id){
	
		$review = $this->review->find($id);
		if (is_null($review)):
			return Redirect::route('control-panel.reviews.index');
		endif;
		return View::make('admin_interface.reviews.edit',array('raiting' => $this->raiting,'review'=>$review));
	}

	public function update($id){
		
		$input = array_except(Input::all(),'_method');
		$validation = Validator::make($input,Review::$rules);
		if($validation->passes()):
			$review = $this->review->find($id);
			self::save($review);
			return Redirect::route('control-panel.reviews.show', $id);
		endif;
		return Redirect::route('control-panel.reviews.edit',$id)->withInput()->withErrors($validation);
	}

	public function destroy($id){
		
		$this->review->find($id)->delete();
		return Redirect::route('control-panel.reviews.index');
	}
	
	private function save($review = NULL){
		
		if(is_null($review)):
			$review = $this->review;
		endif;
		$review->author = Input::get('author');
		$review->email = Input::get('email');
		$review->city = Input::get('city');
		$review->content = Input::get('content');
		$review->admin_answer = Input::get('admin_answer');
		$review->sort = Input::get('sort');
		if(Input::get('raiting')):
			$review->raiting = Input::get('raiting');
		else:
			$review->raiting = 0;
		endif;
		$review->date_publication = Input::get('date_publication');
		if(Input::get('valid')):
			$review->valid = Input::get('valid');
		else:
			$review->valid = 0;
		endif;
		if(Input::hasFile('file')):
			$fileName = str_random(16).'.'.Input::file('file')->getClientOriginalExtension();
			ImageManipulation::make(Input::file('file')->getRealPath())->resize(42,42,TRUE)->save('download/'.$fileName);
			$review->icon = 'download/'.$fileName;
		endif;
		$review->save();
		$review->touch();
	}

}
