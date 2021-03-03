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

  <!-- Navbar -->
  <?php
    include_once 'navbar.php';
  ?>

  <!-- Breadcrumbs -->
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="/index.php"> Home </a></li>
    </ol>
  </div>

  <!-- footer -->
  <?php
    include_once 'footer.php';
  ?>

</body>

</html>