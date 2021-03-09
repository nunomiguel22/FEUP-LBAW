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

    <!-- FontAwesome -->
    <link rel="stylesheet" href="./css/all.min.css">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="./css/style.css">
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
            <li class="breadcrumb-item"> <a href="/index.php"> Home </a></li>
            <li class="breadcrumb-item active" aria-current="page"> Profile </li>
        </ol>
    </div>
    <!-- HEADER AREA -->

    <!-- MAIN AREA -->
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mb-3">
                    <h3 class="card-header"><i class="fas fa-user"></i>The_User Profile</h3>
                    <img src="/img/logo/instagram_profile_image.png" class="align-self-start mr-3" width="150" height="150" alt="...">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">
                                    <b>Name</b>
                                </label>
                                <p>The User</p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">
                                    <b>E-Mail</b>
                                </label>
                                <p>theUSerEmail@gmail.com</p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">
                                    <b>Description</b>
                                </label>
                                <p>Unavailable</p>
                            </div>
                        </li>

                    </ul>
                    <div class="card-footer text-muted">
                        2 days ago
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="padding-top:30px;">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Games Owned</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Games Owned List</h6>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="card">
                                    <div class="row no-gutters">
                                        <div class="col-md-3">
                                            <img src="/img/CP2077.jpg" widht="75" height="75" alt="...">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <h5 class="card-title">Cyberpunk 2077</h5>
                                                <p class="card-text">Bought</p>
                                            </div>
                                        </div>
                                        <div class="col mt-3 ml-5">
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="card">
                                    <div class="row no-gutters">
                                        <div class="col-md-3">
                                            <img src="/img/hitman.jpg" widht="75" height="75" alt="...">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <h5 class="card-title">Hitman 3</h5>
                                                <p class="card-text">Bought</p>
                                            </div>
                                        </div>
                                        <div class="col mt-3 ml-5">
                                        </div>
                                    </div>
                                </div>
                            </a><a href="#" class="list-group-item list-group-item-action">
                                <div class="card">
                                    <div class="row no-gutters">
                                        <div class="col-md-3">
                                            <img src="/img/carousel/Outriders.jpg"  widht="75" height="75" alt="...">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <h5 class="card-title">Outriders</h5>
                                                <p class="card-text">Bought</p>
                                            </div>
                                        </div>
                                        <div class="col mt-3 ml-5">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="padding-top:30px;">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Most Played</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Most Played List</h6>
                        <a href="#" class="list-group-item list-group-item-action">
                                <div class="card">
                                    <div class="row no-gutters">
                                        <div class="col-md-3">
                                            <img src="/img/CP2077.jpg" widht="75" height="75" alt="...">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <h5 class="card-title">Cyberpunk 2077</h5>
                                                <p class="card-text">Bought</p>
                                            </div>
                                        </div>
                                        <div class="col mt-3 ml-5">
                                        54 hours
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="card">
                                    <div class="row no-gutters">
                                        <div class="col-md-3">
                                            <img src="/img/hitman.jpg" widht="75" height="75" alt="...">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <h5 class="card-title">Hitman 3</h5>
                                                <p class="card-text">Bought</p>
                                            </div>
                                        </div>
                                        <div class="col mt-3 ml-5">
                                        33 hours
                                        </div>
                                    </div>
                                </div>
                            </a><a href="#" class="list-group-item list-group-item-action">
                                <div class="card">
                                    <div class="row no-gutters">
                                        <div class="col-md-3">
                                            <img src="/img/carousel/Outriders.jpg"  widht="75" height="75" alt="...">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <h5 class="card-title">Outriders</h5>
                                                <p class="card-text">Bought</p>
                                            </div>
                                        </div>
                                        <div class="col mt-3 ml-5">
                                        20 hours
                                        </div>
                                    </div>
                                </div>
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="padding-top:80px;">
    </div>



    <!-- MAIN AREA -->

    <!-- FOOTER -->
    <?php
    include_once 'footer.php';
    ?>
    <!-- FOOTER -->
</body>