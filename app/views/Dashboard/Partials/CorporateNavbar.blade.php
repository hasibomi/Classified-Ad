<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-3">

        <!-- CSS Menu Start -->
        <div id='cssmenu'>
            <ul>
                <li class='active'><a href='{{ url("admin/logout") }}'><span>Admin Logout</span></a></li>

                <li class='has-sub'><a href='#'><span>User</span></a>
                    <ul>
                        <li><a href='{{ url("admin/dashboard/users/create") }}'><span>Create User</span></a></li>
                        <li class='last'><a href='{{ url("admin/dashboard/users") }}'><span>User List</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
