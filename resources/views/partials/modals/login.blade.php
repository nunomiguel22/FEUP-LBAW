<!-- Signin Modal -->
<div class="modal fade" id="LoginModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="container p-4">

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

                <div class="row mb-3 text-center">
                    <span class="col">SIGN IN WITH AN OGS ACCOUNT</span>
                </div>

                <!-- Signin Form -->
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <!-- Email Row -->
                    <div class="row">
                        <div class="col">
                            <input type="email" name="email" class="form-control text-field bg-secondary text-light"
                                placeholder="Email address" required>
                        </div>
                    </div>

                    <!-- Password Row -->
                    <div class="row mt-4">
                        <div class="col">
                            <input type="password" name="password"
                                class="form-control text-field col bg-secondary text-light" placeholder="Password"
                                required>
                        </div>
                    </div>

                    <ul class="row">
                        @foreach ($errors->all() as $error)
                        <li class="error mt-2">{{ $error }}</li>
                        @endforeach
                    </ul>


                    <!-- Submit button Row -->
                    <div class="form-group row mt-4">
                        <div class="col">
                            <button id="loginButton" class="btn btn-secondary btn-lg" style="width:100%;" type="submit"
                                required>
                                Sign in
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Signup link -->
                <div class="row mb-4 text-center">
                    <span class="col-10 m-auto">Don't have an OGS account?
                        <a class="text-muted" href="{{ route('register')}}">
                            Sign up.
                        </a> </span>
                </div>

            </div>
        </div>
    </div>
</div>