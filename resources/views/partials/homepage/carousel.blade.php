<section id="carousel" class="carousel slide mt-4" data-ride="carousel">
    <aside>
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active shadow-box-dark"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
    </aside>
    <article class="carousel-inner">
        <div class="carousel-item active">
            <a href="{{ url('/products/'.$title_game->id) }}">
                <img src="{{ $title_game->cover_image() }}" class="d-block w-100" alt="''.$title_game->title">
            </a>
            <div class="carousel-caption d-none d-md-block">
                <h5 class="text-outline-dark">{{ $title_game->title }}</h5>
                <p class="text-outline-dark">Starting at {{ $title_game->price }}€.</p>
            </div>
        </div>
        @foreach ($carousel_games as $game)
        <div class="carousel-item">
            <a href="{{ url('/products/'.$game->id) }}">
                <img src="{{ $game->cover_image() }}" class="d-block w-100" alt="''.$game->title">
            </a>
            <div class="carousel-caption d-none d-md-block">
                <h5 class="text-outline-dark">{{ $game->title }}</h5>
                <p class="text-outline-dark">Starting at {{ $game->price }}€.</p>
            </div>
        </div>
        @endforeach
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon shadow-lg" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </article>
</section>