<!-- Signup Modal -->
<div class="modal fade" id="SignupModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="container p-4">

        <!-- Modal Header -->
        <div class="row mt-4 mb-3 float-right">
          <div class="col">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
        <div class="row mt-4 mb-3">
          <div class="col" align="center">
            <img src="{{ Storage::url('images/logo/logo_transparent.png')}}" width="100" height="100" alt="">
          </div>
        </div>

        <div class="row mb-3 text-center">
          <span class="col">SIGNUP FOR AN OGS ACCOUNT</span>
        </div>


        <!-- Signup Form -->
        <form method="POST" action="{{route('register')}}" novalidate>
          @csrf
          <!-- Name Row -->
          <div class="form-group row">
            <div class="col">
              <input type="text" name="first_name" class="form-control text-field bg-secondary text-light"
                placeholder="*First Name" required>
            </div>
            <div class="col">
              <input type="text" name="last_name" class="form-control text-field bg-secondary text-light"
                placeholder="*Last Name" required>
            </div>
          </div>

          @if ($errors->has('first_name'))
          <div class="row mb-2">
            <span class="error col mb-3">{{ $errors->first('last_name') }}</span>
          </div>
          @endif

          @if ($errors->has('last_name'))
          <div class="row mb-2">
            <span class="error col mb-3">{{ $errors->first('last_name') }}</span>
          </div>
          @endif


          <!-- Display name Row -->
          <div class="form-group row">
            <div class="col">
              <input type="text" name="username" class="form-control bg-secondary text-field  text-light"
                placeholder="*Username" required>
            </div>
          </div>

          @if ($errors->has('Username'))
          <div class="row mb-2">
            <span class="error col">{{ $errors->first('Username') }}</span>
          </div>
          @endif


          <!-- Email Row -->
          <div class=" form-group row">
            <div class="col">
              <input type="email" name="email" class="form-control text-field bg-secondary text-light"
                placeholder="*Email address" required>
            </div>
          </div>


          @if ($errors->has('email'))
          <div class="row mb-2">
            <span class="error col">{{ $errors->first('email') }}</span>
          </div>
          @endif


          <!-- Password Row -->
          <div class="form-group row">
            <div class="col">
              <input type="password" name="password" class="form-control text-field bg-secondary text-light"
                placeholder="*Password" required>
            </div>
          </div>

          <!-- Password confirmation Row -->
          <div class="form-group row">
            <div class="col">
              <input type="password" name="password_confirmation"
                class="form-control text-field bg-secondary text-light" placeholder="*Confirm password" required>
            </div>
          </div>

          @if ($errors->has('password'))
          <div class="row">
            <span class="error col">{{ $errors->first('password') }}</span>
          </div>
          @endif

          <!-- Submit button Row -->
          <div class="form-group row mt-3 mb-4">
            <div class="col">
              <button id="registerButton" class="btn btn-secondary col btn-lg" style="width:100%;" type="submit">
                Sign up</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>