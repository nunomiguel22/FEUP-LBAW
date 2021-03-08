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
        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
      </ol>
    </div>

    <!-- HEADER AREA -->

    <!-- MAIN AREA -->

    <!--Title-->

    <div class="container pb-3">
      <h3 class="font-weight-bold">Wishlist</h3>
    </div>

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

      </div>
    </div>

    <!-- Next page and previous page buttons -->

    <!-- While this wouldn't appear with this few games in the wishlist, it's still a functionality in it-->

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
