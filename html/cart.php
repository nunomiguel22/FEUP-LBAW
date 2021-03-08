<!DOCTYPE html>         
<html>


<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Page Game Shop</title>

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

   <?php
    include_once 'navbar_logged.php';
  ?>

  <!-- Breadcrumbs -->
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="/index.php"> Home </a></li>
      <li class="breadcrumb-item active" aria-current="page"> Cart </li>
    </ol>
  </div>

  <!-- header Area -->
    <div class="container">
    <div class="card">
      <div class="row no-gutters">
        <div class="col-md-3" >
          <img src="/img/CP2077.jpg" widht="75" height="75" alt="...">
        </div>
        <div class="col-md-6">
          <div class="card-body">
            <h5 class="card-title">Cyberpunk 2077</h5>
            <p class="card-text">59.99€</p>
          </div>
        </div>
        <div class="col-md-3">
            <button class="btn btn-secondary" role="button">
                <i class="far fa-trash-alt"></i>
            </button>
        </div>
      </div>
    </div>


    <div class="card">
      <div class="row no-gutters">
        <div class="col-md-3" >
          <img src="/img/hitman.jpg" widht="75" height="75" alt="...">
        </div>
        <div class="col-md-6">
          <div class="card-body">
            <h5 class="card-title">Hitman 3</h5>
            <p class="card-text">30.00€</p>
          </div>
        </div>
        <div class="col-md-3">
            <button class="btn btn-secondary" role="button">
                <i class="far fa-trash-alt"></i>
            </button>
        </div>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="row" style="padding-top:25px; padding-bottom:25px;">
        <div class="col-3">
          <button class="btn btn-secondary" href="/index.php" role="button">
          Keep looking
          </button>
        </div>
        <div class="col-6">
          <p>Total price: 89.99€</p>
        </div>
        <div class="col-3">
          <button class="btn btn-secondary" href="/index.php" role="button">
          Finish buy
          </button>
        </div>
    </div>
  </div>




  <!-- FOOTER -->
   <?php
    include_once 'footer.php';
  ?>
  <!-- FOOTER -->


</body>


</html>