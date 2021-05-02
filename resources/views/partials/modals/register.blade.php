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
            <img src="{{ Storage::url('images/logo/logo_transparent.png')}}" width="100" height="100" alt="">
          </div>
        </div>

        <div class="row">
          <div class="col-10 ml-auto mr-auto">
            <p>SIGN UP FOR AN OGS ACCOUNT</p>
          </div>
        </div>

        <!-- Signup Form -->
        <form method="POST" action="{{route('register')}}" novalidate>
          @csrf
          <!-- Name Row -->
          <div class="form-group row justify-content-center">
            <input type="text" name="first_name" class="form-control text-field  col-5 bg-secondary text-light"
              placeholder="*First Name" required>
            <input type="text" name="last_name" class="form-control text-field  col-5 bg-secondary text-light"
              placeholder="*Last Name" required>
          </div>

          @if ($errors->has('first_name'))
          <div class="row">
            <span class="error col-10 mx-auto mb-3">{{ $errors->first('last_name') }}</span>
          </div>
          @endif

          @if ($errors->has('last_name'))
          <div class="row">
            <span class="error col-10 mx-auto mb-3">{{ $errors->first('last_name') }}</span>
          </div>
          @endif


          <!-- Display name Row -->
          <div class="form-group row justify-content-center">
            <input type="text" name="username" class="form-control col-10 bg-secondary text-field  text-light"
              placeholder="*Username" required>
          </div>

          @if ($errors->has('Username'))
          <div class="row">
            <span class="error col-10 mx-auto mb-3">{{ $errors->first('Username') }}</span>
          </div>
          @endif


          <!-- Email Row -->
          <div class=" form-group row">
            <input type="email" name="email" class="form-control text-field col-10 m-auto bg-secondary text-light"
              placeholder="Email address" required>
          </div>


          @if ($errors->has('email'))
          <div class="row">
            <span class="error col-10 mx-auto mb-3">{{ $errors->first('email') }}</span>
          </div>
          @endif


          <!-- Password Row -->
          <div class="form-group row">
            <input type="password" name="password"
              class="form-control text-field  col-10 m-auto bg-secondary text-light" placeholder="Password" required>
          </div>

          @if ($errors->has('password'))
          <div class="row">
            <span class="error col-10 mx-auto mb-3">{{ $errors->first('password') }}</span>
          </div>
          @endif

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