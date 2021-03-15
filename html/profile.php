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
            <li class="breadcrumb-item"> <a href="/index.php"> Home </a></li>
            <li class="breadcrumb-item active" aria-current="page"> Profile </li>
        </ol>
    </div>
    <!-- HEADER AREA -->

    <!-- MAIN AREA -->
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img src="/img/logo/instagram_profile_image.png" class="align-self-start mr-3" width="150" height="150" alt="...">
            </div>
            <div class="col-md-10">
                <div class="card mb-3">
                    <h3 class="card-header"><i class="fas fa-user"></i> The_User</h3>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <form>
                                <fieldset>
                                    <div class="list-group">
                                        <a href="#" class="list-group-item flex-column align-items-start">
                                            <p class="mb-1"> Description unavailable.</p>
                                        </a>
                                    </div>
                                </fieldset>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <form class="container mb-4 mt-4 bg-dark">

        <div class="form-row">
            <div class="col-lg-8 col-md-4 col-sm-4 my-3">

                <div class="input-group  w-75">
                    <input type="text" class="form-control bg-dark text-light" placeholder="Search for a title..." aria-label="Search for a title..." aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </div>
            <span class="my-auto col-1">Sort by </span>
            <div class="col-lg-2 col-md-2 my-auto">

                <select name="SortBy" class="form-control bg-dark text-light">
                    <option value="hours">Hours Played</option>
                    <option value="purchaseNew">Last Bought</option>
                    <option value="purchaseOld">First Bought</option>
                </select>
            </div>
        </div>
    </form>

    <div class="container" style="padding-bottom:40px;">

        <a class="row bg-dark b-shadow my-1" href="#">
            <div class="col-md-2"><img src="/img/carousel/CP2077.jpg" class="ml-0 mt-1" style="max-width:96px;max-height:54px;">
            </div>
            <div class="col-5 m-auto">
                <div class="row">
                    Cyberpunk 2077
                </div>
                <div class="row"><span class="HomeNav-devInfo">CD Projekt Red</span></div>

            </div>
            <div class="col-md-2  m-auto">
                <div class="row">Bought: </div>
                <div class="row"><span class="text-info">31/12/2020</span></div>
            </div>
            <div class="col-md-2 my-auto">55 Hours </div>
            <button class="btn btn-secondary col-md-1" role="button" data-toggle="tooltip" data-placement="bottom" title="Edit Hours">
                <i class="fas fa-edit"></i>
            </button>
        </a>

        <a class="row bg-dark b-shadow my-1" href="#">
        <div class="col-md-2"><img src="/img/carousel/GTAV.jpg" class="ml-0 mt-1"
                style="max-width:96px;max-height:54px;">
            </div>
            <div class="col-5 m-auto">
              <div class="row">
                Grand Theft Auto V
              </div>
              <div class="row"><span class="HomeNav-devInfo">Rockstar North</span></div>

            </div>
            <div class="col-md-2  m-auto">
                <div class="row">Bought: </div>
                <div class="row"><span class="text-info">31/12/2020</span></div>
            </div>
            <div class="col-md-2 my-auto">32 Hours </div>
            <button class="btn btn-secondary col-md-1" role="button" data-toggle="tooltip" data-placement="bottom" title="Edit Hours">
                <i class="fas fa-edit"></i>
            </button>
        </a>

        <a class="row bg-dark b-shadow my-1" href="#">
        <div class="col-md-2"><img src="/img/carousel/Outriders.jpg" class="ml-0 mt-1"
                style="max-width:96px;max-height:54px;">
            </div>
            <div class="col-5 m-auto">
              <div class="row">
                Outriders
              </div>
              <div class="row"><span class="HomeNav-devInfo">People Can Fly</span></div>

            </div>
            <div class="col-md-2  m-auto">
                <div class="row">Bought: </div>
                <div class="row"><span class="text-info">31/12/2020</span></div>
            </div>
            <div class="col-md-2 my-auto">20 Hours </div>
            <button class="btn btn-secondary col-md-1" role="button" data-toggle="tooltip" data-placement="bottom" title="Edit Hours">
                <i class="fas fa-edit"></i>
            </button>
        </a>
    </div>

    <!-- MAIN AREA -->

    <!-- FOOTER -->
    <?php
    include_once 'footer.php';
    ?>
    <!-- FOOTER -->
</body>