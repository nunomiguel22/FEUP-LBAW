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


  <!-- Navbar -->
  <?php
    include_once 'navbar_logged.php';
  ?>


  <!-- Breadcrumbs -->
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Search</li>
    </ol>
  </div>


  <!-- Game list -->
  <div class="container p-0">
    <div class=" row">

      <div class="col-lg-9 col-md-12">

        <form class="container search-criteria mb-4 bg-dark">

          <div class="form-row">
            <div class="col-lg-8 col-md-4 col-sm-4 my-3">

              <div class="input-group  w-75">
                <input type="text" class="form-control bg-dark text-light" placeholder="Search for a title..."
                  aria-label="Search for a title..." aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></span>
                </div>
              </div>
            </div>
            <span class="my-auto col-1">Sort by </span>
            <div class="col-lg-2 col-md-2 my-auto">

              <select name="SortBy" class="form-control bg-dark text-light">
                <option value="popularity">Popularity</option>
                <option value="newReleases">New Releases</option>
                <option value="topRated">Top Rated</option>
              </select>
            </div>
          </div>
        </form>


        <div class="container" style="padding-bottom:40px;">

          <a class="row bg-dark b-shadow my-1" href="#">
            <div class="col-md-2"><img src="/img/carousel/CP2077.jpg" class="ml-0 mt-1"
                style="max-width:96px;max-height:54px;">
            </div>
            <div class="col-5 m-auto">
              <div class="row">
                Cyberpunk 2077
              </div>
              <div class="row"><span class="HomeNav-devInfo">CD Projekt Red</span></div>

            </div>
            <div class="col-md-2 my-auto">20/12/2020</div>
            <div class="col-md-1 my-auto">
              <div class="radialProgressBar progress-70">
                <div class="overlay text-light">3.5</div>
              </div>
            </div>
            <div class="col-md-2 my-auto" align="right">59.99€</div>
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
            <div class="col-md-2 m-auto">20/04/2013</div>
            <div class="col-md-1 m-auto">
              <div class="radialProgressBar progress-90">
                <div class="overlay text-light">4.5</div>
              </div>
            </div>
            <div class="col-md-2 my-auto" align="right">20.99€</div>
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
            <div class="col-md-2 m-auto">20/02/2021</div>
            <div class="col-md-1 m-auto">
              <div class="radialProgressBar progress-40">
                <div class="overlay text-light">2.5</div>
              </div>
            </div>
            <div class="col-md-2 my-auto" align="right">40.00€</div>
          </a>

          <a class="row bg-dark b-shadow my-1" href="#">
            <div class="col-md-2"><img src="/img/carousel/h3.jpg" class="ml-0 mt-1"
                style="max-width:96px;max-height:54px;">
            </div>
            <div class="col-5 m-auto">
              <div class="row">
                Hitman 3
              </div>
              <div class="row"><span class="HomeNav-devInfo">IO Interactive</span></div>

            </div>
            <div class="col-md-2 m-auto">10/01/2021</div>
            <div class="col-md-1 m-auto">
              <div class="radialProgressBar progress-80">
                <div class="overlay text-light">4</div>
              </div>
            </div>
            <div class="col-md-2 my-auto" align="right">30.00€</div>
          </a>

          <a class="row bg-dark b-shadow my-1" href="#">
            <div class="col-md-2"><img src="/img/carousel/CSGO.jpg" class="ml-0 mt-1"
                style="max-width:96px;max-height:54px;">
            </div>
            <div class="col-5 m-auto">
              <div class="row">
                Counter-Strike: Global Offensive
              </div>
              <div class="row"><span class="HomeNav-devInfo">Valve</span></div>

            </div>
            <div class="col-md-2 m-auto">20/04/2013</div>
            <div class="col-md-1 m-auto">
              <div class="radialProgressBar progress-100">
                <div class="overlay text-light">5</div>
              </div>
            </div>
            <div class="col-md-2 my-auto" align="right">40.00€</div>
          </a>

          <a class="row bg-dark b-shadow my-1" href="#">
            <div class="col-md-2"><img src="/img/carousel/Control.jpg" class="ml-0 mt-1"
                style="max-width:96px;max-height:54px;">
            </div>
            <div class="col-5 m-auto">
              <div class="row">
                Control
              </div>
              <div class="row"><span class="HomeNav-devInfo">505 Games</span></div>

            </div>
            <div class="col-md-2 m-auto">24/04/2016</div>
            <div class="col-md-1 m-auto">
              <div class="radialProgressBar progress-60">
                <div class="overlay text-light">3</div>
              </div>
            </div>
            <div class="col-md-2 my-auto" align="right">29.99€</div>
          </a>

          <a class="row bg-dark b-shadow my-1" href="#">
            <div class="col-md-2"><img src="/img/carousel/GR.jpg" class="ml-0 mt-1"
                style="max-width:96px;max-height:54px;">
            </div>
            <div class="col-5 m-auto">
              <div class="row">
                Ghostrunner
              </div>
              <div class="row"><span class="HomeNav-devInfo">One More Level</span></div>

            </div>
            <div class="col-md-2 m-auto">4/08/2020</div>
            <div class="col-md-1 m-auto">
              <div class="radialProgressBar progress-80">
                <div class="overlay text-light">4</div>
              </div>
            </div>
            <div class="col-md-2 my-auto" align="right">29.99€</div>
          </a>

          <a class="row bg-dark b-shadow my-1" href="#">
            <div class="col-md-2"><img src="/img/carousel/BL3.jpg" class="ml-0 mt-1"
                style="max-width:96px;max-height:54px;">
            </div>
            <div class="col-5 m-auto">
              <div class="row">
                Borderlands 3
              </div>
              <div class="row"><span class="HomeNav-devInfo">Gearbox Software</span></div>

            </div>
            <div class="col-md-2 m-auto">5/09/2018</div>
            <div class="col-md-1 m-auto">
              <div class="radialProgressBar progress-60">
                <div class="overlay text-light">3</div>
              </div>
            </div>
            <div class="col-md-2 my-auto" align="right">59.99€</div>
          </a>

          <a class="row bg-dark b-shadow my-1" href="#">
            <div class="col-md-2"><img src="/img/carousel/MW3.jpg" class="ml-0 mt-1"
                style="max-width:96px;max-height:54px;">
            </div>
            <div class="col-5 m-auto">
              <div class="row">
                Call of Duty: Modern Warfare 3
              </div>
              <div class="row"><span class="HomeNav-devInfo">Infinity Ward</span></div>

            </div>
            <div class="col-md-2 m-auto">24/01/2014</div>
            <div class="col-md-1 m-auto">
              <div class="radialProgressBar progress-70">
                <div class="overlay text-light">3.5</div>
              </div>
            </div>
            <div class="col-md-2 my-auto" align="right">39.99€</div>
          </a>

        </div>
        <!-- Next page and previous page buttons -->

        <div class="container">
          <ul class="pagination row justify-content-center pb-3 mt-n4">
            <li class="page-item disabled">
              <a class="page-link" href="#">&laquo;</a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">4</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">5</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">&raquo;</a>
            </li>
          </ul>
        </div>
      </div>


      <div class="col-lg-3 d-none d-lg-block">

        <div class="card d-flex text-white bg-secondary mr-3 row">
          <div class="card-header">Search Results</div>
          <div class="card-body">
            <span class="text-light">Showing <span class="text-white">6</span> results,
              use the filters below to further narrow down your search.</span>
          </div>
        </div>

        <div class="card mt-2 d-flex text-white text-center bg-secondary mr-3 row">
          <div class="card-header">Price</div>
          <div class="card-body">

            <input type="range" class="custom-range w-75" id="customRange1">
            <label for="customRange1">Under 60,--€</label>
          </div>
        </div>

        <div class="card mt-2 d-flex text-white text-center bg-secondary mr-3 row">
          <div class="card-header">Category</div>
          <div class="card-body">

            <select name="SortBy" class="form-control bg-dark text-light mb-3">
              <option value="Any">Any</option>
              <option value="newReleases">New Releases</option>
              <option value="topRated">Top Rated</option>
            </select>
          </div>
        </div>




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