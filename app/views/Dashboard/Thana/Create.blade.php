@extends("Dashboard.Boilerplate")
@section("title")
<title>Admin - Create Thana</title>
@stop
@section("page-name")
<h1 align="center"> Create Thana</h1>
@stop
@section("content")

@include("Partials.Event")

{{ Form::open(["url"=>"admin/dashboard/thanas/store", "class"=>"form-horizontal"]) }}
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label">District</label>
		<div class="col-sm-10">
			<select class="form-control" name="district" id="district">
				<option>Select any District</option>
				@foreach($districts as $district)
	          		<option value="{{ $district->id }}">{{ $district->district_name }}</option>
		        @endforeach
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label">Thana</label>
		<div class="col-sm-10">
			<input type="text" name="thana" class="form-control" id="thana" placeholder="Enter Thana Name">
		</div>
	</div>
	
	<div class="form-group" align="right">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Create Thana</button>
		</div>
	</div>
</form>
@stop