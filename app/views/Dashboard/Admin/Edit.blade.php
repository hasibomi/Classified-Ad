@extends("Dashboard.Boilerplate")
@section("title")
    <title>Admin - Edit Admin</title>
@stop
@section("page-name")
    <h1 align="center"> Edit Admin - {{ $admin->name }}</h1>
@stop
@section("content")
    @include("Partials.Event")
    {{ Form::open(["url" => "admin/dashboard/admin/" . $admin->id . "/update", "class" => "form-horizontal"]) }}
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Admin Type</label>
        <div class="col-sm-10">
            <select class="form-control" name="type">
                <option>--- Select Admin Type ---</option>
                <option value="2" @if($admin->is_admin == 2) selected @endif>Classified Admin</option>
                <option value="3" @if($admin->is_admin == 3) selected @endif>Corporate Admin</option>
                <option value="4" @if($admin->is_admin == 4) selected @endif>Content Admin</option>
                <option value="5" @if($admin->is_admin == 5) selected @endif>Creative Admin</option>
                <option value="1" @if($admin->is_admin == 1) selected @endif>Super Admin</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3"  class="col-sm-2 control-label">Full Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Admin Name" value="{{ $admin->name  }}">
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('username', 'Username', ['class'=>'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::text('username',$admin->username, ['class' => 'form-control', 'placeholder' => 'Choose a username', 'id' => 'username', 'disabled' => 'disabled']) }}
        </div>
    </div>

    {{-- Status div --}}
    <div class="form-group" id="status" style="display: none;">
        <div class="alert alert-danger" style="display:none;" id="errorBox"></div>
    </div>

    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Admin Email" value="{{ $admin->email }}" disabled>
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">New Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password" id="password" placeholder="Change password">
        </div>
    </div>

    <div class="form-group" align="right">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Edit Admin</button>
        </div>
    </div>
    {{ Form::close() }}
@stop

@section('script')
    <script src="{{ asset('assets/js/find_username.js') }}" type="text/javascript"></script>
@stop