<?php

class ProfileController extends BaseController
{

	// Settings page
	public function page()
	{
		return View::make("Dashboard.Settings");
	}
}