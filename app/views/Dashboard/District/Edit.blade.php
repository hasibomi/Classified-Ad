@extends("Dashboard.Boilerplate")

@section("title")
	<title>Admin - Edit District</title>
@stop

@section("page-name")
	<h1 align="center">Edit District</h1>
@stop

@section("content")

@include("Partials.Event")

{{ Form::open(["url"=>"admin/dashboard/districts/update/" . $district->id, "class"=>"form-horizontal"]) }}
	<div class="form-group">
		<label for="input" class="col-sm-2 control-label">District</label>
		<div class="col-sm-10">
			<input type="text" name="district" class="form-control" id="district" placeholder="Enter District Name" value="{{ $district->district_name }}">
		</div>
	</div>
	<div class="form-group" align="right">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Update District</button>
		</div>
	</div>
{{ Form::close() }}

@stop