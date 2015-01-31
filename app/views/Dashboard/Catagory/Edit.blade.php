@extends("Dashboard.Boilerplate")

@section("title")
	<title>Admin - Edit Catagory</title>
@stop

@section("page-name")
	<h1 align="center">Edit Category</h1>
@stop

@section("content")

@include("Partials.Event")

{{ Form::open(["url"=>"admin/dashboard/catagories/update/" . $catagory->id, "class"=>"form-horizontal"]) }}
	<div class="form-group">
		<label for="input" class="col-sm-2 control-label">Category</label>
		<div class="col-sm-10">
			<input type="text" name="catagory" class="form-control" id="catagory" placeholder="Enter Category Name" value="{{ $catagory->catagory_name }}">
		</div>
	</div>
	<div class="form-group" align="right">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Update Category</button>
		</div>
	</div>
{{ Form::close() }}

@stop