@extends("Dashboard.User.Boilerplate")
@section("title")
    <title>{{ Auth::user()->name }} - Settings</title>
@stop
@section("content")

    <div class="container">
        @include("Partials.Event")

        <div class="row">
            {{ Form::open(["url" => "user/dashboard/settings/update"]) }}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Full Name" value="{{ Auth::user()->name }}">
            </div>

            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" name="username" class="form-control" id="username" value="{{ Auth::user()->username }}">
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ Auth::user()->email }}">
            </div>

            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Mobile Number" value="{{ Auth::user()->mobile }}">
            </div>

            <div class="form-group">
                <label for="profession">Profession</label>
                <input type="text" name="profession" class="form-control" id="profession" placeholder="Enter Profession" value="{{ Auth::user()->profession }}">
            </div>

            <div class="form-group">
                <label for="birth">Date of Birth</label>
                <input type="text" name="birth" class="form-control" id="birth" placeholder="Enter Date of Birth EXP: 15-01-1990" value="{{ Auth::user()->date_of_birth }}">
            </div>

            <div class="form-group">
                <label for="district">District</label>
                <select class="form-control" name="district" id="district">
                    <option value="0">---- Select District ----</option>
                    @foreach($districts as $d)
                        <option value="{{ $d->id }}" @if(Auth::user()->user_district == $d->id) selected @endif>{{ $d->district_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="thana">Thana</label>
                <select class="form-control" name="thana" id="thana">
                    @foreach($thanas as $thana)
                        <option value="{{ $thana->id }}" @if(Auth::user()->user_thana == $thana->id) selected @endif>{{ $thana->thana_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" name="address" rows="3" placeholder="Enter Address">{{ Auth::user()->address }}</textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">New Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
            </div>

            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="cpassword" placeholder="Re-enter Password">
            </div>

            <div class="form-group">
                <label for="accountType">Account Type</label>
                <input type="text" class="form-control" id="accounttype" value="General" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            {{ Form::close() }}
        </div>
    </div>

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
@stop