<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-3">
    
    <!-- CSS Menu Start -->
    <div id='cssmenu'>
      <ul>
        <li class='active'><a href='{{ url("admin/logout") }}'><span>Admin Logout</span></a></li>
        <li><a href='{{ url("admin/dashboard") }}'><span>Home</span></a></li>
        <li class='has-sub'><a href='#'><span>Category</span></a>
        <ul>
          <li><a href='{{ url("admin/dashboard/catagories") }}'><span>Category List</span></a></li>
          <li><a href='{{ url("admin/dashboard/catagories/create") }}'><span>Create Category</span></a></li>
        </ul>
      </li>
      <li class='has-sub'><a href='#'><span>Segment</span></a>
      <ul>
        <li><a href='{{ url("admin/dashboard/segments") }}'><span>Segment List</span></a></li>
        <li class='last'><a href='{{ url("admin/dashboard/segments/create") }}'><span>Create Segment</span></a></li>
      </ul>
    </li>
    <li class='has-sub'><a href='#'><span>Sub Segment</span></a>
    <ul>
      <li><a href='{{ url("admin/dashboard/subsegments") }}'><span>Sub Segment List</span></a></li>
      <li class='last'><a href='{{ url("admin/dashboard/subsegments/create") }}'><span>Create Sub Segment</span></a></li>
    </ul>
  </li>
  <li class='has-sub'><a href='#'><span>District</span></a>
  <ul>
    <li><a href='{{ url("admin/dashboard/districts") }}'><span>District List</span></a></li>
    <li class='last'><a href='{{ url("admin/dashboard/districts/create") }}'><span>Create District</span></a></li>
  </ul>
</li>
<li class='has-sub'><a href='#'><span>Thana</span></a>
<ul>
  <li><a href='{{ url("admin/dashboard/thanas") }}'><span>Thana List</span></a></li>
  <li class='last'><a href='{{ url("admin/dashboard/thanas/create") }}'><span>Create Thana</span></a></li>
</ul>
</li>

<li class='has-sub'><a href='#'><span>Admin</span></a>
<ul>
<li><a href='{{ url("admin/dashboard/admins") }}'><span>Create New Admin</span></a></li>
<li><a href='{{ url("admin/dashboard/admins/create") }}'>Admin List</span></a></li>
</ul>
</li>

<li class='has-sub'><a href='#'><span>Permission</span></a>
<ul>
<li><a href='{{ url("admin/dashboard/permission/user") }}'><span>User</span></a></li>
<li><a href='#'>Admin</span></a></li>
</ul>
</li>

<li class='last'><a href='{{ url("admin/dashboard/settings") }}'><span>Setting</span></a></li>

</ul>

</div>



</div>