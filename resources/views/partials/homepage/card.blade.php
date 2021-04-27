 <!-- Card -->
 <div class="card mb-2 mt-2 hover-darken">
     <!-- Image -->
     <img src="{{ asset('' . $game->cover_image()) }}" class="card-img-top" alt="Cyberpunk">
     <!-- Wishlist Indicator -->
     <a class="wishlist-indicator fade-in text-shadow" data-toggle="tooltip" data-placement="left"
         title="Add to Wishlist" href="asd.php"><i class="fas fa-plus-circle"></i></a>
     <!-- Wishlist Card Body -->
     <div class="row mt-2">
         <span class="col-7 HomeNav-GameTitle">{{ $game->title }}</span>
         <span class="col-4 HomeNav-price text-right mr-3">{{ $game->price }}€</span>
     </div>
     <div class="row">
         <span class="col-7 HomeNav-devInfo">{{ $game->developer() }}</span>

     </div>
     <a href="/product_page_logged.php" class="btn btn-secondary hidden-opacity stretched-link"></a>
 </div>