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
    include_once 'navbar.php';
  ?>

  <!-- Breadcrumbs -->
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active"> Home </a></li>
    </ol>
  </div>

  <!-- HEADER AREA -->

  <!-- MAIN AREA -->

  <!-- About text-->


  <div class="container" style="padding:2% 0% 5%;">
    <div class="jumbotron">
      <h1 class="display-4">About</h1>
      <p>Online Game Shop is a website where you can find various games and buy digital keys to get them. This way, you
        can manage your colection of games, browse reviews, make your own reviews of games you bought, and even gift
        games to your friends and see what games they have. You also have a wishlist of games so you can keep track of
        all the games you're interested in to buy later.</p>

      <p>This website was developed by:</p>
      <p class="mt-n3">Abel Tiago</p>
      <p class="mt-n3">João Vasconcelos</p>
      <p class="mt-n3">Nuno Gonçalves</p>
      <p class="mt-n3">Nuno Marques</p>
      <a class="btn btn-primary btn-lg" href="/index.php" role="button">Back to Homepage</a>
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