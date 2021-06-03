@extends('layouts.app')

@section('title', 'OGS')

@section('breadcrumbs')
<!-- Breadcrumbs -->
<nav class="container my-4 p-0">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Forgot Password</li>
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

        <div class="row mb-3">
            <span class="col">FORGOT PASSWORD?</span>
        </div>

        <div class="row mb-3">
            <span class="col">
                Enter your email below, you will receive an email with instructions on how to reset your
                password within a few minutes.
            </span>
        </div>

        <!-- Signin Form -->
        <form method="POST" action="{{route('password.email')}}">
            @csrf
            <!-- Email Row -->
            <input type="email" name="email" value="{{ old('email') }}"
                class="form-control text-field bg-secondary text-light" placeholder="Email address" required>

            <ul class="row">
                @foreach ($errors->all() as $error)
                <li class="error mt-2">{{ $error }}</li>
                @endforeach
            </ul>


            <!-- Submit button Row -->
            <div class="form-group row mt-4">
                <div class="col">
                    <button class="btn btn-secondary btn-lg w-100" type="submit" required>
                        Send Instructions
                    </button>
                </div>
            </div>
        </form>

        <div class="row mb-3 text-center">
            <span class="col text-success">{{ Session::get('status')}}</span>
        </div>

    </section>
</section>


@endsection