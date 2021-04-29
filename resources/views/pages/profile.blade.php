@extends('layouts.app')

@section('title', 'OGS')

@section('content')




<div class="container p-3" style="background:#2e2e2e;">
        <div class="row">
            <div class="col-3 d-none  d-lg-block">
                <img src="/img/logo/instagram_profile_image.png" style="max-height:250px; max-width:250px;"
                    class="align-self-start border b-shadow" alt="...">
            </div>
            <div class="col-4">
                <h3 class="text-shadow">the_user</h3>
                <span class="text-muted">My</span>
                <span class="text-muted mr"> Name</span>
                <h6 class="my-3">PORTUGAL</h6>
                <span class="text-light">Games purchased: </span> <span class="m">5</span>
            </div>
            <div class="col-1" style="border-right: 1px solid lightgray;"></div>
            <div class="col-4 mt-4">
                <span>No description yet</span>
            </div>
        </div>
    </div>

    <div class="container mt-5">

        <h3 class="text-shadow">GAMES PURCHASED</h3>

        <form action="">

            <div class="form-row">
                <div class="col-lg-9 col-sm-12  my-3">

                    <div class="input-group  w-50">
                        <input type="text" class="form-control bg-dark text-light" placeholder="Search for a user..."
                            aria-label="Search for a user..." aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>

                <span class="my-auto col-lg-1 col-sm-2">Sort by </span>

                <div class="col-lg-2 col-md-4 my-auto">
                    <select name="SortBy" class="form-control bg-dark text-light">
                        <option value="Title">Title</option>
                        <option value="PurchaseDate">Purchase Date</option>
                    </select>
                </div>

            </div>
        </form>

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
                    title="Add to Wishlist" href="asd.php"><i class="fas fa-plus-circle"></i></a>
                <!-- Wishlist Card Body -->
                <div class="row mt-2">
                    <span class="col-7 HomeNav-GameTitle">Outriders</span>

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
                    <span class="col-7 HomeNav-GameTitle">Grand Theft Auto V</span>

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

                </div>
                <div class="row">
                    <span class="col-7 HomeNav-devInfo">Valve</span>

                </div>
                <a href="/product_page_logged.php" class="btn btn-secondary hidden-opacity stretched-link"></a>
            </div>

            <!-- Card -->
            <div class="card bg-dark">

            </div>
        </div>

    </div>

