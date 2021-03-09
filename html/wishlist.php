<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Game Shop</title>

  <!-- Bootstrap and dependencies -->
  <script src="/bootstrap/jquery-3.3.1.slim.min.js"></script>
  <script src="/bootstrap/popper.min.js"></script>
  <script src="/bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">

  <!-- FontAwesome -->
  <link rel="stylesheet" href="/fontawesome/css/all.min.css">

  <!-- Stylesheet -->
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <!-- HEADER AREA -->

  <!-- Navbar -->
  <?php
    include_once 'navbar_logged.php';
  ?>

  <!-- Breadcrumbs -->
  <!-- Breadcrumbs -->
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="/index.php"> Home </a></li>
      <li class="breadcrumb-item active" aria-current="page"> Wishlist </li>
    </ol>
  </div>


  <!-- HEADER AREA -->

  <!-- MAIN AREA -->

  <div class="container" style="padding-top:30px;">
    <div class = "row">
      <h3>Whishlist</h3>
    </div>
    <div class="card mt-2 mb-2">
      <div class="row no-gutters">
        <div class="col-md-3">
          <a href="/product_page.php" class="text-white">
            <img src="/img/carousel/Outriders.jpg" widht="75" height="75" alt="Outriders">
          </a>
        </div>
        <div class="card-body col-md-8">
          <a href="/product_page.php" class="text-white">
            <h5 class="card-title">Outriders</h5>
            <p class="card-text">40.00€</p>
          </a>
        </div>

        <button class="btn btn-secondary col-md-1" role="button">
          <i class="far fa-trash-alt"></i>
        </button>
      </div>
    </div>

    <div class="card mt-2 mb-2">
      <div class="row no-gutters">
        <div class="col-md-3">
          <a href="/product_page.php" class="text-white">
          <img src="/img/carousel/GR.jpg" widht="75" height="75" alt="Ghostrunner">
          </a>
        </div>
        <div class="card-body col-md-8">
          <a href="/product_page.php" class="text-white">
            <h5 class="card-title">Ghostrunner</h5>
            <p class="card-text">29.99€</p>
          </a>
        </div>

        <button class="btn btn-secondary col-md-1" role="button">
          <i class="far fa-trash-alt"></i>
        </button>
      </div>
    </div>

    <div class="card mt-2 mb-2">
      <div class="row no-gutters">
        <div class="col-md-3">
          <a href="/product_page.php" class="text-white">
          <img src="/img/carousel/GTAV.jpg" widht="75" height="75" alt="GTA V">
          </a>
        </div>
        <div class="card-body col-md-8">
          <a href="/product_page.php" class="text-white">
            <h5 class="card-title">Grand Theft Auto V</h5>
            <p class="card-text">20.99€</p>
          </a>
        </div>

        <button class="btn btn-secondary col-md-1" role="button">
          <i class="far fa-trash-alt"></i>
        </button>
      </div>
    </div>

    <hr style="background:white;">

    <div class="container">
      <div class="row" style="padding-top:50px; padding-bottom:25px;">

        <div class="col-2 align-self-end" align="right">
          <button class="btn btn-lg btn-secondary" href="/index.php" role="button">
            <i class="fas fa-arrow-left"></i> Back to store
          </button>
        </div>

        <div class="col-2 align-self-end" align="right">
          <button class="btn btn-lg btn-secondary" href="/index.php" role="button">
            <i class="fas fa-trash"></i> Remove all
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- MAIN AREA -->

  <!-- FOOTER -->
  <?php
    include_once 'footer.php';
  ?>
  <!-- FOOTER -->
</body>
