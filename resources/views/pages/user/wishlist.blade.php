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
    <div class="card m-2">
        <div class="row no-gutters">

            <div class="col-md-2">
                <a href="{{url('/products/'.$game->id)}}">
                    <img src="{{$game->cover_image()}}" style="max-width:112px;max-height:63px;">
                </a>
            </div>

            <div class="col-md-9 card-body">
                <h5 class="card-title mt-1">
                    {{$game->title}}
                </h5>
                <p class="card-text"><span class="HomeNav-devInfo">{{$game->price}}€</span></p>
            </div>

            <form class="col-md-1" method="POST" action="/products/{{$game->id}}/wishlist">
                @csrf
                @method('DELETE')
                <button class="btn btn-secondary" style="height: 63px; width: 68px;" type="submit" role="button">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
    </div>

    <div class="row bg-dark text-light p-2" align="right">

        <div class="col-2 col-md-9"></div>

        <form class="col-5 col-md-3" method="POST" action="/user/wishlist">
            @csrf
            @method('DELETE')
            <button class="w-100 btn btn-danger mt-2" style="min-height:44px;" type="submit" role="button">
            <i class="fas fa-trash"></i> Remove all
            </button>
        </form>
    </div>

    @empty
    <div class="row text-muted ml-1 bg-transparent p-2">
        You have no games in your cart yet
    </div>

    @endforelse

</div>