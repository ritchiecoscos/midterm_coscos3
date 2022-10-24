@extends('base')

@section('content')
<br><br>
<div class="row">
    <div class="col-md-6 offset-md-3 ">
    <div class="card shadow text-white" style="background-color: rgba(0,0,0,0.8) !important;">
            <div class="card-header ">
                <h3 class="card-tittle text-center">
                    Create Account
                </h3>
            </div>
            <div class="card-body shadow">
                <form action="" method="post">
                    {{csrf_field()}}
                    <div class="mb-3">
                        <label for="name">Your Name</label>
                        <input type="name" name="name" id="name" class="form-control " required>
                    </div>

                    <div class="mb-3 text-black" id="input-container">
                        <i class="fa fa-user icon"></i>
                        <select name="gender" id="gender" class="form-select text-black input-field">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                  <div class="mb-3 ">
                        <label for="email">Your Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                  
                    <div class="mb-3">
                        <label for="password">Your Password</label>
                        <input type="password" name="password" id="password" class="form-control " required>
                    </div>
                  <div class="form-check d-flex justify-content-center mb-5">
                    <input
                      class="form-check-input me-2"
                      type="checkbox"
                      value=""
                      id="form2Example3c"
                    />
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button class="btn btn-dark"  href="{{url('register')}}" style=" letter-spacing:5px;" >Create</button>
                  </div>

                  <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="{{url('/login')}}" class=" text-white"><u>Log in</u></a></p>
<br>
                </form>
                </div>
        </div> 
</div> 
</div>
<br><br>
@stop 
