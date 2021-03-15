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
      <li class="breadcrumb-item active" aria-current="page"> Cart </li>
    </ol>
  </div>


  <!-- HEADER AREA -->

  <!-- MAIN AREA -->

  <div class="container" style="padding-top:30px;">

    <div class="row bg-dark b-shadow my-1">
      <div class=" col-md-2"><img src="/img/carousel/CP2077.jpg" class="ml-0 mt-1"
          style="max-width:96px;max-height:54px;">
      </div>
      <div class="col-5 m-auto">
        <div class="row">
          Cyberpunk 2077
        </div>
        <div class="row"><span class="HomeNav-devInfo">CD Projekt Red</span></div>

      </div>


      <div class="col-md-2 my-auto" align="right">59.99€</div>
      <button class="btn btn-secondary col-md-1" role="button">
        <i class="far fa-trash-alt"></i>
      </button>
    </div>

    <div class="row bg-dark b-shadow my-1">
      <div class=" col-md-2"><img src="/img/carousel/H3.jpg" class="ml-0 mt-1" style="max-width:96px;max-height:54px;">
      </div>
      <div class="col-5 m-auto">
        <div class="row">
          Hitman 3
        </div>
        <div class="row"><span class="HomeNav-devInfo">CD Projekt Red</span></div>

      </div>


      <div class="col-md-2 my-auto" align="right">30.00€</div>
      <button class="btn btn-secondary col-md-1" role="button">
        <i class="far fa-trash-alt"></i>
      </button>
    </div>

    <div class="row bg-dark b-shadow my-1">
      <div class=" col-md-2"></div>
      <div class="col-5 m-auto">
        <div class="row my-3">
          <h5>Total</h5>
        </div>


      </div>


      <div class="col-md-2 my-auto" align="right">
        <h5>89.99€</h5>
      </div>
      <button class="btn btn-secondary col-md-1" role="button">
        <i class="far fa-trash-alt"></i>
      </button>
    </div>





    <hr style="background:white;">


    <div class="row">

      <button class="btn btn-lg col-2 col-sm-4 btn-danger mr-3 mb-3" href="/index.php" role="button">
        <i class="fas fa-trash"></i> Remove all
      </button>


      <button class="btn btn-lg btn-success col-2 col-sm-4 mb-3" href="/index.php" role="button">
        <i class="fas fa-shopping-cart"></i> Checkout

    </div>

  </div>

  <!-- MAIN AREA -->

  <!-- FOOTER -->
  <?php
    include_once 'footer.php';
  ?>
  <!-- FOOTER -->
</body>