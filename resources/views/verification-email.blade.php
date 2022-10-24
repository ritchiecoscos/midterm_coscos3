<h3>Account Verification</h3>
<h1>CheapTalk </h1>
<br>
<h3 style="text-align:center;">
    Hi {{$user->name}}!
</h3>

<p style="text-align:center;"> 
    You have successfully created your account.
    Please click the link below to verify your email address and complete your registration.

</p>

<h1 style="text-align:center;">
<a class="btn btn-info" href="{{url('/verification/' . $user->id . "/" . $user->remember_token)}}" role="button">Verify Email</a>

</h1>
