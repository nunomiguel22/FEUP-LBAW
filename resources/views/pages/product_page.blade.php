@extends('layouts.app')

@section('title', 'OGS')

@section('content')



<div class="container">


    <aside class="row mt-3 p-0">
        <ol class="breadcrumb m-0 p-0">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Products</li>
        </ol>
    </aside>


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
                <button type="button" class="btn btn-success mb-2 mr-2"><i class="fas fa-shopping-cart"></i> Add to
                    cart</button>
                <button type="button" class="btn btn-secondary mb-2 mr-2"><i class="far fa-heart"></i>Add to
                    wishlist</button>
                @else
                <button type="button" class="btn btn-success mb-2 mr-2" data-toggle="modal" data-target="#LoginModal">
                    <i class="fas fa-shopping-cart"></i> Add to
                    cart
                </button>
                <button type="button" class="btn btn-secondary mb-2 mr-2" data-toggle="modal" data-target="#LoginModal">
                    <i class="far fa-heart"></i>Add to
                    wishlist</button>
                @endif
            </div>

        </div>

        <div class="col">
            <h3 class="row">{{$game->title ?? null}}</h3>
            <div class="row">
                <div class="col">


                    <h6 class="row text-light"> Developer </h6>
                    <p class="row text-muted">{{$game->developers->name ?? null}}</p>
                </div>
                <div class="col">

                    <h6 class="row text-light"> Released on </h6>
                    <span class="row text-muted">{{$game->launch_date ?? null}}</span>
                </div>
            </div>
            <h6 class="row text-light"> About {{$game->title}}</h6>
            <div class="row">
                <p style="font-size:100%;">
                    {{$game->description ?? null}}
                </p>
            </div>

            <div class="row">

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

</div>


@endsection