@extends("Main.AdView.Boilerplate")
@section("title")
<title>Ads - OK Mobile Ltd.</title>
@stop
@section("content")

<!-- Left -->
@foreach($ads as $ad)
<div class="col-md-6 col-md-offset-1">
	<h2 align="center">{{ $ad->ad_title }}</h2>
	<p align="center"><?php $date = explode(" ", $ad->created_at); $date_for_human = explode("-", $date[0]); ?>{{ $date_for_human[2] }}-{{ $date_for_human[1] }}-{{ $date_for_human[0] }}</p>
	<img src="{{ asset($ad->ad_image) }}" height="800" width="650" alt="..." class="img-thumbnail ">
	<h2 align="center">৳ {{ $ad->product_price }}</h2>
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
	
	<h3><strong><u>Ok Mobile Ltd.</u></strong> is not responsible for the advertised product.</h3>
	
</div>
@endforeach
<!-- Right End -->
@stop