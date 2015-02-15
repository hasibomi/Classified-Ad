@extends("Dashboard.User.Boilerplate")
@section("title")
<title>User - Ad Post</title>
@stop
@section("content")
@include("Partials.Event")
<div class="row">
	<div class="col-xs-8">
		{{ Form::open(["url"=>"user/adpost/update/" . $ad->id, "class"=>"form-horizontal", "role"=>"form", "files"=>true])}}
			<div class="form-group">
				<label for="category" class="col-sm-3 control-label">Category</label>
				<div class="col-sm-8">
					<select class="form-control" id="catagory" name="catagory">
						<option value="0">--- Select Category --- </option>
						@if($catagories->count() == 0)
						@else
							@foreach($catagories as $c)
								<option value="{{ $c->id }}">{{ $c->catagory_name }}</option>
							@endforeach
						@endif
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="segment" class="col-sm-3 control-label">Segment</label>
				<div class="col-sm-8">
					<select class="form-control" id="segment" name="segment">
						<option>--- Select Segment ---</option>

					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="sub_segment" class="col-sm-3 control-label">Sub Segment</label>
				<div class="col-sm-8">
					<select class="form-control" id="subsegment" name="subsegment">
						<option>--- Select Sub Segment ---</option>

					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="region" class="col-sm-3 control-label">District</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="district" value="{{ $ad->district->district_name }}" readonly>
					{{ Form::hidden("district", $ad->district->id) }}
				</div>
			</div>

			<div class="form-group">
				<label for="thana" class="col-sm-3 control-label">Thana</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="thana" value="{{ $ad->thana->thana_name }}" readonly>
					{{ Form::hidden("thana", $ad->thana->id) }}
				</div>
			</div>

			<div class="form-group">
				<label for="Name" class="col-sm-3 control-label">Name</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="user_name" value="{{ Auth::user()->user_name }}" readonly>
				</div>
			</div>

			<div class="form-group">
				<label for="Mobile" class="col-sm-3 control-label">Mobile</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="mobile" value="{{ Auth::user()->mobile }}" readonly>
				</div>
			</div>

			<div class="form-group">
				<label for="Email" class="col-sm-3 control-label">E-mail</label>
				<div class="col-sm-8">
					<input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}" readonly>
				</div>
			</div>

			<div class="form-group">
				<label for="Name" class="col-sm-3 control-label">Ad Title</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="name" name="ad_title" placeholder="Enter Your Product Titel" value="{{ Input::old('ad_title') ? e(Input::old('ad_title')) : $ad->ad_title }}">
				</div>
			</div>

			<div class="form-group">
				<label for="description" class="col-sm-3 control-label">Description</label>
				<div class="col-sm-8">
					<textarea class="form-control" name="ad_description" rows="3" placeholder="Enter Your Product Description ( Maximum 250 character )">{{ Input::old('ad_description') ? e(Input::old('ad_description')) : $ad->ad_description }}</textarea>
				</div>
			</div>

			<div class="form-group">
				<label for="price" class="col-sm-3 control-label">Price</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="product_price" id="price" placeholder="Enter Your Price" value="{{ Input::old('product_price') ? e(Input::old('product_price')) : $ad->product_price}}">
				</div>
			</div>

			<div class="form-group">
				<label for="date" class="col-sm-3 control-label">Date</label>
				<div class="col-sm-8">
					<?php $date = explode(" ", $ad->created_at); $date_for_human = explode("-", $date[0]); ?>
					<input type="text" class="form-control" id="date" value="{{ $date_for_human[2] }}-{{ $date_for_human[1] }}-{{ $date_for_human[0] }}" readonly>
				</div>
			</div>

			<div class="form-group">
				<label for="images" class="col-sm-3 control-label">Images</label>
				<div class="col-sm-8">
					<input type="file" id="exampleInputFile" name="image">
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-10">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="privacy"> By Clicking on "POST YOUR AD" I acknowledge the <a href="#"><b>Privacy Policy</b></a> of <u>Ok Mobile Ltd.</u>
						</label>
					</div>
				</div>
			</div>

			<div class="form-group" align="right">
				<div class="col-sm-offset-3 col-sm-8">
					<button type="submit" class="btn btn-primary btn-lg btn-block">POST YOUR AD</button>
				</div>
			</div>
		{{ Form::close() }}
	</div>
</div>
@stop

@section("script")

<script>
	$("#catagory").change(function(e) {
		if($(this).val() == 0) {
			$("#segment").html('<option value="0">--- Select Category first--- </option>');
			$("#subsegment").html('<option value="0">--- Select Segment first --- </option>');
		} else {
			$.ajax({
				url: "/ok/user/adpost/findsegment/" + $(this).val(),
				method: "POST",
				dataType: "html",
				data: "catagory=" + $(this).val(),
				success: function(data) {
					$("#segment").html(data);

					$("#segment").change(function(e) {
						if($(this).val() == 0) {
							$("#segment").html();
							$("#subsegment").html();
						} else {
							$.ajax({
								url: "/ok/user/adpost/findsubsegment/" + $(this).val(),
								method: "POST",
								dataType: "html",
								data: "catagory=" + $(this).val(),
								success: function(data) {
									$("#subsegment").html(data);
								}
							});
						}
					});
				}
			});
		}
	});
</script>

@stop
