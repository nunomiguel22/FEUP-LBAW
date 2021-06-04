@extends('layouts.app')

@section('title', 'OGS')

@section('scripts')
<script src="{{ asset('js/wishlist_indicators.js') }}" defer></script>
@endsection

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
                    <a class="nav-link active" id="{{str_replace(' ', '', $first_category->name) }}-tab"
                        data-toggle="tab" href="#{{str_replace(' ', '', $first_category->name) }}" role="tab"
                        aria-controls="{{str_replace(' ', '', $first_category->name) }}"
                        aria-selected="true">{{$first_category->name}}</a>
                </li>

                @forelse($categories as $category)
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="{{str_replace(' ', '', $category->name) }}-tab" data-toggle="tab"
                        href="#{{str_replace(' ', '', $category->name) }}" role="tab"
                        aria-controls="{{str_replace(' ', '', $category->name) }}"
                        aria-selected="false">{{$category->name}}</a>
                </li>
                @empty
                @endforelse

            </ul>
        </aside>


        <div class="tab-content">
            <div class="tab-pane fade show active" id="{{str_replace(' ', '', $first_category->name) }}" role="tabpanel"
                aria-labelledby="{{$first_category->name}}-tab">
                @php
                $i = 0;
                $cat_games = $games[$first_category->id];
                @endphp

                @forelse($cat_games as $game)
                @if ($i % 3 == 0)
                <div class="card-deck mb-3 text-center">
                    @endif

                    @include('partials.homepage.card', ['game' => $game])

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

        @forelse($categories as $category)
        <div class="tab-pane fade" id="{{str_replace(' ', '', $category->name) }}" role="tabpanel"
            style="min-height:100px" aria-labelledby="{{str_replace(' ', '', $category->name) }}-tab">
            @php
            $i = 0;
            $cat_games = $games[$category->id];
            @endphp

            @forelse($cat_games as $game)
            @if ($i % 3 == 0)
            <div class="card-deck mb-3 text-center">
                @endif

                @include('partials.homepage.card', ['game' => $game])

                @if($i % 3 == 2)
            </div>
            @endif

            @php
            $i++;
            @endphp
            @empty
            <span>No games yet!</span>
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
        @empty
        @endforelse

        </div>

    </section>
</section>

@endsection