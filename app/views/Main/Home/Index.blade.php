@extends("Main.Boilerplate")
@section("title")
<title>Home - OK Mobile LTD</title>
@stop
@section("content")
<div class="row">
	<hr/>
	<div class="col-xs-12 col-md-10">WelCome..</div>
	<div class="col-xs-6 col-md-2">
		<p>
			<a href="{{ url('user/signup') }}"><button type="button" class="btn btn-primary btn-sm">Create Account</button></a>
			<a href="{{ url('user/login') }}"><button type="button" class="btn btn-primary btn-sm">Login</button></a>
		</p>
	</div>
</div>

	@include("Partials.Event")
<hr/>
<h1>Search Your AD</h1>
<div class="row">
	<div class="col-xs-12 col-md-8">

        {{-- Ad search form start --}}
		{{ Form::open(["url" => "ads/search", "class" => "form-horizontal", "method" => "get"]) }}
			<div class="form-group">
				<label for="category" class="col-sm-2 control-label">Category</label>
				<div class="col-sm-10">
					<select class="form-control" name="catagory" id="catagory">
						@if($catagories->count() == 0)
							<option value="0">No catagories found</option>
						@else
                            <option value="0">All</option>
							@foreach($catagories as $catagory)
								<option value="{{ $catagory->id }}">{{ $catagory->catagory_name }}</option>
							@endforeach
						@endif
					</select>
				</div>
			</div>
			<div class="form-group" id="segment_div">
				<label for="segment" class="col-sm-2 control-label">Segment</label>
				<div class="col-sm-10">
					<select class="form-control" name="segment" id="segment">
						<option value="0">--- Select Catagory ---</option>
					</select>
				</div>
			</div>
			<div class="form-group" id="subsegment_div">
				<label for="subsegment" class="col-sm-2 control-label">Sub Segment</label>
				<div class="col-sm-10">
					<select class="form-control" name="subsegment" id="subsegment">
						<option value="0">--- Select Segment ---</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="region" class="col-sm-2 control-label">District </label>
				<div class="col-sm-10">
					<select class="form-control" name="district" id="district">
						@if($districts->count() == 0)
							<option value="0">No districts found</option>
						@else
                            <option value="0">All</option>
							@foreach($districts as $district)
								<option value="{{ $district->id }}">{{ $district->district_name }}</option>
							@endforeach
						@endif
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="thana" class="col-sm-2 control-label">Thana</label>
				<div class="col-sm-10">
					<select class="form-control" name="thana" id="thana">
						<option value="0">--- Select District ---</option>
					</select>
				</div>
			</div>
			<div class="form-group" align="right">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Search</button>
				</div>
			</div>
		{{ Form::close() }}
        {{-- Ad search form end --}}
	</div>
	
	<div class="col-xs-6 col-md-4">
		<p><a href="{{ url('user/login') }}" class="btn btn-primary btn-lg btn-block">POST YOUR AD</a></p>
		<p><a href="{{ url('admin/login') }}" class="btn btn-danger btn-lg btn-block">ADMIN LOGIN</a></p>
	</div>
</div>
@stop

@section("script")
{{ HTML::script("assets/js/search_ad.js") }}
@stop