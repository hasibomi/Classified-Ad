@extends("Dashboard.Boilerplate")
@section("title")
<title>Admin - Edit Sub Segment</title>
@stop
@section("page-name")
<h1 align="center">Edit Sub Segment</h1>
@stop
@section("content")
@include("Partials.Event")
{{ Form::open(["url"=>"admin/dashboard/subsegments/update/" . $subsegment->id, "class"=>"form-horizontal"]) }}
<div class="form-group">
	<label for="inputEmail3" class="col-sm-2 control-label">Category</label>
	<div class="col-sm-10">
		<select class="form-control" name="catagory" id="catagory">
			<option value="0">Select any category</option>
			@foreach($catagories as $catagory)
				<option value="{{ $catagory->id }}" {{ ($subsegment->catagory_id == $catagory->id) ? "selected" : "" }}>{{ $catagory->catagory_name }}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="form-group">
	<label for="segment" class="col-sm-2 control-label">Segment</label>
	<div class="col-sm-10">
		<select class="form-control" name="segment" id="segment">
			@foreach(Segment::where("catagory_id", $subsegment->catagory_id)->get() as $segment)
				<option value="{{ $segment->id }}" {{ ($segment->id == $subsegment->segment_id) ? "selected" : "" }}>{{ $segment->segment_name }}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="form-group">
	<label for="input" class="col-sm-2 control-label">Sub Segment</label>
	<div class="col-sm-10">
		<input type="text" name="subsegment" class="form-control" id="subsegment" placeholder="Enter Sub Segment Name" value="{{ $subsegment->subsegment_name }}">
	</div>
</div>
<div class="form-group" align="right">
	<div class="col-sm-offset-2 col-sm-10">
		<button type="submit" class="btn btn-default">Update Segment</button>
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
				url: "/ok/admin/dashboard/subsegments/create/catagories/find/" + $(this).val(),
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