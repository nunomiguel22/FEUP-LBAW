<!-- Signin Modal -->
<div class="modal fade" id="LoginModal">
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
                        <img src="{{ Storage::url('images/logo/logo_transparent.png')}}" width="100" height="100"
                            alt="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-10 mx-auto">
                        <p>SIGN IN WITH AN OGS ACCOUNT</p>
                    </div>
                </div>

                <!-- Signin Form -->
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <!-- Email Row -->
                    <div class="form-group row">
                        <input type="email" name="email"
                            class="form-control text-field col-10 m-auto bg-secondary text-light"
                            placeholder="Email address" required>
                    </div>

                    <!-- Password Row -->
                    <div class="form-group row mt-4">
                        <input type="password" name="password"
                            class="form-control text-field col-10 m-auto bg-secondary text-light" placeholder="Password"
                            required>
                    </div>

                    @foreach ($errors->all() as $error)
                    <li class="error col-10 mx-auto">{{ $error }}</li>
                    @endforeach



                    <!-- Submit button Row -->
                    <div class="form-group row mt-5">

                        <button id="loginButton" class="btn btn-secondary col-10 m-auto my-2 my-sm-0 btn-lg"
                            style="width:100%;" type="submit" required>
                            Sign in
                        </button>
                    </div>
                </form>

                <!-- Signup link -->
                <div class="row mb-4" align="center">
                    <span class="col-10 m-auto">Don't have an OGS account?
                        <a class="text-muted" href="{{ route('register')}}">
                            Sign up.
                        </a> </span>
                </div>

            </div>
        </div>
    </div>
</div>