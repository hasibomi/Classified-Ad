@extends("Dashboard.User.Boilerplate")
@section("title")
<title>User - Ad Post</title>
@stop
@section("content")
@include("Partials.Event")
<div class="row">
	<div class="col-xs-8">
		{{ Form::open(["url"=>"user/dashboard/adpost/update/" . $ad->ad_id, "class"=>"form-horizontal", "role"=>"form", "files"=>true])}}
			<div class="form-group">
				<label for="category" class="col-sm-3 control-label">Category</label>
				<div class="col-sm-8">
					<select class="form-control" id="catagory" name="catagory">
						<option value="0">--- Select Category --- </option>
						@if($catagories->count() == 0)
						@else
							@foreach($catagories as $c)
								<option value="{{ $c->id }}" @if($c->id == $ad->catagory_id) selected @else @endif>{{ $c->catagory_name }}</option>
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
					<p>Keep it short and simple - and no price.</p>
				</div>
			</div>
			
			<div class="form-group">
				<label for="description" class="col-sm-3 control-label">Description</label>
				<div class="col-sm-8">
					<textarea class="form-control" name="ad_description" rows="8" placeholder="Enter Your Product Description ( Maximum 250 character )">{{ Input::old('ad_description') ? e(Input::old('ad_description')) : $ad->ad_description }}</textarea>
					<p>Good descriptions increase your ad's chances of success. Describe features, dimensions, condition and what's included.</p>
				</div>
			</div>
			
			<div class="form-group">
				<label for="price" class="col-sm-3 control-label">Price</label>
				<div class="col-sm-8">
					<div class="input-group">
						<div class="input-group-addon">৳</div>
						<input type="text" class="form-control" name="product_price" id="price" placeholder="Enter Your Price" value="{{ Input::old('product_price') ? e(Input::old('product_price')) : $ad->product_price}}">
						<div class="input-group-addon">.00</div>
					</div>
					<p>Pick the right price. Everything sells if the price is right.</p>
				</div>
			</div>
			
			<div class="form-group">
				<label for="date" class="col-sm-3 control-label">Date</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="date" value="19-01-2015" readonly>
				</div>
			</div>
			
			<div class="form-group">
				<label for="images" class="col-sm-3 control-label">Images</label>
				<div class="col-sm-8">
					<input type="file" id="exampleInputFile" name="image">
					<p>Must be either a JPG, JPEG, GIF or PNG image file <b>(max 200KB)</b>. You Can Use The Internet's Best <a href="http://www.picresize.com/" target="_blank"> Picture Resizing</a> Tool.</p>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-10">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="privacy"> By Clicking on "POST YOUR AD" I acknowledge the <a href="#"><b>Privacy Policy</b></a> of <u>{{ url() }}</u>
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
<script src="{{ asset('assets/js/catagory_segment_subsegment.js') }}"></script>
@stop