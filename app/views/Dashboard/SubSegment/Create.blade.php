@extends("Dashboard.Boilerplate")

@section("title")
	<title>Admin - Create Sub Segment</title>
@stop

@section("page-name")
	<h1 align="center"> Create Sub Segment</h1>
@stop

@section("content")

@include("Partials.Event")

{{ Form::open(["url"=>"admin/dashboard/subsegments/store", "class"=>"form-horizontal"]) }}
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label">Category</label>
		<div class="col-sm-10">
			<select name="catagory" id="catagory" class="form-control">
				<option value="0">Select any Catagory</option>
				@foreach($catagories as $catagory)
					<option value="{{ $catagory->id }}">{{ $catagory->catagory_name }}</option>
				@endforeach
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label">Segment</label>
		<div class="col-sm-10">
			<select class="form-control" name="segment" id="segment">
				<option>Please select any catagory first</option>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label">Sub Segment</label>
		<div class="col-sm-10">
			<input type="text" name="subsegment" class="form-control" id="sub_segment" placeholder="Enter Sub Segment">
		</div>
	</div>
	
	<div class="form-group" align="right">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Create Sub Segment</button>
		</div>
	</div>
{{ Form::close() }}

@stop

@section("script")
	<script>
	$("#catagory").change(function(e)
	{
		if($(this).val() == 0) {
			$("#segment").html("<option>Please select any catagory first</option>");
		} else {$.ajax({
				url: "create/catagories/find/" + $(this).val(),
				method: "POST",
				dataType: "html",
				data: "catagory=" + $(this).val(),
				success: function(data) {
					$("#segment").html(data);
				}
			});
		}
	});
	</script>
@stop