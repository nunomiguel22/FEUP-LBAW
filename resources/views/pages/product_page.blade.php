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
            <div class="carousel row slide carousel-fade" data-ride="carousel">
                <article class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ $game->cover_image() }}" class="d-block w-100" alt="''.$game->title">

                    </div>
                    @forelse ($game->images as $image)
                    <div class="carousel-item">
                        <img src="{{ $image->getPath() }}" class="d-block w-100" alt="''.$game->title">
                    </div>
                    @empty
                    @endforelse
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
            <div class="row">
                <div class="col">
                    <h3 class="row">{{$game->title ?? null}}</h3>
                    <p class="row text-muted">{{$game->developers->name ?? null}}</p>
                </div>
                <div class="col mt-2">
                    <div class="row">
                        <h5>Released on &nbsp;</h5>
                        <span class="text-muted">{{$game->launch_date ?? null}}</span>
                    </div>
                    <h4 class="row">{{$game->price ?? null}} €</h4>
                </div>
            </div>

            <div class="row">
                <p style="font-size:100%;">
                    {{$game->description ?? null}}
                </p>
            </div>

            <div class="row">
                <div class="col">
                    <div class="row mt-3">
                        <h4> Tags </h4>
                    </div>
                    <div class="row">
                        <span class="text-muted" style="word-spacing: 2px;">
                            @forelse ($game->tags as $tag)
                            {{$tag->name}}
                            @empty
                            No tags yet!
                            @endforelse
                        </span>
                    </div>
                </div>
                <div class="col">
                    <div class="radialProgressBar-large progress-{{$percent}}">
                        <div class="overlay text-light">{{$game->score ?? null}}</div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>


@endsection