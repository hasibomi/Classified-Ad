@extends("Main.Boilerplate")

@section("title")
    <title>Account Recovery</title>
@stop

@section("content")
    <h3>Hi {{ $email }},</h3>
    <p>Please create a new password.</p>

    {{ Form::open(['url' => 'mypassword/change/update', 'class' => "form-inline"]) }}
        <div class="form-group">
            {{ Form::hidden('user_email', $email) }}
            {{ Form::hidden('code', $code) }}
            {{ Form::label('password', 'Enter a new password', ['class' => 'sr-only']) }}
            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter a new password', 'size' => '30px']) }}
            {{ Form::label('password_confirmation', 'Confirm Password', ['class' => 'sr-only']) }}
            {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm your password', 'size' => '30px']) }}
        </div>
        {{ Form::submit('Submit') }}
    {{ Form::close() }}
@stop