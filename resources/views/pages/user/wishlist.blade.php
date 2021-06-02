@section('breadcrumbs')
<!-- Breadcrumbs -->
<nav class="container my-4">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"> <a href="{{ route('homepage') }}"> Home </a></li>
        <li class="breadcrumb-item"> <a href="{{ route('user') }}"> User panel </a></li>
        <li class="breadcrumb-item active" aria-current="page"> Wishlist </li>
    </ol>
</nav>
@endsection

<div class="container mt-4 px-0 pb-3">
    <h4 class="text-shadow pb-1">Wishlist</h4>
    <p class="text-muted">View the games on your wishlist</p>
    @php
    $checkout_enabled = true;
    @endphp
    @forelse($wishlist_games as $game)

    <a class="row no-gutters bg-secondary mt-2" href="{{url('/products/'.$game->id)}}">

        <div class="col-md-2 my-1 pl-1">
            <img src="{{$game->cover_image()}}" class="b-shadow" style="max-width:112px;max-height:63px;">
        </div>

        <div class="col-md-8 card-body">
            @if(!$game->hasAvailableKeys())
            <h6 class="card-title mt-1">
                {{$game->title}} <span class="text-danger ml-1 small"> unavailable </span>
            </h6>

            @else
            <h6 class="card-title mt-1">
                {{$game->title}}
            </h6>
            @endif

            <p class="card-text"><span class="HomeNav-devInfo">{{$game->developer->name}}</span></p>
        </div>

        <p class="col-md-1 card-body my-auto">
            {{$game->price}}€
        </p>

        <form class="col-md-1 my-auto" method="POST" action="/products/{{$game->id}}/wishlist">
            @csrf
            @method('DELETE')
            <button class="btn btn-secondary" type="submit" role="button">
                <i class="fas fa-trash"></i>
            </button>
        </form>
    </a>


    @empty
    <span class="row col text-muted bg-transparent ">
        You have no games in your cart yet
    </span>
    <a class="row justify-content-md-center" href="{{route('products')}}">
        <button class="btn btn-secondary" type="button">Browse games</button>
    </a>

    @endforelse

    @if($wishlist_games->isNotEmpty())
    <div class="row bg-dark text-light" align="right">

        <div class="col-2 col-md-9"></div>

        <form class="col-5 col-md-3 mt-3" method="POST" action="/user/wishlist">
            @csrf
            @method('DELETE')
            <button class="w-100 btn btn-danger mt-2" style="min-height:44px;" type="submit" role="button">
                <i class="fas fa-trash"></i> Remove all
            </button>
        </form>
    </div>
    @endif

</div>