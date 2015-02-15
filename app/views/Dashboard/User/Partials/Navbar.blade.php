<hr/>
<!--User Panel -->
<div class="row">
  <div class="col-md-4">
    <p><a href="{{ url('user/dashboard') }}">{{ Auth::user()->name }}</a>
    <a href="{{ url('user/dashboard/settings') }}" class="btn btn-primary btn-xs">Profile</a>
    <a href="{{ url('user/logout') }}" class="btn btn-primary btn-xs">Log Out</a>
    </p>
    
  </div>
  <div class="col-md-4 col-md-offset-4"><a href="{{ url('user/dashboard/adpost') }}"><button type="button" class="btn btn-primary col-md-offset-6">POST YOUR FREE AD</button></a></div>
</div>
<!--User Panel End-->
<hr/>