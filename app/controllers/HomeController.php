<?php

class HomeController extends BaseController {

	// Home page
	public function home()
	{
		return View::make("Main.Home.Index")
			->with("catagories", Catagory::all())
			->with("districts", District::all());
	}

	// Login page
	public function login()
	{
		return View::make("Main.Home.Login");
	}

	// Signup
	public function signup()
	{
		return View::make("Main.Home.Signup")
			->with("districts", District::all());
	}

	// Account Recovery page
	public function accRecover()
	{
		return View::make("Main.Home.Recovery");
	}

	// Find thana
	public function findThana($id)
	{
		$thanas = Thana::where("district_id", $id);

		if($thanas->count() > 0)
		{
			foreach($thanas->get() as $t)
			{
				echo "<option value='" . $t->id ."'>" . $t->thana_name . "</option>";
			}
		}

		echo '<option>No thanas found</option>';
	}

	// Sign up page
	public function store()
	{
		$validator = Validator::make(Input::all(), ["name" => "required", "email" => "required|email|unique:users", "mobile" => "required", "profession" => "required", "birth" => "required", "thana" => "required", "district" => "required", "address" => "required", "password" => "required|min:5", "password_confirmation" => "required|min:5", "privacy" => "required"]);

		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		$u = new User;

		$u->user_name = Input::get("name");
		$u->email = Input::get("email");
		$u->mobile = Input::get("mobile");
		$u->profession = Input::get("profession");
		$u->date_of_birth = Input::get("birth");
		$u->user_thana = Input::get("thana");
		$u->user_district = Input::get("district");
		$u->address = Input::get("address");
		$u->password = Hash::make(Input::get("password_confirmation"));

		if($u->save())
		{
			$email = Input::get("email");
			$name = Input::get("name");

			Mail::send("Emails.SuccessfullSignup", ["name" => $name, "email" => $email], function($message) use($name, $email)
			{
				$message->from("donotreply@okmobileltd.com", "Ok Mobile Ltd.");
				$message->to($email, $name)->subject("Congratulations on your " . url() ." account!");
			});

			return Redirect::route("UserLoginPage")
				->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Thank you. Please login to continue.</div>");
		}
	}

	// Sign in User
	public function userSignin()
	{
		$validator = Validator::make(Input::all(), ["email" => "required|email", "password" => "required"]);

		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		$auth = Auth::attempt(["email" => Input::get("email"), "password" => Input::get("password"), "is_admin" => 0]);

		if($auth)
		{
			return Redirect::to("user/dashboard");
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Email or Password does not match.</div>");
	}

	// Sign in Admin
	public function adminSignin()
	{
		$validator = Validator::make(Input::all(), ["email" => "required|email", "password" => "required"]);

		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		$auth = Auth::attempt(["email" => Input::get("email"), "password" => Input::get("password")]);

		if($auth)
		{
			return Redirect::to("admin/dashboard");
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Email or Password does not match.</div>");
	}

}
