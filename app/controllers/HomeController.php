<?php

class HomeController extends BaseController {

	public function showHome()
	{
		if(!Auth::check())
			return View::make('splash');

		return Redirect::route('confessions.index');
	}

}
