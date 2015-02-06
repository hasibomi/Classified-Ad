@extends("Dashboard.Boilerplate")
@section("title")
<title>Admin - Super Admin Profile</title>
@stop
@section("page-name")
<h1 align="center">Manage Super Admin Profile</h1>
@stop
@section("content")
@include("Partials.Event")
{{ Form::open(["url"=>"admin/dashboard/settings/update", "class"=>"form-horizontal"]) }}
	<div class="form-group">
		<label for="inputPassword3"  class="col-sm-2 control-label">Admin Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="user_name" id="user_name" value="{{ Auth::user()->user_name }}">
		</div>
	</div>
	
	<div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}">
		</div>
	</div>
	
	<div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label">Old Password</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" name="old_password" id="old_password">
		</div>
	</div>
	
	<div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label">New Password</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" name="password" id="password">
		</div>
	</div>
	
	
	<div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label">Re-enter Password</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" name="password_confirmation" id="password_confirmation" >
		</div>
	</div>
	
	<div class="form-group" align="right">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Update</button>
		</div>
	</div>
{{ Form::close() }}
@stop