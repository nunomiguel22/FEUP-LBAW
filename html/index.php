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
      <li class="breadcrumb-item active"> <a href="/index.php"> Home </a></li>
    </ol>
  </div>

  <!-- HEADER AREA -->

  <!-- MAIN AREA -->

  <!-- Carousel -->
  <div class="container">
    <div id="carousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/img/carousel/CP2077.jpg" class="d-block w-100" alt="Cyberpunk2077">
          <div class="carousel-caption d-none d-md-block">
            <h5>Cyberpunk 2077</h5>
            <p>Starting at 59.99€.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/img/carousel/Outriders.jpg" class="d-block w-100" alt="Outriders">
          <div class="carousel-caption d-none d-md-block">
            <h5>Outsiders</h5>
            <p>Starting at 40.00€.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/img/carousel/h3.jpg" class="d-block w-100" alt="Hitman 3">
          <div class="carousel-caption d-none d-md-block">
            <h5>Hitman 3</h5>
            <p>Starting at 30.00€.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <br><br>

  <!-- MAIN AREA -->

  <!-- FOOTER -->
  <?php
    include_once 'footer.php';
  ?>
  <!-- FOOTER -->
</body>

</html>