@extends("Dashboard.Boilerplate")
@section("title")
<title>Admin - Create Admin</title>
@stop
@section("page-name")
<h1 align="center"> Create Admin</h1>
@stop
@section("content")
@include("Partials.Event")
{{ Form::open(["url" => "admin/dashboard/admins/create/store", "class" => "form-horizontal"]) }}
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label">Admin Type</label>
		<div class="col-sm-10">
			<select class="form-control" name="type">
				<option>--- Select Admin Type ---</option>
				<option value="2">Classified Admin</option>
				<option value="3">Corporate Admin</option>
				<option value="4">Content Admin</option>
				<option value="5">Creative Admin</option>
				<option value="1">Super Admin</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="inputPassword3"  class="col-sm-2 control-label">Full Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="name" id="name" placeholder="Enter Admin Name" value="{{ Input::old('name') ? e(Input::old('name')) : '' }}">
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('username', 'Username', ['class'=>'col-sm-2 control-label']) }}
		<div class="col-sm-10">
			{{ Form::text('username', Input::old('username') ? e(Input::old('username')) : '', ['class' => 'form-control', 'placeholder' => 'Choose a username', 'id' => 'username']) }}
		</div>
	</div>

	{{-- Status div --}}
	<div class="form-group" id="status" style="display: none;">
		<div class="alert alert-danger" style="display:none;" id="errorBox"></div>
	</div>
	
	<div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" name="email" id="email" placeholder="Enter Admin Email" value="{{ Input::old('email') ? e(Input::old('email')) : '' }}">
		</div>
	</div>
	
	<div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" name="password" id="password" placeholder="Create a password">
		</div>
	</div>
	
	<div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label">Re-enter Password</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password">
		</div>
	</div>
	
	<div class="form-group" align="right">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Create Admin</button>
		</div>
	</div>
{{ Form::close() }}
@stop

@section('script')
	<script src="{{ asset('assets/js/find_username.js') }}" type="text/javascript"></script>
@stop