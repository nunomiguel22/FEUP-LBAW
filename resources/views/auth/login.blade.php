@extends('layouts.app')

@section('title', 'OGS')

@section('breadcrumbs')
<!-- Breadcrumbs -->
<nav class="container my-4 p-0">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Login</li>
    </ol>
</nav>
@endsection

@section('content')

<section class="container mb-3" style="background: rgba(0, 0, 0, 0.1)">

    <section class="container p-4" style="max-width:500px; min-width:50px;">
        <div class="row mt-4 mb-3">
            <div class="col-12" align="center">
                <img src="{{ Storage::url('images/logo/logo_transparent.png')}}" width="100" height="100" alt="">
            </div>
        </div>

        <div class="row mb-3 text-center">
            <span class="col">SIGN IN WITH AN OGS ACCOUNT</span>
        </div>

        <!-- Signin Form -->
        <form method="POST" action="{{route('login')}}">
            @csrf
            <!-- Email Row -->
            <input type="email" name="email" value="{{ old('email') }}"
                class="form-control text-field bg-secondary text-light" placeholder="Email address" required>

            <!-- Password Row -->
            <input type="password" name="password" class="form-control text-field col bg-secondary text-light mt-3"
                placeholder="Password" required>


            <ul class="row">
                @foreach ($errors->all() as $error)
                <li class="error mt-2">{{ $error }}</li>
                @endforeach
            </ul>

            <label class="row mt-2">
                <div class="col" align="center">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="text-light">Remember me</span>
                </div>
            </label>

            <!-- Submit button Row -->
            <div class="form-group row mt-4">
                <div class="col">
                    <button id="loginButton" class="btn btn-secondary btn-lg w-100" type="submit" required>
                        Sign in
                    </button>
                </div>
            </div>
        </form>

        <!-- Signup link -->
        <div class="row text-center">
            <span class="col-10 m-auto">Don't have an OGS account?
                <a class="text-muted" href="{{ route('register')}}">
                    Sign up.
                </a>
            </span>
        </div>
    </section>
</section>


@endsection