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
			'confessions' => Confession::orderBy('created_at', 'DESC')->paginate(10),
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('confessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$form = Input::only('body', 'anonymous');
		if(!$this->validator->validates($form))
		{
			return Redirect::back()->withErrors($this->validator->errors())->withInput();
		}

		$this->user->confessions()->create([
			'body'      => $form['body'],
			'anonymous' => (bool) $form['anonymous'],
		]);

		return Redirect::route('confessions.index')->with('success', "Your confession has been posted.");
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
