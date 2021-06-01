@extends('layouts.app')

@section('title', 'OGS')

@section('breadcrumbs')
<!-- Breadcrumbs -->
<nav class="container my-4 p-0">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Email Verification</li>
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
            <span class="col">A verification email has been sent to your mailbox.
                Verify your email before purchasing games. Click below if you need the email to be resent.
            </span>
        </div>

        <!-- Signin Form -->
        <form method="POST" action="{{route('verification.send')}}">
            @csrf
            <!-- Submit button Row -->
            <div class="form-group row mt-4">
                <div class="col">
                    <button class="btn btn-secondary btn-lg w-100" type="submit" required>
                        Resend verification email
                    </button>
                </div>
            </div>
        </form>

        <div class="row mb-3 text-center">
            <span class="col text-success">{{ Session::get('message')}}</span>
        </div>
    </section>
</section>


@endsection