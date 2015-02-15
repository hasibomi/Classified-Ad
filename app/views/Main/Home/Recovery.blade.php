@extends("Main.Boilerplate")

@section("title")
	<title>Account Recovery</title>
@stop

@section("content")

<!-- Accounn Recovery -->
<div class="row"> <!-- images -->
	<div class="col-xs-6 col-md-1 col-md-offset-1">
		{{ HTML::image("assets/images/Unlock-icon.png", "Lock", ["height" => "100px", "width" => "100px"]) }}
	</div>

	<div class="col-xs-6 col-md-6"> <!-- Text -->
		<h2>Account Recovery</h2>
		<h3>Can't Access Your Account?</h3>
	</div>
</div> 

<hr/>

<div class="row">
	<div class="col-xs-6 col-md-8 col-md-offset-1">
		@include('Partials.Event')
		<p>You Can Retrieve your login information (Username / Pasword) to your email address.</p>
		<p>Type your Email address which you have used in your Account :</p>

		{{ Form::open(['url' => 'accRecover/sendEmail', 'class' => "form-inline"]) }}
			<div class="form-group">
				{{ Form::label('email', 'Email address', ['class' => 'sr-only']) }}
				{{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter email', 'size' => '30px']) }}
			</div>
			{{ Form::submit('Submit') }}
		{{ Form::close() }}
	</div>
</div>

@stop