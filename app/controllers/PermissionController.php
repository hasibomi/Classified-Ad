<?php

class PermissionController extends BaseController
{

	// User permission
	public function user()
	{
		return View::make("Dashboard.Permission.User");
	}

	// Admin permission
	public function admin()
	{
		return View::make("Dashboard.Permission.Admin");
	}
}