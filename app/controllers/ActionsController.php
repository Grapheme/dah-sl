<?php

class ActionsController extends BaseController {

	/**
	 * Action Repository
	 *
	 * @var Action
	 */
	protected $action;

	public function __construct(Action $action)
	{
		$this->action = $action;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$actions = $this->action->orderBy('order')->get();

		return View::make('admin_interface.actions.index', compact('actions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin_interface.actions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Action::$rules);

		if ($validation->passes())
		{
			$action = $this->action->create($input);

			#return Redirect::route('control-panel.actions.index');
			return Redirect::route('control-panel.images.create',array('actions',$action->id));
		}

		return Redirect::route('control-panel.actions.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	    ## DON'T USE

		$action = $this->action->findOrFail($id);

		return View::make('admin_interface.actions.show', compact('action'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$action = $this->action->find($id);

		if (is_null($action))
		{
			return Redirect::route('control-panel.actions.index');
		}

		return View::make('admin_interface.actions.edit', compact('action'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Action::$rules); ## , Action::$msgs

		if ($validation->passes())
		{
			$action = $this->action->find($id);
			$action->update($input);

			return Redirect::route('control-panel.actions.index');
		}

		return Redirect::route('control-panel.actions.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->action->find($id)->delete();

		return Redirect::route('control-panel.actions.index');
	}

}
