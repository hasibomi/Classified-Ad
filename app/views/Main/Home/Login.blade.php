@extends("Main.Boilerplate")

@section("title")
	@if(Request::path() == "user/login")
		<title>User - Login</title>
	@elseif(Request::path() == "admin/login")
		<title>Admin Login Form</title>
	@endif
@stop

@section("content")

@if(Request::path() == "user/login")
	@include("Main.Home.Includes.UserLogin")
@elseif(Request::path() == "admin/login")
	@include("Main.Home.Includes.AdminLogin")
@endif

@stop