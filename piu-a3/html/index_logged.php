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
            <li class="breadcrumb-item active"> Home </a></li>
        </ol>
    </div>

    <!-- HEADER AREA -->

    <!-- MAIN AREA -->

    <!-- Carousel -->
    <div class="container">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active shadow-box-dark"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="/product_page.php">
                        <img src="/img/carousel/CP2077.jpg" class="d-block w-100" alt="Cyberpunk2077">
                    </a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-shadow">Cyberpunk 2077</h5>
                        <p class="text-shadow">Starting at 59.99€.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <a href="#">
                        <img src="/img/carousel/GR.jpg" class="d-block w-100" alt="Ghostrunner">
                    </a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-shadow">Ghostrunner</h5>
                        <p class="text-shadow">Starting at 29.99€.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <a href="#">
                        <img src="/img/carousel/h3.jpg" class="d-block w-100" alt="Hitman 3">
                    </a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-shadow">Hitman 3</h5>
                        <p class="text-shadow">Starting at 30.00€.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon shadow-lg" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!-- Game Nav Divider -->
    <div class="container" style="padding-top:80px;">
        <div class="row">
            <div class="col">
                <hr style="background:white;">
            </div>
            <span><i class="fas fa-book-open"></i> Browse Catalogs</span>
            <div class="col">
                <hr style="background:white;">
            </div>
        </div>
    </div>

    <!-- Game Nav -->
    <div class="container">
        <ul class="nav nav-tabs" id="HomeNav" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Top Sellers</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                    aria-controls="profile" aria-selected="false">Action</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                    aria-controls="contact" aria-selected="false">Adventure</a>
            </li>
        </ul>
        <div class="tab-content" id="HomeNavContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <!-- Game Nav Card Deck -->
                <div class="card-deck mb-3 text-center">

                    <!-- Card -->
                    <div class="card mb-2 mt-2 hover-darken">
                        <!-- Image -->
                        <img src="/img/carousel/CP2077.jpg" class="card-img-top" alt="Cyberpunk">
                        <!-- Wishlist Indicator -->
                        <a class="wishlist-indicator fade-in text-shadow" data-toggle="tooltip" data-placement="left"
                            title="Add to Wishlist" href="asd.php"><i class="fas fa-plus-circle"></i></a>
                        <!-- Wishlist Card Body -->
                        <div class="row mt-2">
                            <span class="col-7 HomeNav-GameTitle">Cyberpunk 2077</span>
                            <span class="col-4 HomeNav-price text-right mr-3">59.99€</span>
                        </div>
                        <div class="row">
                            <span class="col-7 HomeNav-devInfo">CD Projekt Red</span>

                        </div>
                        <a href="/product_page_logged.php" class="btn btn-secondary hidden-opacity stretched-link"></a>
                    </div>


                    <!-- Card -->
                    <div class="card mb-2 mt-2 hover-darken">
                        <!-- Image -->
                        <img src="/img/carousel/Outriders.jpg" class="card-img-top" alt="Cyberpunk">
                        <!-- Wishlist Indicator -->
                        <a class="wishlist-indicator fade-in text-shadow" data-toggle="tooltip" data-placement="left"
                            title="Add to Wishlist" href="asd.php"><i class="fas fa-check-circle"></i></a>
                        <!-- Wishlist Card Body -->
                        <div class="row mt-2">
                            <span class="col-7 HomeNav-GameTitle">Outriders</span>
                            <span class="col-4 HomeNav-price text-right mr-3">40.00€</span>
                        </div>
                        <div class="row">
                            <span class="col-7 HomeNav-devInfo">People Can Fly</span>

                        </div>
                        <a href="/product_page_logged.php" class="btn btn-secondary hidden-opacity stretched-link"></a>
                    </div>

                    <!-- Card -->
                    <div class="card mb-2 mt-2 hover-darken">
                        <!-- Image -->
                        <img src="/img/carousel/h3.jpg" class="card-img-top" alt="Cyberpunk">
                        <!-- Wishlist Indicator -->
                        <a class="wishlist-indicator fade-in text-shadow" data-toggle="tooltip" data-placement="left"
                            title="Add to Wishlist" href="asd.php"><i class="fas fa-plus-circle"></i></a>
                        <!-- Wishlist Card Body -->
                        <div class="row mt-2">
                            <span class="col-7 HomeNav-GameTitle">Hitman 3</span>
                            <span class="col-4 HomeNav-price text-right mr-3">30.00€</span>
                        </div>
                        <div class="row">
                            <span class="col-7 HomeNav-devInfo">IO Interactive</span>

                        </div>
                        <a href="/product_page_logged.php" class="btn btn-secondary hidden-opacity stretched-link"></a>
                    </div>

                </div>

                <!-- Game Nav Card Deck -->
                <div class="card-deck mb-3 text-center">

                    <!-- Card -->
                    <div class="card mb-2 mt-2 hover-darken">
                        <!-- Image -->
                        <img src="/img/carousel/GTAV.jpg" class="card-img-top" alt="Cyberpunk">
                        <!-- Wishlist Indicator -->
                        <a class="wishlist-indicator fade-in text-shadow" data-toggle="tooltip" data-placement="left"
                            title="Add to Wishlist" href="asd.php"><i class="fas fa-plus-circle"></i></a>
                        <!-- Wishlist Card Body -->
                        <div class="row mt-2">
                            <span class="col-7 HomeNav-GameTitle">GTA V</span>
                            <span class="col-4 HomeNav-price text-right mr-3">20.99€</span>
                        </div>
                        <div class="row">
                            <span class="col-7 HomeNav-devInfo">Rockstar North</span>

                        </div>
                        <a href="/product_page_logged.php" class="btn btn-secondary hidden-opacity stretched-link"></a>
                    </div>

                    <!-- Card -->
                    <div class="card mb-2 mt-2 hover-darken">
                        <!-- Image -->
                        <img src="/img/carousel/CSGO.jpg" class="card-img-top" alt="Cyberpunk">
                        <!-- Wishlist Indicator -->
                        <a class="wishlist-indicator fade-in text-shadow" data-toggle="tooltip" data-placement="left"
                            title="Add to Wishlist" href="asd.php"><i class="fas fa-plus-circle"></i></a>
                        <!-- Wishlist Card Body -->
                        <div class="row mt-2">
                            <span class="col-7 HomeNav-GameTitle">Counter-Strike: Global Offensive</span>
                            <span class="col-4 HomeNav-price text-right mr-3">40.00€</span>
                        </div>
                        <div class="row">
                            <span class="col-7 HomeNav-devInfo">Valve</span>

                        </div>
                        <a href="/product_page_logged.php" class="btn btn-secondary hidden-opacity stretched-link"></a>
                    </div>

                    <!-- Card -->
                    <div class="card mb-2 mt-2 hover-darken">
                        <!-- Image -->
                        <img src="/img/carousel/Control.jpg" class="card-img-top" alt="Cyberpunk">
                        <!-- Wishlist Indicator -->
                        <a class="wishlist-indicator fade-in text-shadow" data-toggle="tooltip" data-placement="left"
                            title="Add to Wishlist" href="asd.php"><i class="fas fa-plus-circle"></i></a>
                        <!-- Wishlist Card Body -->
                        <div class="row mt-2">
                            <span class="col-7 HomeNav-GameTitle" align="center">Control</span>
                            <span class="col-4 HomeNav-price text-right mr-3">29.99€</span>
                        </div>
                        <div class="row">
                            <span class="col-7 HomeNav-devInfo">505 Games</span>

                        </div>
                        <a href="/product_page_logged.php" class="btn btn-secondary hidden-opacity stretched-link"></a>
                    </div>
                </div>

                <!-- Game Nav Card Deck -->
                <div class="card-deck mb-3 text-center">

                    <!-- Card -->
                    <div class="card mb-2 mt-2 hover-darken">
                        <!-- Image -->
                        <img src="/img/carousel/GR.jpg" class="card-img-top" alt="Cyberpunk">
                        <!-- Wishlist Indicator -->
                        <a class="wishlist-indicator fade-in text-shadow" data-toggle="tooltip" data-placement="left"
                            title="Add to Wishlist" href="asd.php"><i class="fas fa-plus-circle"></i></a>
                        <!-- Wishlist Card Body -->
                        <div class="row mt-2">
                            <span class="col-7 HomeNav-GameTitle">Ghostrunner</span>
                            <span class="col-4 HomeNav-price text-right mr-3">29.99€</span>
                        </div>
                        <div class="row">
                            <span class="col-7 HomeNav-devInfo">One More Level</span>

                        </div>
                        <a href="/product_page_logged.php" class="btn btn-secondary hidden-opacity stretched-link"></a>
                    </div>

                    <!-- Card -->
                    <div class="card mb-2 mt-2 hover-darken">
                        <!-- Image -->
                        <img src="/img/carousel/BL3.jpg" class="card-img-top" alt="Cyberpunk">
                        <!-- Wishlist Indicator -->
                        <a class="wishlist-indicator fade-in text-shadow" data-toggle="tooltip" data-placement="left"
                            title="Add to Wishlist" href="asd.php"><i class="fas fa-plus-circle"></i></a>
                        <!-- Wishlist Card Body -->
                        <div class="row mt-2">
                            <span class="col-7 HomeNav-GameTitle">Borderlands 3</span>
                            <span class="col-4 HomeNav-price text-right mr-3">59.99€</span>
                        </div>
                        <div class="row">
                            <span class="col-7 HomeNav-devInfo">Gearbox Software</span>

                        </div>
                        <a href="/product_page_logged.php" class="btn btn-secondary hidden-opacity stretched-link"></a>
                    </div>

                    <!-- Card -->
                    <div class="card mb-2 mt-2 hover-darken">
                        <!-- Image -->
                        <img src="/img/carousel/MW3.jpg" class="card-img-top" alt="Cyberpunk">
                        <!-- Wishlist Indicator -->
                        <a class="wishlist-indicator fade-in text-shadow" data-toggle="tooltip" data-placement="left"
                            title="Add to Wishlist" href="asd.php"><i class="fas fa-plus-circle"></i></a>
                        <!-- Wishlist Card Body -->
                        <div class="row mt-2">
                            <span class="col-7 HomeNav-GameTitle">Call of Duty: Modern Warfare 3</span>
                            <span class="col-4 HomeNav-price text-right mr-3">39.99€</span>
                        </div>
                        <div class="row">
                            <span class="col-7 HomeNav-devInfo">Infinity Ward</span>

                        </div>
                        <a href="/product_page_logged.php" class="btn btn-secondary hidden-opacity stretched-link"></a>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                Soon Tm
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                Soon Tm
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

</html>