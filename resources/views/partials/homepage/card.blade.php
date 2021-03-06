 <!-- Card -->
 <article class="card mb-2 mt-2 hover-darken">
     <!-- Image -->
     <figure>
         <img src="{{ $game->cover_image() }}" class="card-img-top" alt="{{ $game->title }}">
     </figure>

     <!-- Wishlist Indicator -->
     @if(Auth::check())
     <a class="wishlist-indicator fade-in text-shadow" data-toggle="tooltip" data-placement="left"
         title="Add to Wishlist" href="#" onclick="return false;" game_id="{{ $game->id }}"
         in_wishlist="{{ json_encode(Auth::user()->gameInWishlist($game->id)) }}">
         @if (Auth::user()->gameInWishlist($game->id))
         <i class="fas fa-check-circle"></i>
         @else
         <i class="fas fa-plus-circle"></i>
         @endif
     </a>
     @else
     <a class="wishlist-indicator fade-in text-shadow" data-toggle="tooltip" data-placement="left"
         title="Add to Wishlist" href="{{ route('login') }}"><i class="fas fa-plus-circle"></i></a>
     @endif

     <div class="row mt-2">
         <span class="col-7 HomeNav-GameTitle">{{ $game->title }}</span>
         <span class="col-4 HomeNav-price text-right mr-3">{{ $game->price }}€</span>
     </div>
     <div class="row">
         <span class="col-7 HomeNav-devInfo">{{ $game->developer->name }}</span>

     </div>
     <a href="{{ url('/products/'.$game->id) }}" class="btn btn-secondary hidden-opacity stretched-link"></a>
 </article>