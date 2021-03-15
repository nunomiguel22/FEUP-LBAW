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
            <li class="breadcrumb-item active"> Links</li>
        </ol>
    </div>

    <!-- HEADER AREA -->

    <!-- MAIN AREA -->

    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Links</h1>
            <hr class="my-4">
            <a class="row ml-3" href="/404.php">404</a>
            <a class="row ml-3" href="/about.php">About</a>
            <a class="row ml-3" href="/admin.php">Admin</a>
            <a class="row ml-3" href="/cart.php">Cart</a>
            <a class="row ml-3" href="/editProfile.php">Edit Profile</a>
            <a class="row ml-3" href="/history.php">History</a>
            <a class="row ml-3" href="/index_admin.php">Index (Admin)</a>
            <a class="row ml-3" href="/index_logged.php">Index (Logged in)</a>
            <a class="row ml-3" href="/index.php">Index</a>
            <a class="row ml-3" href="/product_page_admin.php">Product Page (Admin)</a>
            <a class="row ml-3" href="/product_page_logged.php">Product Page (Logged In)</a>
            <a class="row ml-3" href="/produtct_page.php">Product Page</a>
            <a class="row ml-3" href="/profile.php">Profile</a>
            <a class="row ml-3" href="/search.php">Search Page</a>
            <a class="row ml-3" href="/wishlist.php">Wishlist</a>
            <a class="btn btn-primary btn-lg row mt-3 ml-2" href="/index.php" role="button">Back to Homepage</a>
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