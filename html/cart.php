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
      <li class="breadcrumb-item active" aria-current="page"> Your Shopping Cart </li>
    </ol>
  </div>


  <!-- HEADER AREA -->

  <!-- MAIN AREA -->

  <div class="container" style="padding-top:30px;">

    <div class="row bg-transparent b-shadow my-1 px-2">

      <div class="col-2 d-none d-lg-block">
        <a href="/product_page_logged.php">
          <img src="/img/carousel/CP2077.jpg" style="max-width:96px;max-height:54px;">
        </a>
      </div>
      <div class="col-4 m-auto">
        <div class="row">
          Cyberpunk 2077
        </div>
        <div class="row"><span class="HomeNav-devInfo">CD Projekt Red</span></div>
      </div>


      <div class="col-6 my-auto ">
        <div class="row ">
          <span class="col text-right">59.99€</span>
        </div>

        <div class="row">
          <a class="col text-right link-small text-light" href="#">Remove</a>
        </div>
      </div>
    </div>

    <div class="row bg-transparent b-shadow my-1 px-2">
      <div class="col-2 d-none d-lg-block">
        <a href="/product_page_logged.php">
          <img src="/img/carousel/H3.jpg" style="max-width:96px;max-height:54px;">
        </a>
      </div>
      <div class="col-4 m-auto">
        <div class="row">
          Hitman 3
        </div>
        <div class="row"><span class="HomeNav-devInfo">IO Interactive</span></div>

      </div>
      <div class="col-6 my-auto ">
        <div class="row ">
          <span class="col text-right">30.00€</span>
        </div>

        <div class="row">
          <a class="col text-right link-small text-light" href="#">Remove</a>
        </div>
      </div>
    </div>

    <div class="row bg-dark text-light mt-3 p-2">

      <div class="col col-sm-4 my-3">
        Estimated Total*
      </div>

      <div class="col">
        <div class="row">
          <span class="col my-3 text-right font-weight-bold">89.99€</span>
        </div>
      </div>
    </div>

    <div class="row bg-dark text-light p-2" align="right">
      <div class="col">
        <button class="btn btn-danger mb-2" href="/index.php" role="button">
          <i class="fas fa-trash"></i> Remove all
        </button>

        <button class="btn btn-success mb-2" href="/index.php" role="button">
          <i class="fas fa-shopping-cart"></i> Checkout
        </button>
      </div>
    </div>

    <span class="row text-light ml-1 my-3 small">*All prices include VAT where applicable</span>


  </div>

  <!-- MAIN AREA -->

  <!-- FOOTER -->
  <?php
    include_once 'footer.php';
  ?>
  <!-- FOOTER -->
</body>