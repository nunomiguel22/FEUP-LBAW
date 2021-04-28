<!-- Signup Modal -->
<div class="modal fade" id="SignupModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="container">

        <!-- Modal Header -->
        <div class="row mt-4 mb-3 float-right">
          <div class="col-12">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
        <div class="row mt-4 mb-3">
          <div class="col-12" align="center">
            <img src="{{ asset('images/logo/logo_transparent.png')}}" width="100" height="100" alt="">
          </div>
        </div>

        <div class="row">
          <div class="col-10 ml-auto mr-auto">
            <p>SIGN UP FOR AN OGS ACCOUNT</p>
          </div>
        </div>

        <!-- Signup Form -->
        <form method="POST" action="{{route('register')}}" novalidate>

          {{ csrf_field() }}
          <!-- Name Row -->
          <div class="form-group row justify-content-center">
            <input type="text" name="first_name" class="form-control col-5 bg-secondary text-light" style="height:50px"
              placeholder="*First Name">
            <input type="text" name="last_name" class="form-control col-5 bg-secondary text-light" style="height:50px"
              placeholder="*Last Name">
          </div>
          <!-- Display name Row -->
          <div class="form-group row justify-content-center">
            <input type="text" name="username" class="form-control col-10 bg-secondary text-light" style="height:50px"
              placeholder="*Username">
          </div>

          <!-- Email Row -->
          <div class=" form-group row">
            <input type="email" name="email" class="form-control col-10 m-auto bg-secondary text-light"
              style="height:50px" placeholder="Email address">
          </div>

          <!-- Password Row -->
          <div class="form-group row">
            <input type="password" name="password" class="form-control col-10 m-auto bg-secondary text-light"
              style="height:50px" placeholder="Password">
          </div>

          <!-- Submit button Row -->
          <div class="form-group row mt-3">

            <button id="registerButton" class="btn btn-secondary col-10 m-auto my-2 my-sm-0 btn-lg" style="width:100%;"
              type="submit">
              Sign up</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>