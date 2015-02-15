@extends("Dashboard.Boilerplate")

@section("title")
    <title>User Lists - OK Mobile LTD</title>
@stop

@section("page-name")
    <h1 align="center">User Lists</h1>
@stop

@section("content")

    @if($users->count() == 0)
        <div class="alert alert-warning"><span class="glyphicon glyphicon-exclamation-sign"></span> No users found.</div>
    @else
        <div class="row">
            <div class="col-md-4">
                <div class="alert alert-info"><span class="glyphicon glyphicon-ok"></span> Total {{ $users->count() }} user(s) found</div>
            </div>
        </div>

        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td><a href="{{ url("admin/dashboard/users/delete" . $user->id) }}">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@stop