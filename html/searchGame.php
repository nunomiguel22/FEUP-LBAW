<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Game Shop</title>

    <!-- Bootstrap and dependencies -->
    <script src="./bootstrap/jquery-3.3.1.slim.min.js"></script>
    <script src="./bootstrap/popper.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="./css/all.min.css">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <!-- HEADER AREA -->

    <!-- Navbar -->
    <?php
        include_once 'navbar.php';
    ?>

    <!-- Breadcrumbs -->
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Search Page</li>
      </ol>
    </div>

    <!-- HEADER AREA -->

    <!-- MAIN AREA -->

    <!--Search filters and criteria-->

    <form class="container search-criteria align-middle" style = "margin-left:6.5em">

      <div class = "form-row">
        <div class = "game-name col-md-5" style = "padding-left:1em">
          <h5 class = "criteria-text">Name: </h5>
          <input class = "form-control" type = "text" style = "width:85%"> 
        </div>
        

        <div class = "game-category col-md-2">
          <h5 class = "criteria-text">Category: </h5>
          <select name = "Category" class = "form-control" style = "width:80%">
            <option value = "any">Any</option>
            <option value = "adventure">Adventure</option>
            <option value = "action">Action</option>
            <option value = "casual">Casual</option>
            <option value = "hacknslash">Hack-and-slash</option>
            <option value = "indie">Indie</option>
            <option value = "multiplayer">Multiplayer</option>
            <option value = "openWorld">Open world</option>
            <option value = "racing">Racing</option>
            <option value = "rpg">RPG</option>
            <option value = "shooter">Shooter</option>
            <option value = "simulation">Simulation</option>
            <option value = "sports">Sports</option>
            <option value = "stealth">Stealth</option>    
            <option value = "strategy">Strategy</option>            
          </select>
        </div>  
  
        <div class = "sort-by col-md-2">
          <h5 class = "criteria-text">Sort by: </h5>
          <select name = "SortBy" class = "form-control" style = "width:80%">
            <option value = "popularity">Popularity</option>
            <option value = "newReleases">New Releases</option>
            <option value = "topRated">Top Rated</option>
          </select>
        </div>  

        <div class = "price col-md-2">
          <h5 class = "criteria-text">Price: </h5>
          <select name = "Price" class = "form-control" style = "width:80%">
            <option value = "any">Any</option>
            <option value = "<=50">50€ or less</option>
            <option value = "<=30">30€ or less</option>
            <option value = "<=20">20€ or less</option>
            <option value = "<=10">10€ or less</option>
            <option value = "<=5">5€ or less</option>
            <option value = "free">Free</option>
          </select>
        </div>  

        <div class="col-md-1">
          <button type="button" class="btn btn-success search-button">Search</button>
        </div>

      </div>

    </form>

    <!-- Game list -->
    <div class = "container game-list" style = "padding-bottom:3em">
      <div class="row row-cols-1 row-cols-md-3">

        <div class="col mb-4">
          <div class="card h-100">
            <img src="/img/carousel/CP2077.jpg" class="card-img-top" alt="Cyberpunk">
            <div class="card-body">
              <div class = "row card-main-info">
                <h4 class="card-title col-sm-9">Cyberpunk 2077</h4>
                <h5 class="card-text">59.99€</h5>
              </div>

              <div class = "row card-secondary-info">
                <h5 class = "card-text col-sm-9">CD Projekt Red</h5>
                <a href="#" class = "stretched-link">See page</a>
              </div>

              <h5 class="d-inline card-text card-categories">Categories:</h5>
              <div class="d-inline-flex category-box">Open world</div>
              <div class="d-inline-flex category-box">RPG</div>
              <div class="d-inline-flex category-box">Action</div>
            </div>
          </div>
        </div>

        <div class="col mb-4">
          <div class="card h-100">
            <img src="/img/carousel/Outriders.jpg" class="card-img-top" alt="Outriders">
            <div class="card-body">
              <div class = "row card-main-info">
                <h4 class="card-title col-sm-9">Outriders</h4>
                <h5 class="card-text">40.00€</h5>
              </div>

              <div class = "row card-secondary-info">
                <h5 class = "card-text col-sm-9">People Can Fly</h5>
                <a href="#" class = "stretched-link">See page</a>
              </div>

              <h5 class="d-inline card-text card-categories">Categories:</h5>
              <div class="d-inline-flex category-box">RPG</div>
              <div class="d-inline-flex category-box">Action</div>
              <div class="d-inline-flex category-box">Shooter</div>
              <div class="d-inline-flex category-box">Multiplayer</div>
            </div>
          </div>
        </div>

        <div class="col mb-4">
          <div class="card h-100">
            <img src="/img/carousel/h3.jpg" class="card-img-top" alt="Hitman 3">
            <div class="card-body">
              <div class = "row card-main-info">
                <h4 class="card-title col-sm-9">Hitman 3</h4>
                <h5 class="card-text">30.00€</h5>
              </div>

              <div class = "row card-secondary-info">
                <h5 class = "card-text col-sm-9">IO Interactive</h5>
                <a href="#" class = "stretched-link">See page</a>
              </div>

              <h5 class="d-inline card-text card-categories">Categories:</h5>
              <div class="d-inline-flex category-box">Stealth</div>
              <div class="d-inline-flex category-box">Action</div>
            </div>
          </div>
        </div>

        <div class="col mb-4">
          <div class="card h-100">
            <img src="/img/carousel/GTAV.jpg" class="card-img-top" alt="GTA V">
            <div class="card-body">
              <div class = "row card-main-info">
                <h4 class="card-title col-sm-9">Grand Theft Auto V</h4>
                <h5 class="card-text">20.99€</h5>
              </div>

              <div class = "row card-secondary-info">
                <h5 class = "card-text col-sm-9">Rockstar Games</h5>
                <a href="#" class = "stretched-link">See page</a>
              </div>

              <h5 class = "d-inline card-text card-categories">Categories:</h5>
              <div class="d-inline-flex category-box">Open world</div>
              <div class="d-inline-flex category-box">Action</div>
            </div>
          </div>
        </div>

        <div class="col mb-4">
          <div class="card h-100">
            <img src="/img/carousel/CSGO.jpg" class="card-img-top" alt="CSGO">
            <div class="card-body">
              <div class = "row card-main-info">
                <h4 class="card-title col-sm-9">Counter Strike: Global Offensive</h4>
                <h5 class="card-text">40.00€</h5>
              </div>

              <div class = "row card-secondary-info">
                <h5 class = "card-text col-sm-9">Valve</h5>
                <a href="#" class = "stretched-link">See page</a>
              </div>

              <h5 class = "d-inline card-text card-categories">Categories:</h5>
              <div class="d-inline-flex category-box">Shooter</div>
              <div class="d-inline-flex category-box">Multiplayer</div>
              <div class="d-inline-flex category-box">Action</div>
            </div>
          </div>
        </div>

        <div class="col mb-4">
          <div class="card h-100">
          <img src="/img/carousel/Control.jpg" class="card-img-top" alt="Control">
            <div class="card-body">
              <div class = "row card-main-info">
                <h4 class="card-title col-sm-9">Control</h4>
                <h5 class="card-text">29.99€</h5>
              </div>

              <div class = "row card-secondary-info">
                <h5 class = "card-text col-sm-9">505 Games</h5>
                <a href="#" class = "stretched-link">See page</a>
              </div>

              <h5 class = "d-inline card-text card-categories">Categories:</h5>
              <div class="d-inline-flex category-box">Adventure</div>
              <div class="d-inline-flex category-box">Shooter</div>
              <div class="d-inline-flex category-box">Action</div>
            </div>
          </div>
        </div>

        <div class="col mb-4">
          <div class="card h-100">
            <img src="/img/carousel/GR.jpg" class="card-img-top" alt="Ghostrunner">
            <div class="card-body">
              <div class = "row card-main-info">
                <h4 class="card-title col-sm-9">Ghostrunner</h4>
                <h5 class="card-text">29.99€</h5>
              </div>

              <div class = "row card-secondary-info">
                <h5 class = "card-text col-sm-9">One More Level</h5>
                <a href="#" class = "stretched-link">See page</a>
              </div>

              <h5 class = "d-inline card-text card-categories">Categories:</h5>
              <div class="d-inline-flex category-box">Action</div>
              <div class="d-inline-flex category-box">Hack-and-Slash</div>
            </div>
          </div>
        </div>

        <div class="col mb-4">
          <div class="card h-100">
            <img src="/img/carousel/BL3.jpg" class="card-img-top" alt="Borderlands 3">
            <div class="card-body">
              <div class = "row card-main-info">
                <h4 class="card-title col-sm-9">Borderlands 3</h4>
                <h5 class="card-text">59.99€</h5>
              </div>

              <div class = "row card-secondary-info">
                <h5 class = "card-text col-sm-9">Gearbox Software</h5>
                <a href="#" class = "stretched-link">See page</a>
              </div>

              <h5 class = "d-inline card-text card-categories">Categories:</h5>
              <div class="d-inline-flex category-box">Action</div>
              <div class="d-inline-flex category-box">Shooter</div>
              <div class="d-inline-flex category-box">RPG</div>
              <div class="d-inline-flex category-box">Multiplayer</div>
            </div>
          </div>
        </div>

        <div class="col mb-4">
          <div class="card h-100">
            <img src="/img/carousel/MW3.jpg" class="card-img-top" alt="COD:MW3">
            <div class="card-body">
              <div class = "row card-main-info">
                <h4 class="card-title col-sm-9">Call of Duty: Modern Warfare 3</h4>
                <h5 class="card-text">39.99€</h5>
              </div>

              <div class = "row card-secondary-info">
                <h5 class = "card-text col-sm-9">Infinity Ward</h5>
                <a href="#" class = "stretched-link">See page</a>
              </div>

              <h5 class = "d-inline card-text card-categories">Categories:</h5>
              <div class="d-inline-flex category-box">Action</div>
              <div class="d-inline-flex category-box">Shooter</div>
              <div class="d-inline-flex category-box">Multiplayer</div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Next page and previous page buttons -->

    <div class="container">
      <div class="row justify-content-between pb-4">
        <button type="button" class="btn btn-success rounded-pill col-sm-2">< Previous Page</button>
        <button type="button" class="btn btn-success rounded-pill col-sm-2">Next Page ></button>
      </div>
    </div>

    <!-- MAIN AREA -->

    <!-- FOOTER -->
    <?php
        include_once 'footer.php';
    ?>
    <!-- FOOTER -->
</body>

</html>
