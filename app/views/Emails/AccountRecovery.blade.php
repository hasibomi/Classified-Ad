<h3>Hi {{ $email }},</h3>

<p>We have found your password recovery request. Please follow the link below to create a new password.</p>
<p>
    <a href="{{ url('mypassword/change/' . $email . '/' . $code) }}">Create password</a>
</p>