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
                <span class="text-light">Games purchased: </span> <span class="m">{{$games_purchased_num}}</span>
            </div>
            <div class="col-1" style="border-right: 1px solid lightgray;"></div>
            <div class="col-4 mt-4">
                <span>{{Auth::user()->description}}</span>
            </div>
        </div>
    </div>
    <!-- GamesPurchased -->
    <div class="container mt-5">
        @if(($games_purchased_num) == 0)
        <h3 class="text-shadow">NO GAMES PURCHASED</h3>
        @else
        <h3 class="text-shadow">RECENT GAMES PURCHASED</h3>
        <div>
        @php
        $i = 0;
        
        @endphp

        @forelse($purchases as $purchase)
            @if ($i % 3 == 0)
                <div class="card-deck mb-3 text-center">
            @endif

            @include('partials.profile.card', ['purchase' => $purchase])

            @if($i % 3 == 2)
                </div>
            @endif

            @php
            $i++;
            @endphp
        @empty
        @endforelse

        @while($i % 3 != 0)
            @php
            $i++;
            @endphp
            <article class="card mb-2 mt-2 hover-darken">
            </article>

            @if($i % 3 == 0)
            </div>
            @endif
        @endwhile
    </div>

    @endif

@endsection