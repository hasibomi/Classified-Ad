<?php

class AdminController extends BaseController
{

	// Lists
	public function all()
	{
		return View::make("Dashboard.Admin.Lists")
			->with("admins", User::where("is_admin", "!=", 0));
	}

	// Create page
	public function create()
	{
		return View::make("Dashboard.Admin.Create");
	}

	// Store admin
	public function store()
	{
		// Check error
		$validator = Validator::make(Input::all(), ["type" => "required|integer|min:1", "name" => "required", "email" => "required|email|unique:users,email", "password" => "required|min:3:same:password_confirmation", "password_confirmation" => "required|min:3|same:password", "username" => "required|min:3|unique:users,username"], ["integer" => "Please select an admin type"]);

		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		// If no errors found, then store the credentials to create an admin
		$create = new User;

		$create->name = Input::get("name");
		$create->username = Input::get('username');
		$create->email = Input::get("email");
		$create->password = Hash::make(Input::get("password_confirmation"));
		$create->is_admin = Input::get("type");

		if($create->save())
		{
			return Redirect::route("AdminListPage")
				->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Admin created.</div>");
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Error occured. Please try after sometime.</div>");
	}

	// Edit page to edit an admin
	public function edit($id)
	{
		$admin = User::findOrFail($id);

		return View::make('Dashboard.Admin.Edit')
			->with('admin', $admin);
	}

	// Update an admin's profile
	public function update($id)
	{
		// Check the user exists
		$admin = User::find($id);

		if($admin->count() > 0)
		{
			$admin->name = Input::get('name');
			if(Input::has('password'))
			{
				$admin->password = Hash::make(Input::get('password'));
			}
			$admin->is_admin = Input::get('type');

			if($admin->save())
			{
				return Redirect::route('AdminListPage')
					->with('event', "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Admin updated.</div>");
			}
		}
	}

	// Delete an admin
	public function destroy($id)
	{
		// Check the user exists
		$admin = User::find($id);

		if($admin->count() > 0)
		{
			if($admin->delete())
			{
				return Redirect::route('AdminListPage')
					->with('event', "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Admin updated.</div>");
			}
		}
		else
		{
			App::abort(404);
		}
	}

}
