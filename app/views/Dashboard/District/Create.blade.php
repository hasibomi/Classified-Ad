@extends("Dashboard.Boilerplate")

@section("title")
	<title>Admin - OK Mobile LTD</title>
@stop

@section("page-name")
	<h1 align="center"> Manage District List</h1>
@stop

@section("content")

@include("Partials.Event")

{{ Form::open(["url"=>"admin/dashboard/districts/store", "class"=>"form-horizontal"]) }}
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label">District</label>
		<div class="col-sm-10">
			<input type="text" name="district" id="district" class="form-control" id="district" placeholder="Enter District Name">
		</div>
	</div>
	<div class="form-group" align="right">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Create District</button>
		</div>
	</div>
{{ Form::close() }}

@stop