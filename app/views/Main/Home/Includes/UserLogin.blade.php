<div class="col-md-6 col-md-offset-6"><br> @include("Partials.Event")</div>


<div class="row">
<!-- Left -->
	<div class="col-xs-12 col-sm-6 col-md-6">

		<h2>Manage all your ads in one place - for free!</h2><br/>
		<h4>View, edit and delete your ads.</h4><br/>
		<h4>Save your contact details to save time when posting new ads.</h4> <br/> 
		<p>Don't have an account yet? <a href="{{ url('user/signup') }}">Sign up now!</a></p>

	</div>
  <!-- Left End -->
  
  <!-- Right -->
  	<div class="col-xs-6 col-md-4 col-sm-offset-1">
  		<h2>Login to your Account</h2>

      	{{ Form::open(["url" => "user/signin", "class" => "form-horizontal"]) }}
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Username</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputEmail3" placeholder="Username" name="username">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<p> <a href="{{ url('accRecover') }}">Forgot password?</a> </p>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Sign in</button>
				</div>
			</div>
       	{{ Form::close() }}
  	</div>
  	<!-- Right End -->
</div>