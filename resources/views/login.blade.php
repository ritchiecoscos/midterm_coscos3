@extends('base')

@section('content')
<br><br><br>
<div class="row">
    <div class="col-md-4 offset-md-4 ">
        <div class="card shadow text-white" style="background-color: rgba(0,0,0,0.8) !important;">
            <div class="card-header ">
                <h3 class="card-tittle text-center">
                    Login
                </h3>
            </div>
            <div class="card-body shadow">
                <form action="" method="post">
                    {{csrf_field()}}
                   
                    <div class="mb-3 ">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                     <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control " required>
                    </div>
                    <p class="text-center" >By signing in you accept our <a href="#!">Terms of Use</a></p>
                    <button class="btn btn-dark " style="margin-left:35%; letter-spacing:8px;">Login</button>
                    <p class="text-center text-muted mt-5 mb-0">No account? <a href="register" class=" text-white"><u>Register Here!</u></a></p>
<br>
                </form>
            </div>
        </div>
</div>
</div>
@stop 
