@extends('layouts.app')

@section('title', 'OGS')

@section('breadcrumbs')
<!-- Breadcrumbs -->
<nav class="container my-4 p-0">
  <ol class="breadcrumb m-0 p-0">
    <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Sign up</li>
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
      <span class="col">SIGNUP FOR AN OGS ACCOUNT</span>
    </div>


    <!-- Signup Form -->
    <form method="POST" action="{{route('register')}}">
      @csrf
      <!-- Name Row -->
      <div class="form-group row">
        <div class="col">
          <input type="text" name="first_name" value="{{ old('first_name') }}"
            class="form-control text-field bg-secondary text-light" placeholder="*First Name" required>
        </div>
        <div class="col">
          <input type="text" name="last_name" value="{{ old('last_name') }}"
            class="form-control text-field bg-secondary text-light" placeholder="*Last Name" required>
        </div>
      </div>


      <div class="row mb-3">
        <span class="error col">{{ $banned_message }}</span>
      </div>



      <!-- Display name Row -->
      <div class="form-group row">
        <div class="col">
          <input type="text" name="username" value="{{ old('username') }}"
            class="form-control bg-secondary text-field  text-light" placeholder="*Username" required>
        </div>
      </div>

      @if ($errors->has('username'))
      <div class="row mb-3">
        <span class="error col">{{ $errors->first('username') }}</span>
      </div>
      @endif


      <!-- Email Row -->
      <div class=" form-group row">
        <div class="col">
          <input type="email" name="email" value="{{ old('email') }}"
            class="form-control text-field bg-secondary text-light" placeholder="*Email address" required>
        </div>
      </div>


      @if ($errors->has('email'))
      <div class="row mb-3">
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

      @if ($errors->has('password'))
      <div class="row mb-3">
        <span class="error col">{{ $errors->first('password') }}</span>
      </div>
      @endif

      <!-- Password confirmation Row -->
      <div class="form-group row">
        <div class="col">
          <input type="password" name="password_confirmation" class="form-control text-field bg-secondary text-light"
            placeholder="*Confirm password" required>
        </div>
      </div>



      <!-- Submit button Row -->
      <div class="form-group row mt-3 mb-4">
        <div class="col">
          <button id="registerButton" class="btn btn-secondary col btn-lg" style="width:100%;" type="submit">
            Sign up</button>
        </div>
      </div>

    </form>
  </section>
</section>


@endsection