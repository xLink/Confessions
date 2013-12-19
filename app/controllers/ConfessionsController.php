<?php

use Confessions\Services\Validation\ConfessionValidator;

class ConfessionsController extends BaseController {

	protected $validator;

	public function __construct(ConfessionValidator $validator)
	{
		$this->validator = $validator;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('confessions.index', [
			'confessions' => Confession::orderBy('created_at', 'DESC')->with('user', 'group')->paginate(10),
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('confessions.create', [
			'group' => Input::has('group') ? Group::find(Input::get('group')) : null,
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$form = Input::only('group', 'body', 'anonymous');
		if(!$this->validator->validates($form))
		{
			return Redirect::back()->withErrors($this->validator->errors())->withInput();
		}

		$group = ($form['group']) ? Group::find($form['group']) : false;
		$group = ($group) ? $group->id : null;

		$this->user->confessions()->create([
			'group_id'  => $group,
			'body'      => $form['body'],
			'anonymous' => (bool) $form['anonymous'],
		]);

		Session::flash('success', "Your confession has been posted.");
		if($group)
			return Redirect::route('groups.show', array('id' => $group));
		else
			return Redirect::route('confessions.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$confession = Confession::findOrFail($id);

		return View::make('confessions.show', [
			'confession' => $confession,
		]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$confession = $this->user->confessions()->find($id);
		if(!$confession)
			return Redirect::back()->with('error', "We could not find the specified confession or it did not belong to you.");

		$confession->delete();

		return Redirect::back()->with('success', "Your confession was deleted.");
	}

}
