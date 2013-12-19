<?php

use Confessions\Services\Validation\GroupValidator;

class GroupsController extends BaseController {

	protected $validator;

	public function __construct(GroupValidator $validator)
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
		return View::make('groups.index', [
			'groups' => Group::orderBy('created_at', 'DESC')->paginate(10),
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('groups.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$form = Input::only('name', 'description');
		if(!$this->validator->validates($form))
		{
			return Redirect::route('groups.create')->withErrors($this->validator->errors())->withInput();
		}

		$this->user->groups()->create($form);

		return Redirect::route('groups.index')->with('success', "Your group has been created.");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$group       = Group::findOrFail($id);
		$confessions = $group->confessions()->orderBy('created_at', 'DESC')->with('user', 'group')->paginate(10);

		return View::make('groups.show', [
			'group'       => $group,
			'confessions' => $confessions,
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$group = $this->user->groups()->find($id);
		if(!$group)
			return Redirect::back()->with('error', "We could not find the specified group or it did not belong to you.");

		$group->delete();

		return Redirect::back()->with('success', "Your group was deleted.");
	}

}
