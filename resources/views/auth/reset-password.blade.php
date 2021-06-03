@extends('layouts.app')

@section('title', 'OGS')

@section('breadcrumbs')
<!-- Breadcrumbs -->
<nav class="container my-4 p-0">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Change your password</li>
    </ol>
</nav>
@endsection

@section('content')

<section class="container mb-3" style="background: rgba(0, 0, 0, 0.1)">

    <section class="container p-4" style="max-width:800px; min-width:50px;">
        <div class="row mt-4 mb-3">
            <div class="col-12" align="center">
                <img src="{{ Storage::url('images/logo/logo_transparent.png')}}" width="100" height="100" alt="">
            </div>
        </div>

        <div class="row my-5">
            <div class="col-6" style="border-right: 1px solid lightgray;">

                <div class="row mb-3 text-center text-light">
                    <span class="col">CHOOSE YOUR PASSWORD</span>
                </div>

                <!-- Signin Form -->
                <form method="POST" action="{{route('password.update')}}">
                    @csrf
                    <!-- Email Row -->
                    <input type="email" name="email" value="{{$_GET['email'] ?? old('email')}}"
                        class="form-control text-field bg-secondary text-light" placeholder="Email address"
                        readonly="true" required>

                    <!-- Password Row -->
                    <input type="password" name="password"
                        class="form-control text-field col bg-secondary text-light mt-3" placeholder="Password"
                        required>

                    <!-- Password Row -->
                    <input type="password" name="password_confirmation"
                        class="form-control text-field col bg-secondary text-light mt-3"
                        placeholder="Confirm your Password" required>

                    <ul class="row">
                        @foreach ($errors->all() as $error)
                        <li class="error mt-2">{{ $error }}</li>
                        @endforeach
                    </ul>

                    <input type="hidden" name="token" value="{{$token}}">


                    <!-- Submit button Row -->
                    <div class="form-group row mt-4">
                        <div class="col">
                            <button class="btn btn-success btn-lg w-100" type="submit" required>
                                Update your password
                            </button>
                        </div>
                    </div>
                </form>

            </div>

            <div class="col-5 ml-2">
                <div class="row">
                    <h6 class="text-light col text-center">YOUR PASSWORD AND EMAIL</h6>
                </div>
                <span class="text-light row mt-3 mb-2">Your password must follow the following format:</span>

                <ul class="text-muted row pl-3">
                    <li class="mt-2">Must be at least 6 characters in length</li>
                    <li class="mt-2">Must contain at least one lowercase letter (a – z)</li>
                    <li class="mt-2">Must contain at least one uppercase letter (A – Z)</li>
                    <li class="mt-2">Must contain at least one digit (0 – 9)</li>
                </ul>

                <span class="text-light row my-3">To change your password you type your new
                    password on the new password and Confirm your password fields</span>


            </div>

        </div>



    </section>
</section>


@endsection