 <!-- Card -->
 <article class="card mb-2 mt-2 hover-darken">
     <!-- Image -->
     <figure>
         <img src="{{ $purchase->game()->cover_image() }}" class="card-img-top" alt="{{ $purchase->game()->title }}">
     </figure>

     <!-- Wishlist Indicator -->
     @if(Auth::check())
     <a class="wishlist-indicator fade-in text-shadow" data-toggle="tooltip" data-placement="left"
         title="Add to Wishlist" href="#todo"><i class="fas fa-plus-circle"></i></a>
     @else
     <a class="wishlist-indicator fade-in text-shadow" data-toggle="tooltip" data-placement="left"
         title="Add to Wishlist" href="{{ route('login') }}"><i class="fas fa-plus-circle"></i></a>
     @endif

     <div class="row">
         <div class="col-6">
             <p class="HomeNav-GameTitle my-1">{{ $purchase->game()->title }}</p>
             <p class="HomeNav-devInfo my-1">{{ $purchase->game()->developer->name }}</p>
         </div>
         <div class="col-5">
             <p class="my-1">Purchased on </p>
             <p class="HomeNav-devInfo my-1">{{ $purchase->formattedTimestamp('d-m-Y') }}</p>
         </div>
     </div>
     <a href="{{ url('/products/'.$purchase->game()->id) }}" class="btn btn-secondary hidden-opacity stretched-link">
     </a>
 </article>