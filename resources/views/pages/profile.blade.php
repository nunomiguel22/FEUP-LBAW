@extends('layouts.app')

@section('title', 'OGS')

@section('breadcrumbs')
<!-- Breadcrumbs -->
<nav class="container my-4">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Profile</li>
    </ol>
</nav>
@endsection

@section('content')


<!-- Page Content -->
<section class="container">
   
    <!-- UserInfo -->
    <div class="container p-3" style="background:#2e2e2e;">
        <div class="row">
            <div class="col-3 d-none  d-lg-block">
                <img src="{{ Auth::user()->image->getPath() }}" style="max-height:250px; max-width:250px;"
                    class="align-self-start border b-shadow" alt="...">
            </div>
            <div class="col-4">
                <h3 class="text-shadow">{{Auth::user()->username}}</h3>
                <span class="text-muted">{{Auth::user()->first_name}}</span>
                <span class="text-muted mr"> {{Auth::user()->last_name}}</span>
                @if (is_null(Auth::user()->address))
                <h6 class="my-3">No country</h6>
                @else
                <h6 class="my-3">{{Auth::user()->address->country->name}}</h6>
                @endif
                <span class="text-light">Games purchased: </span> <span class="m">{{$games_purchased}}</span>
            </div>
            <div class="col-1" style="border-right: 1px solid lightgray;"></div>
            <div class="col-4 mt-4">
                <span>{{Auth::user()->description}}</span>
            </div>
        </div>
    </div>
    <!-- GamesPurchased -->
    <div class="container mt-5">

        <h3 class="text-shadow">GAMES PURCHASED</h3>

        <form action="">

            <div class="form-row">
                <div class="col-lg-9 col-sm-12  my-3">

                    <div class="input-group  w-50">
                        <input type="text" class="form-control bg-dark text-light" placeholder="Search for a game..."
                            aria-label="Search for a title..." aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>

                <span class="my-auto col-lg-1 col-sm-2">Sort by </span>

                <div class="col-lg-2 col-md-4 my-auto">
                    <select name="SortBy" class="form-control bg-dark text-light">
                        <option value="Title">Title</option>
                        <option value="PurchaseDate">Purchase Date</option>
                    </select>
                </div>

            </div>
        </form>


@endsection