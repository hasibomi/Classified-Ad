<hr/>
<!--User Panel -->
<div class="row">
  <div class="col-md-4">
    <p><a href="{{ url('user/dashboard') }}">{{ Auth::user()->user_name }}</a>
    <a href="user_info_update.php"><button type="button" class="btn btn-primary btn-xs">Setting</button></a>
    <a href="{{ url('user/logout') }}"><button type="button" class="btn btn-primary btn-xs">Log Out</button></a>
    </p>
    
  </div>
  <div class="col-md-4 col-md-offset-4"><a href="{{ url('user/dashboard/adpost') }}"><button type="button" class="btn btn-primary col-md-offset-6">POST YOUR FREE AD</button></a></div>
</div>
<!--User Panel End-->
<hr/>