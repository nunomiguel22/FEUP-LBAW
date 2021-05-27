@extends('layouts.app')

@section('title', 'OGS')

@section('content')

<section class="container">

    <section class="container">
        <!-- Carousel -->
        @if (!empty($carousel_games))
        @include('partials.homepage.carousel', ['title_game' => $title_game,
        'carousel_games' => $carousel_games])
        @endif
    </section>
    <!-- Game Nav Divider -->
    <aside class="container mt-4">
        <div class="row">
            <div class="col">
                <hr>
            </div>
            <span><i class="fas fa-book-open"></i> Browse Catalogs</span>
            <div class="col">
                <hr>
            </div>
        </div>
    </aside>

    <!-- Game Nav -->
    <section class="container">
        <aside>
            <ul class="nav nav-tabs" id="HomeNav" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">Top Sellers</a>
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
        </aside>
        <div class="tab-content" id="HomeNavContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <!-- Game Nav Card Deck -->
                <div class="card-deck mb-3 text-center">
                    @forelse ($first_row as $game)
                    @include('partials.homepage.card', ['game' => $game])
                    @empty
                    <p>No gaems</p>
                    @endforelse
                </div>

                <!-- Game Nav Card Deck -->
                <div class="card-deck mb-3 text-center">
                    @forelse ($second_row as $game)
                    @include('partials.homepage.card', ['game' => $game])
                    @empty
                    <p>No gaems</p>
                    @endforelse
                </div>

                <!-- Game Nav Card Deck -->
                <div class="card-deck mb-3 text-center">
                    @forelse ($third_row as $game)
                    @include('partials.homepage.card', ['game' => $game])
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

    </section>
</section>

@endsection