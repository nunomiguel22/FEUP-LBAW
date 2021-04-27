@extends('layouts.app')

@section('title', 'OGS')

@section('content')

<div class="container">
    @if (!empty($carousel_games))
    @include('partials.carousel', ['carousel_games' => $carousel_games])
    @endif

    <!-- Game Nav Divider -->
    <div class="container" style="padding-top:80px;">
        <div class="row">
            <div class="col">
                <hr>
            </div>
            <span><i class="fas fa-book-open"></i> Browse Catalogs</span>
            <div class="col">
                <hr>
            </div>
        </div>
    </div>

    <!-- Game Nav -->
    <div class="container">
        <ul class="nav nav-tabs" id="HomeNav" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Top Sellers</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                    aria-controls="profile" aria-selected="false">Action</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                    aria-controls="contact" aria-selected="false">Adventure</a>
            </li>
        </ul>
        <div class="tab-content" id="HomeNavContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <!-- Game Nav Card Deck -->
                <div class="card-deck mb-3 text-center">
                    @forelse ($first_row as $game)
                    <!-- Card -->
                    <div class="card mb-2 mt-2 hover-darken">
                        <!-- Image -->
                        <img src="{{ asset('' . $game->cover_image()) }}" class="card-img-top" alt="Cyberpunk">
                        <!-- Wishlist Indicator -->
                        <a class="wishlist-indicator fade-in text-shadow" data-toggle="tooltip" data-placement="left"
                            title="Add to Wishlist" href="asd.php"><i class="fas fa-plus-circle"></i></a>
                        <!-- Wishlist Card Body -->
                        <div class="row mt-2">
                            <span class="col-7 HomeNav-GameTitle">{{ $game->title }}</span>
                            <span class="col-4 HomeNav-price text-right mr-3">{{ $game->price }}€</span>
                        </div>
                        <div class="row">
                            <span class="col-7 HomeNav-devInfo">{{ $game->developer() }}</span>

                        </div>
                        <a href="/product_page_logged.php" class="btn btn-secondary hidden-opacity stretched-link"></a>
                    </div>
                    @empty
                    <p>No gaems</p>
                    @endforelse
                </div>

                <!-- Game Nav Card Deck -->
                <div class="card-deck mb-3 text-center">
                    @forelse ($second_row as $game)
                    <!-- Card -->
                    <div class="card mb-2 mt-2 hover-darken">
                        <!-- Image -->
                        <img src="{{ asset('' . $game->cover_image()) }}" class="card-img-top" alt="Cyberpunk">
                        <!-- Wishlist Indicator -->
                        <a class="wishlist-indicator fade-in text-shadow" data-toggle="tooltip" data-placement="left"
                            title="Add to Wishlist" href="asd.php"><i class="fas fa-plus-circle"></i></a>
                        <!-- Wishlist Card Body -->
                        <div class="row mt-2">
                            <span class="col-7 HomeNav-GameTitle">{{ $game->title }}</span>
                            <span class="col-4 HomeNav-price text-right mr-3">{{ $game->price }}€</span>
                        </div>
                        <div class="row">
                            <span class="col-7 HomeNav-devInfo">{{ $game->developer() }}</span>

                        </div>
                        <a href="/product_page_logged.php" class="btn btn-secondary hidden-opacity stretched-link"></a>
                    </div>
                    @empty
                    <p>No gaems</p>
                    @endforelse
                </div>

                <!-- Game Nav Card Deck -->
                <div class="card-deck mb-3 text-center">

                    @forelse ($third_row as $game)
                    <!-- Card -->
                    <div class="card mb-2 mt-2 hover-darken">
                        <!-- Image -->
                        <img src="{{ asset('' . $game->cover_image()) }}" class="card-img-top" alt="Cyberpunk">
                        <!-- Wishlist Indicator -->
                        <a class="wishlist-indicator fade-in text-shadow" data-toggle="tooltip" data-placement="left"
                            title="Add to Wishlist" href="asd.php"><i class="fas fa-plus-circle"></i></a>
                        <!-- Wishlist Card Body -->
                        <div class="row mt-2">
                            <span class="col-7 HomeNav-GameTitle">{{ $game->title }}</span>
                            <span class="col-4 HomeNav-price text-right mr-3">{{ $game->price }}€</span>
                        </div>
                        <div class="row">
                            <span class="col-7 HomeNav-devInfo">{{ $game->developer() }}</span>

                        </div>
                        <a href="/product_page_logged.php" class="btn btn-secondary hidden-opacity stretched-link"></a>
                    </div>
                    @empty
                    <p>No gaems</p>
                    @endforelse

                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                Soon Tm
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                Soon Tm
            </div>
        </div>

    </div>

    @endsection