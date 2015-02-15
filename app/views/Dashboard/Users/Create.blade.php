@extends("Dashboard.Boilerplate")

@section("title")
    <title>Home - OK Mobile LTD</title>
@stop

@section("page-name")
    <h1 align="center">Dashboard</h1>
@stop

@section("content")

    @include("Partials.Event")

    {{ Form::open(["url" => "admins/dashboard/users/create/store"]) }}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Full Name">
        </div>

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
        </div>

        <div class="form-group">
            {{ Form::label('username', 'Username') }}
            {{ Form::text('username', Input::old('username') ? e(Input::old('username')) : '', ['class' => 'form-control', 'placeholder' => 'Choose a username', 'id' => 'username']) }}
        </div>

        {{-- Status div --}}
        <div class="form-group" id="status" style="display: none;">
            <div class="alert alert-danger" style="display:none;" id="errorBox"></div>
        </div>

        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile Number">
        </div>

        <div class="form-group">
            <label for="profession">Profession</label>
            <input type="text" name="profession" class="form-control" id="profession" placeholder="Enter Profession">
        </div>

        <div class="form-group">
            <label for="birth">Date of Birth</label>
            <input type="text" name="birth" class="form-control" id="birth" placeholder="Enter Date of Birth EXP: 15-01-1990">
        </div>

        <div class="form-group">
            <label for="district">District</label>
            <select class="form-control" name="district" id="district">
                <option value="0">---- Select District ----</option>
                @foreach($districts as $d)
                    <option value="{{ $d->id }}">{{ $d->district_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="thana">Thana</label>
            <select class="form-control" name="thana" id="thana">
                <option>---- Select District First ----</option>
                <option>B</option>
            </select>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" name="address" rows="3" placeholder="Enter Address"></textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
        </div>

        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="cpassword" placeholder="Re-enter Password">
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="text" name="date" class="form-control" id="date" value="{{ date('d-m-Y') }}" readonly>
        </div>

        <div class="form-group">
            <label for="accountType">Account Type</label>
            <input type="text" class="form-control" id="accounttype" value="General" readonly>
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="privacy"> By Clicking on "Create Account" I acknowledge the <a href="#">Privacy Policy</a> of abc.com
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Create Account</button>
    {{ Form::close() }}

@stop

@section("script")
    <script>
        $("#district").change(function(e) {
            if($(this).val() == 0) {
                $("#thana").html("<option>---- Select District First ----</option>");
            } else {
                $.ajax({
                    url: "/user/signup/findthana/" + $(this).val(),
                    method: "POST",
                    dataType: "HTML",
                    data: "district=" + $(this).val(),
                    success: function(data) {
                        $("#thana").html(data);
                    }
                });
            }
        });
    </script>
    <script src="{{ asset('assets/js/find_username.js') }}" type="text/javascript"></script>
@stop