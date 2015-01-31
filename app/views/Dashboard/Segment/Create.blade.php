@extends("Dashboard.Boilerplate")

@section("title")
	<title>Admin - Create Segment</title>
@stop

@section("page-name")
	<h1 align="center">Create Segment</h1>
@stop

@section("content")

@include("Partials.Event")

{{ Form::open(["url"=>"admin/dashboard/segments/store", "class"=>"form-horizontal"]) }}
             
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Category</label>
    <div class="col-sm-10">
      <select class="form-control" name="catagory">
        <option>Select any category</option>
        @foreach($catagories as $catagory)
          <option value="{{ $catagory->id }}">{{ $catagory->catagory_name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Segment</label>
    <div class="col-sm-10">
      <input type="text" name="segment" class="form-control" id="segment" placeholder="Enter Segment">
    </div>
  </div>
  
  <div class="form-group" align="right">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Create Segment</button>
    </div>
  </div>
{{ Form::close() }}

@stop