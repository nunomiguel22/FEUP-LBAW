 <!-- Card -->
 <article class="card mb-2 mt-2 hover-darken">
     <!-- Image -->
     <figure>
         <img src="{{ $purchase->game()->cover_image() }}" class="card-img-top" alt="{{ $purchase->game()->title }}">
     </figure>

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