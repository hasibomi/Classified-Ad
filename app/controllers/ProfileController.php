<?php

class ProfileController extends BaseController
{

	// Settings page
	public function page()
	{
		return View::make("Dashboard.Settings");
	}

	// Update profile
	public function update()
	{
		$validator = Validator::make(Input::all(), ["user_name"=>"required", "email"=>"required", "old_password"=>"required_with:password", "password"=>"required_with:password_confirmation|same:password_confirmation"]);

		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		if(Input::has("password"))
		{
			$profile = User::where("id", Auth::user()->email)->where("password", Input::get("old_password"));

			if($profile->count() == 0)
			{
				$profile->update(
					[
						"user_name" => Input::get("user_name"),
						"email"		=> Input::get("email"),
						"password"	=> Hash::make(Input::get("password"))
					]
				);

				return Redirect::back()
					->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Profile updated.</div>");
			}
			else
			{
				return Redirect::back()
					->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-exclamation-sign'></span> Password is wrong.</div>");;
			}
		}
		else
		{
			$profile = User::find(Auth::user()->id);

			$profile->user_name = Input::get('user_name');
			$profile->email = Input::get('email');

			if($profile->save())
			{
				return Redirect::back()
					->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Profile updated.</div>");
			}

			return Redirect::back()
				->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Error occured. Please try after sometime.</div>");;
	}	}
}