@extends("Main.Boilerplate")

@section("title")
	<title>Account Recovery</title>
@stop

@section("content")

<!-- Accounn Recovery -->
<div class="row"> <!-- images -->
	<div class="col-xs-6 col-md-1 col-md-offset-1">
		{{ HTML::image("images/Unlock-icon.png", "Lock", ["height" => "100px", "width" => "100px"]) }}
	</div>

	<div class="col-xs-6 col-md-6"> <!-- Text -->
		<h2>Account Recovery</h2>
		<h3>Can't Access Your Account?</h3>
	</div>
</div> 

<hr/>

<div class="row">
	<div class="col-xs-6 col-md-8 col-md-offset-1">
		<p>You Can Retrieve your login information (Username / Pasword) to your email address.</p>
		<p>Type your Email address which you have used in your Account :</p>
		<form class="form-inline">
			<div class="form-group">
				<label class="sr-only" for="exampleInputEmail2">Email address</label>
				<input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email" size="30px" >
			</div> 
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
</div>

@stop