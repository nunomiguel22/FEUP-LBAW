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

     <div class="row mt-2">
        <div class="col-7">
            <span class="row HomeNav-GameTitle">{{ $purchase->game()->title }}</span>
            <span class="row HomeNav-devInfo">{{ $purchase->game()->developer->name }}</span>
        </div>
        <div class="col-4">
            <span class="row text-light small">Purchase date </span>
            <span class="row HomeNav-devInfo text-right mr-3">{{ $purchase->formattedTimestamp('d-m-Y') }}</span>
        </div>
    </div>
     <a href="{{ url('/products/'.$purchase->game()->id) }}" class="btn btn-secondary hidden-opacity stretched-link"></a>
 </article>