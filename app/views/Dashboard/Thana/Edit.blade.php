@extends("Dashboard.Boilerplate")
@section("title")
<title>Admin - Edit Thana</title>
@stop
@section("page-name")
<h1 align="center">Edit Thana</h1>
@stop
@section("content")
@include("Partials.Event")
{{ Form::open(["url"=>"admin/dashboard/thanas/update/" . $thana->id, "class"=>"form-horizontal"]) }}
<div class="form-group">
	<label for="inputEmail3" class="col-sm-2 control-label">District</label>
	<div class="col-sm-10">
		<select class="form-control" name="district">
			<option>Select any district</option>
			@foreach($districts as $district)
				<option value="{{ $district->id }}" {{ ($thana->district_id == $district->id) ? "selected" : "" }}>{{ $district->district_name }}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="form-group">
	<label for="input" class="col-sm-2 control-label">Thana</label>
	<div class="col-sm-10">
		<input type="text" name="thana" class="form-control" id="thana" placeholder="Enter Thana Name" value="{{ $thana->thana_name }}">
	</div>
</div>
<div class="form-group" align="right">
	<div class="col-sm-offset-2 col-sm-10">
		<button type="submit" class="btn btn-default">Update Thana</button>
	</div>
</div>
{{ Form::close() }}
@stop