@extends("Main.AdView.Boilerplate")
@section("title")
<title>Ads - OK Mobile Ltd.</title>
@stop
@section("content")

<!-- Left -->
<div class="col-md-6 col-md-offset-1">
	<h2 align="center">{{ $ad->ad_title }}</h2>
	<p align="center">24 January 11:30 AM</p>
	<img src="{{ asset($ad->ad_image) }}" height="800" width="650" alt="..." class="img-thumbnail ">
	<h2 align="center">{{ $ad->product_price }} Taka.</h2>
	<p>{{ $ad->ad_description }}
	</p>
	
</div>
<!-- Left End -->

<!-- Right -->
<div class="col-md-4 col-md-offset-1" align="center">
	<br/><br/><br/><br/>
	
	<h2>{{ $ad->user->user_name }}</h2>
	<h2>{{ $ad->user->mobile }}</h2>
	<h2>{{ $ad->user->email }}</h2>
	<h2>{{ $ad->district->district_name }}, {{ $ad->thana->thana_name }}</h2>
	<h2>{{ $ad->catagory->catagory_name }} - {{ $ad->segment->segment_name }}</h2>
	
	<hr/>
	
	<div class="jumbotron">
		<h3>E-mail Seller</h3>
		<p><form>
			<div class="form-group">
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Your E-mail Address:">
			</div>
			<div class="form-group">
				<textarea class="form-control" rows="3" placeholder="Please Type Youe Message ..."></textarea>
			</div>
			
			<button type="button" class="btn btn-primary btn-lg btn-block">Send Mail</button>
		</form></p>
	</div>
	
	<h3>{{ url() }} is not responsible for the advertised product.</h3>
	
</div>
<!-- Right End -->
@stop