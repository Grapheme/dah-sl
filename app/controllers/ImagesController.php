<?php

class ImagesController extends BaseController {

	protected $image;

	public function __construct(Image $image){
		$this->image = $image;
	}

	public function index($group = 'pages',$item_id = 0){

		$images = $this->image->where('group',$group)->where('item_id',$item_id)->orderBy('sort')->get();
		foreach($images as $key => $image):
			if(!empty($image->image)):
				$images[$key]->image = json_decode($image->image,TRUE);
			endif;
		endforeach;
		$item = self::getModelItem($group,$item_id);
		return View::make('admin_interface.images.index',compact('images','item'));
	}

	public function create($group = 'pages',$item_id = 0){

		$item = self::getModelItem($group,$item_id);
		return View::make('admin_interface.images.create',compact('item'));
	}

	public function store($group = 'pages',$item_id = 0){

		$validation = Validator::make(Input::all(),Image::$rules);
		if($validation->passes()):
			$this->image->group = $group;
			$this->image->item_id = $item_id;
			$this->image->title = Input::get('title');
			$this->image->sort = Input::get('sort');
			$this->image->link = Input::get('link');
			if(Input::hasFile('file')):
				$fileName = str_random(16).'.'.Input::file('file')->getClientOriginalExtension();
				if(!File::exists(getcwd().'/download/'.$group.'/thumbnail')):
					File::makeDirectory(getcwd().'/download/'.$group.'/thumbnail',0777,TRUE);
				endif;
				ImageManipulation::make(Input::file('file')->getRealPath())->resize(100,100)->save('download/'.$group.'/thumbnail/'.$fileName);
				Input::file('file')->move(getcwd().'/download/'.$group,$fileName);
				$this->image->image = json_encode(array('image'=>'download/'.$group.'/'.$fileName,'thumbnail'=>'download/'.$group.'/thumbnail/'.$fileName));
			endif;
			$this->image->save();
			return Redirect::route('control-panel.images.index',array($group,$item_id));
		endif;
		return Redirect::route('control-panel.images.create',array($group,$item_id))->withInput()->withErrors($validation);
	}

	public function show($id,$group = 'pages',$item_id = 0){

		$image = $this->image->findOrFail($id);
		if(!empty($image->image)):
			$image->image = json_decode($image->image,TRUE);
		endif;
		$item = self::getModelItem($group,$item_id);
		return View::make('admin_interface.images.show',compact('image','item'));
	}

	public function edit($id,$group = 'pages',$item_id = 0){

		$image = $this->image->find($id);
		if(is_null($image)):
			return Redirect::route('control-panel.images.index',array($group,$item_id));
		endif;
		$item = self::getModelItem($group,$item_id);
		return View::make('admin_interface.images.edit',compact('image','item'));
	}

	public function update($id,$group = 'pages',$item_id = 0){

		$input = array_except(Input::all(),'_method');
		$validation = Validator::make($input, Image::$rules);
		if($validation->passes()):
			$image = $this->image->find($id);
			$image->title = Input::get('title');
			$image->sort = Input::get('sort');
			$image->link = Input::get('link');
			if(Input::hasFile('file')):
				if(!empty($image->image)):
					$image->image = json_decode($image->image,TRUE);
					File::delete(getcwd().'/'.$image->image['image']);
					File::delete(getcwd().'/'.$image->image['thumbnail']);
				endif;
				$fileName = str_random(16).'.'.Input::file('file')->getClientOriginalExtension();
				if(!File::exists(getcwd().'/download/'.$group)):
					File::makeDirectory(getcwd().'/download/'.$group,0777,TRUE);
					File::makeDirectory(getcwd().'/download/'.$group.'/thumbnail',0777,TRUE);
				endif;
				ImageManipulation::make(Input::file('file')->getRealPath())->resize(100,100)->save('download/'.$group.'/thumbnail/'.$fileName);
				Input::file('file')->move(getcwd().'/download/'.$group,$fileName);
				$image->image = json_encode(array('image'=>'download/'.$group.'/'.$fileName,'thumbnail'=>'download/'.$group.'/thumbnail/'.$fileName));
			endif;
			$image->save();
			return Redirect::route('control-panel.images.show',array($id,$group,$item_id));

		endif;
		return Redirect::route('control-panel.images.edit', $id)->withInput()->withErrors($validation);
	}

	public function destroy($id,$group = 'pages',$item_id = 0){

		$image = $this->image->find($id);
		if(!empty($image->image)):
			$image->image = json_decode($image->image,TRUE);
			File::delete(getcwd().'/'.$image->image['image']);
			File::delete(getcwd().'/'.$image->image['thumbnail']);
		endif;
		$image->delete();
		return Redirect::route('control-panel.images.index',array($group,$item_id));
	}

	private function getModelItem($group,$item_id){

		switch($group):
			case 'rooms':
				$item = Room::findOrFail($item_id);
				break;
			case 'services':
				$item = Service::findOrFail($item_id);
				break;
			case 'sights':
				$item = Sight::findOrFail($item_id);
				break;
			case 'actions':
				$item = Action::findOrFail($item_id);
				$item->title = $item->name;
				break;
			default: $model = new Page;
				$item = $model::findOrFail($item_id);
				$item->title = $item->page_title;
				break;
		endswitch;
		return $item;
	}
}
