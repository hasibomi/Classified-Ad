<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-3">
    
    <!-- CSS Menu Start -->
    <div id='cssmenu'>
      <ul>
        <li class='active'><a href='{{ url("admin/logout") }}'><span>Admin Logout</span></a></li>
        <li class='has-sub'><a href='#'><span>AD Post</span></a>
          <ul>
            <li><a href='{{ url("admin/dashboard") }}'><span>All New AD</span></a></li>
            <li class='last'><a href='{{ url("admin/dashboard/ads/published") }}'><span>Active AD</span></a></li>
          </ul>
        </li>
      
        <li><a href='{{ url("admin/dashboard/settings") }}'><span>Setting</span></a></li>
      </ul>
    </div>
  </div>