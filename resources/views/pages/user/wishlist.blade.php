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

<div class="container mt-4 px-0">
    <h4 class="text-shadow pb-1">Wishlist</h4>
    <p class="text-muted">View the games on your wishlist</p>
    @php
    $checkout_enabled = true;
    @endphp
    @forelse($wishlist_games as $game)
    <div class="row bg-secondary b-shadow my-1 px-2">

        <div class="col-2 d-none d-lg-block">
            <a href="{{url('/products/'.$game->id)}}">
                <img src="{{$game->cover_image()}}" style="max-width:96px;max-height:54px;">
            </a>
        </div>

        <div class="col-8 m-auto">
            <div class="row">
                {{$game->title}}
            </div>
        <div class="row"><span class="HomeNav-devInfo">{{$game->price}}€</span></div>

        <form class="col-2 my-auto " method="POST" action="/products/{{$game->id}}/cart">
            @csrf
            @method('DELETE')
            <button class="w-100 btn btn-danger mb-2" style="min-height:44px;" type="submit" role="button">
                <i class="fas fa-trash"></i>
            </button>
        </form>
    </div>

    </div>

    @empty
    <div class="row text-muted ml-1 bg-transparent p-2">
        You have no games in your cart yet
    </div>

    @endforelse
</div>