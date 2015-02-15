<?php

class UsercreateController extends BaseController
{
    // All users lists
    public function all()
    {
        return View::make("Dashboard.Users.Lists")
            ->with("users", User::all());
    }

    // Create user page
    public function create()
    {
        return View::make("Dashboard.Users.Create")
            ->with("catagories", Catagory::all())
            ->with("districts", District::all());
    }

    // Store user
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

            return Redirect::back()
                ->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> User created.</div>");
        }
    }

    // User delete
    public function destroy($id)
    {
        $find = User::findOrFail($id);

        $find->delete();

        return Redirect::back()
            ->with("event", "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><span class='glyphicon glyphicon-ok'></span> User deleted.</div>");
    }
}