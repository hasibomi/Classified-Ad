@extends("Main.Boilerplate")
@section("title")

<title>User - Registration</title>
@stop

@section("content")
<div class="row">
  <!-- Left -->
  <div class="col-xs-12 col-sm-6 col-md-6">
    
    <h2>Manage all your ads in one place - for free!</h2><br/>
    <h4>View, edit and delete your ads.</h4><br/>
    <h4>Save your contact details to save time when posting new ads.</h4> <br/>
    <p>Do you already have an account? <a href="{{ url('user/login') }}">Log in here!</a></p>
    
    
  </div>
  <!-- Left End -->
  
  <!-- Right -->
  <div class="col-xs-6 col-md-4">
    <div class="row">
      @if($errors->all())
        <br>
        <div class="alert alert-danger">
          Following error(s) occured -
          <ul>
            @foreach($errors->all() as $error)
              <li><span class="glyphicon glyphicon-exclamation-sign"></span> {{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>

    <h2>Don't have an Account yet?</h2>
    <h4>Registration Now!</h4>
    
    {{ Form::open(["url" => "user/store"]) }}
      
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Full Name">
      </div>
      
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
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
    <br/><br/><br/>
  </div>
  <!-- Right End -->
</div>
@stop

@section("script")
  <script>
  $("#district").change(function(e) {
    if($(this).val() == 0) {
      $("#thana").html("<option>---- Select District First ----</option>");
    } else {
      $.ajax({
        url: "signup/findthana/" + $(this).val(),
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