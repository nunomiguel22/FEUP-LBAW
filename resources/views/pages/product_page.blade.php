@extends('layouts.app')

@section('title', 'OGS')

@section('breadcrumbs')
<!-- Breadcrumbs -->
<nav class="container my-4 p-0">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products') }}">Products</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$game->title}}</li>
    </ol>
</nav>
@endsection

@section('content')

<section class="container">
    <ul class="row">
        @foreach ($errors->all() as $error)
        <li class="error mt-2">{{ $error }}</li>
        @endforeach
    </ul>
    <div class="row mt-4">
        <div class="col mr-4">
            <div id="carousel" class="carousel row slide carousel-fade" data-ride="carousel">
                <article class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ $game->cover_image() }}" class="d-block w-100" alt="game_img">
                    </div>
                    @php
                    $isFirst = true
                    @endphp
                    @forelse ($game->images as $image)
                    @php
                    if($isFirst) {
                    $isFirst = false;
                    continue;
                    }
                    @endphp
                    <div class="carousel-item">
                        <img src="{{ $image->getPath() }}" class="d-block w-100" alt="game_img">
                    </div>
                    @empty
                    @endforelse
                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </article>
            </div>

            <div class="row mt-2">
                @if(Auth::check())
                <form method="POST" class="col p-0" action="/products/{{$game->id}}/cart">
                    @csrf
                    @if(Auth::user()->gameInCart($game->id))
                    @method('DELETE')
                    <button type="submit" class="w-100 btn btn-danger" style="min-height:44px;">
                        <i class="fas fa-shopping-cart"></i>
                        Remove from cart
                    </button>
                    @elseif($keys_available === 0)
                    <button type="submit" class="w-100 btn btn-success" style="min-height:44px;"
                        title="Currently out of stock" disabled>
                        <i class="fas fa-shopping-cart"></i>
                        Add to cart
                    </button>
                    @else
                    <button type="submit" class="w-100 btn btn-success" style="min-height:44px;">
                        <i class="fas fa-shopping-cart"></i>
                        Add to cart
                    </button>
                    @endif

                </form>
                <div class="col pr-0 mr-0">
                    <button type="button" class="btn btn-secondary w-100" style="min-height:44px;">
                        <i class="far fa-heart"></i> Add to wishlist
                    </button>
                </div>
                @else
                <div class="col p-0">
                    <button type="button" class="btn btn-success w-100" data-toggle="modal" data-target="#LoginModal"
                        style="min-height:44px;">
                        <i class="fas fa-shopping-cart"></i> Add to cart
                    </button>
                </div>
                <div class="col pr-0 mr-0">
                    <button type="button" class="btn btn-secondary w-100" data-toggle="modal" data-target="#LoginModal"
                        style="min-height:40px;">
                        <i class="far fa-heart"></i> Add to wishlist</button>
                </div>
                @endif
            </div>
        </div>

        <div class="col">
            <h3 class="row">{{$game->title ?? null}}</h3>
            @if($keys_available === 0)
            <span class="row text-danger">Currently unavailable for purchase</span>
            @endif

            <div class="row mt-4">
                <div class="col">
                    <h6 class="row text-light"> Developer </h6>
                    <p class="row text-muted">{{$game->developer->name ?? null}}</p>

                </div>
                <div class="col">

                    <h6 class="row text-light"> Released on </h6>
                    <span class="row text-muted">{{$game->formattedLaunchDate('d-m-Y') ?? null}}</span>
                </div>
            </div>
            <h6 class="row text-light mt-4"> About {{$game->title}}</h6>
            <div class="row">
                <p style="font-size:100%;">
                    {{$game->description ?? null}}
                </p>
            </div>

            <div class="row mt-4">

                <div class="col-4 col-md-2">
                    <h6 class="row text-light"> Price </h6>
                    <h5 class="row">{{$game->price ?? null}} €</h5>
                </div>

                <div class="col">
                    <h6 class="row text-light"> Tags </h6>
                    <span class="text-muted row" style="word-spacing: 2px;">
                        @forelse ($game->tags as $tag)
                        {{$tag->name}}
                        @empty
                        No tags yet!
                        @endforelse
                    </span>
                </div>

                <div class="col-3 m-0 p-0 ">
                    <div class="radialProgressBar progress-{{$percent}} m-0 p-0">
                        <div class="overlay text-light ">{{$game->score ?? null}}</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @if(Auth::check() && Auth::user()->is_admin)

    <div class="row mt-5">
        <hr class="col px-0">
        <span> <i class="fas fa-hammer"></i> Administrator Section </span>
        <hr class="col px-0">
    </div>


    <div class="row my-3">
        <div class="col border-right">
            <span class="row text-light">Sales</span>
            <span class="row mt-2 text-muted">
                {{ $purchases->count() }}
            </span>
        </div>
        <div class="col border-right ml-2">
            <span class="row text-light">Total Revenue</span>
            <span class="row mt-2 text-muted">
                {{ $purchases->sum('price') }}€
            </span>
        </div>
        <div class="col border-right ml-2">
            <span class="row text-light">Last Purchase</span>
            <span class="row mt-2 text-muted">
                @if($purchases->count() > 0)
                {{ $purchases->first()->formattedTimestamp('d-m-Y H:i:s') }}
                @else
                None yet...
                @endif
            </span>
        </div>
        <div class="col border-right ml-2">
            <span class="row text-light">Keys Available</span>
            <span class="row mt-2 text-muted">
                {{ $keys_available }}
            </span>
        </div>

        <div class="col border-right ml-2">
            <span class="row text-light">Actions</span>
            <div class="row mt-2">
                <a href="{{ url('/admin/products/'.$game->id.'/edit') }}" class="mr-2">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <a href="{{ url('/admin/products/'.$game->id.'/keys') }}">
                    <i class="fas fa-key"></i>
                </a>
            </div>
        </div>
    </div>
    @endif


</section>

<div class="container" style="padding-top:50px;">
    <div class="row">
        <div class="col">
            <hr style="background:white;">
        </div>
        <span><i class="fas fa-book"></i> Reviews </span>
        <div class="col">
            <hr style="background:white;">
        </div>
    </div>
</div>

@forelse ($reviews as $review)
@include('partials.review.see_review', ['review' => $review])
@if(Auth::user())
@if($review->user_id === Auth::user()->id)
@php
$user_review = $review;
@endphp
@endif
@endif
@empty
No reviews yet!
@endforelse



@if(Auth::check() && $game->user_has_key(Auth::user()->id))
@if(!$game->user_has_review(Auth::user()->id))
<form method="POST" action="/reviews/products/{{$game->id}}/review" enctype="multipart/form-data">
    @csrf
    @include('partials.review.make_review')
</form>
@else
<form method="POST" action="/reviews/products/{{$game->id}}/review/{{$user_review->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('partials.review.edit_review', ['user_review' => $user_review])
</form>
@endif
@endif



@endsection