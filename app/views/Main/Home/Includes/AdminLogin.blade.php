<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        @if($errors->all())
          <div class="alert alert-danger">
            Following error(s) occured -
            <ul style="list-style-type: none">
              @foreach($errors->all() as $error)
                <li><span class="glyphicon glyphicon-exclamation-sign"></span> {{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        @if(Session::has("event"))
          {{ Session::get("event") }}
        @endif
        <h1 class="text-center">Admin Login</h1>
      </div>
      <div class="modal-body">
        {{ Form::open(["url" => "admin/signin", "class" => "form col-md-12 center-block"]) }}  
          <div class="form-group">
            <input type="text" name="email" class="form-control input-lg" placeholder="Email" value="{{ Input::old('email') ? e(Input::old('email')) : '' }}">
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control input-lg" placeholder="Password">
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-lg btn-block">Sign In</button>
            <!-- <span class="pull-right"><a href="#">Sing Up</a> --></span><span><a href="pwrecovery.php">Forgot password?</a></span>
          </div>
        {{ Form::close() }}
      </div>
      <div class="modal-footer">
        <div class="col-md-12">
          <a href="{{ url('/') }}" class="btn btn-default">Cancel</a>
        </div>
      </div>
    </div>
  </div>
</div>