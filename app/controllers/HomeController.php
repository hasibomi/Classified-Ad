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
        else
        {
		    echo '<option>No thanas found</option>';
        }
	}

	// Sign up page
	public function store()
	{
		$validator = Validator::make(Input::all(), ["name" => "required", "username" => "required", "email" => "required|email|unique:users", "mobile" => "required", "profession" => "required", "birth" => "required", "thana" => "required", "district" => "required", "address" => "required", "password" => "required|min:5", "password_confirmation" => "required|min:5", "privacy" => "required"]);

		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		$u = new User;

		$u->name = Input::get("name");
		$u->username = Input::get('username');
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

			Mail::send("Emails.SuccessfullSignup", ["name" => $name, "email" => $email, "username" => Input::get("username")], function($message) use($name, $email)
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
		$validator = Validator::make(Input::all(), ["username" => "required|min:3", "password" => "required"]);

		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		$field = filter_var(Input::get('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		$auth = Auth::attempt([$field => Input::get("username"), "password" => Input::get("password"), "is_admin" => 0]);

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
		$validator = Validator::make(Input::all(), ["username" => "required|min:3", "password" => "required"]);

		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		$field = filter_var(Input::get('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		$auth = Auth::attempt([$field => Input::get("username"), "password" => Input::get("password")]);

		if($auth)
		{
			return Redirect::to("admin/dashboard");
		}

		return Redirect::back()
			->with("event", "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Email or Password does not match.</div>");
	}

	// Recover password by email
	public function recover()
	{
		// Validate the input field
		$validator = Validator::make(Input::all(), ['email' => 'required|email|min:4']);

		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		// Check the user exists or not
		$email = Input::get('email');
		$from = url();

		$find_user = User::where('email', $email);

		if($find_user->count() != 1)
		{
			return Redirect::back()
				->with('event', "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-remove'></span> Email does not match.</div>");
		}

		// If the user exists, then follow the following task
		$code = uniqid(rand());
		$find_user->update(['code' => $code, 'password' => '']);

		Mail::send('Emails.AccountRecovery', ['email' => $email, 'code' => $code], function($message) use($email, $from)
		{
			$message->from('donotreply@' . $from, 'Ok Mobile Ltd.');
			$message->to($email)->subject('Recover your account');
		});
	}

	// Change password by email
	public function changePass()
	{
		$email = Request::uri(3);
		$code = Request::uri(4);

		// Check the user exists or not
		$find_user = User::where('email', $email)->where('code', $code)->where('is_admin', 0)->orWhere('is_admin', 1);

		if($find_user->count() == 1)
		{
			return View::make('Main.Recover')
				->with('email', $email)
				->with('code', $code);
		}

		// If the user doesn't exist, then show 404 page
		return App::abort(404);
	}

	// Update password
	public function updatePass()
	{
		// Validate the input field
		$validator = Validator::make(Input::all(), ['email' => 'required|email|min:4', 'password' => 'required|min:4', 'password_confirmation' => 'required|same:password', 'code' => 'requried|size:22']);

		if($validator->fails())
		{
			return Redirect::back()
				->withErrors($validator)
				->withInput();
		}

		// Check the user exists or not
		$email = Input::get('email');
		$password = Hash::make('password_confirmation');
		$code = Input::get('code');

		$find_user = User::where('email', $email)->where('code', $code);

		if($find_user->count() == 1)
		{
			// Update the user's password & code
			$find_user->update(['password' => $password, 'code' => '']);

			return Redirect::route('UserLoginPage')
				->with('event', "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> Password has been changed successfully.</div>");
		}

		// If the user doesn't exist, then show 404 page
		return App::abort(404);
	}

	// Check the username
	public function checkUser()
	{
		$check_username = User::where('username', Input::get('username'));

		if($check_username->count() > 0)
		{
			echo "The username has already been taken";
		}
	}

}
