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
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="/index.php"> Home</a></li>
            <li class="breadcrumb-item active"> 404</li>
        </ol>
    </div>

    <!-- HEADER AREA -->

    <!-- MAIN AREA -->

    <div class="container" style="padding:5% 0% 10%;">
        <div class="jumbotron">
            <h1 class="display-4">404</h1>
            <p class="lead">This page is not available.</p>
            <hr class="my-4">
            <p>If there is supposed to be a page here you can report a problem below.</p>
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