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

  <!-- Header Area -->

  <?php
    include_once 'navbar_logged.php';
  ?>

  <!-- Breadcrumbs -->
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="/index.php"> Home </a></li>
      <li class="breadcrumb-item" aria-current="page"> <a href="/search_game.php"> Search Page</a></li>
      <li class="breadcrumb-item active" aria-current="page"> Cyberpunk 2077 </li>
    </ol>
  </div>

  <!-- header Area -->




  <!-- Main Area -->
  <div class="container">
    <div class="row">
      <div class="carousel col slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/img/CP2077.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="/img/CP2077C1.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="/img/CP2077C2.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <div class="col">
        <div class="row">
          <div class="col">
            <h3 class="row">CyberPunk 2077</h3>
            <p class="row text-muted">CD Projekt Red</p>
          </div>
          <div class="col mt-2">
            <div class="row">
              <h5>Released on &nbsp;</h5>
              <span class="text-muted"> 20/12/2021</span>
            </div>
            <h4 class="row">59.99€</h4>
          </div>
        </div>

        <div class="row">
          <p style="font-size:100%;">
            Cyberpunk 2077 is an open-world, action-adventure story set in Night City, a megalopolis obsessed with
            power, glamour and body modification. You play as V, a mercenary outlaw going after a one-of-a-kind implant
            that is the key to immortality. You can customize your character’s cyberware,
            skillset and playstyle, and explore a vast city where the choices you make shape the story and the world
            around you.
          </p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="row mt-3 ml-auto">
          <h4> Categories </h4>
        </div>
        <div class="row">
          <div class="d-inline-flex category-box">Open world</div>
          <div class="d-inline-flex category-box">RPG</div>
          <div class="d-inline-flex category-box">Action</div>
        </div>

      </div>

      <div class="col mt-4" style="padding-top:25px; padding-left:70px;">
        <button type="button" class="btn btn-secondary mb-2 mr-2">Add to cart</button>
        <button type="button" class="btn btn-secondary mb-2 mr-2">Add to wishlist</button>

      </div>

    </div>

  </div>

  <div class="container" style="padding-top:50px;">
    <div class="row">
      <div class="col">
        <hr style="background:white;">
      </div>
      <span><i class="fas fa-book"></i> Reviews </span>
      <div class="col">
        <hr style="background:white;">
      </div>
    </div>
  </div>

  <div class="container" style="padding-top:50px;">

    <div class="card mb-5">

      <div class="card-header">
        <div class="row">
          <h4 class="col">The_User </h4>

          <div class="review-rating col" align="right">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i> <i class="fas fa-star"></i>
            <i class="fas fa-star"></i> <i class="far fa-star"></i>
          </div>
        </div>
      </div>

      <div class="card-body">

        <p class="card-text ml-3">With so many clothes to choose from, fashion (and buying cars)
          basically becomes the Cyberpunk endgame. Just be prepared to give up some armor and stat bonuses to wear
          what
          you like.</p>
        <hr style="background:white;">
        <button type="button" class="btn btn-secondary mb-3 ml-3">Edit your review <i class="fas fa-trash"></i>
        </button>
        <button type="button" class="btn btn-secondary mb-3 ml-3" style="color:#B22222;">Delete your review <i
            class="fas fa-trash"></i>
        </button>

      </div>
    </div>

    <div class="card mb-5">
      <div class="card-header">
        <div class="row">
          <h4 class="col">Maria_Ines </h4>

          <div class="review-rating col" align="right">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i> <i class="fas fa-star"></i>
            <i class="fas fa-star"></i> <i class="fas fa-star"></i>
          </div>
        </div>
      </div>
      <div class="card-body">
        <p class="card-text ml-3">
          The variety of citizens in Night City is remarkable, with outrageous future fashions, wild hairstyles, and
          elaborate cyber implants. You'll see rodeo cowboys with mechanical legs, tattooed yakuza, faces crisscrossed
          with cyberware,
          '80s metalheads sporting wraparound neon visors, and people so heavily augmented you'll wonder if there's
          any
          human left.
          There's a real sense of this being a teeming, vibrant metropolis with layers of history and culture. And
          everyone just looks cool.</p>
      </div>
    </div>

    <div class="card mb-5">
      <div class="card-header">
        <div class="row">
          <h4 class="col">Teresa_Pinto </h4>

          <div class="review-rating col" align="right">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i> <i class="fas fa-star"></i>
            <i class="far fa-star"></i> <i class="far fa-star"></i>
          </div>
        </div>
      </div>
      <div class="card-body">
        <p class="card-text ml-3">
          Some nice characters and stories nested in an astounding open world, undercut by jarring bugs at every turn.
        </p>
      </div>
    </div>

    <div class="card mb-5">
      <div class="card-header">
        <div class="row">
          <h4 class="col">Gonçalo_Gonçalves</h4>

          <div class="review-rating col" align="right">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i> <i class="far fa-star"></i>
            <i class="far fa-star"></i> <i class="far fa-star"></i>
          </div>
        </div>
      </div>
      <div class="card-body">
        <p class="card-text ml-3">
          I’m taken by how relentlessly hopeful Cyberpunk is.</p>
      </div>
    </div>
  </div>

  <section class="contact-form-section mb-5">
    <div class="container">
      <form id="contact-form" class="contact-form p-5 col-lg-9 mx-lg-auto" novalidate="novalidate">
        <h3 class="text-center">Write a review</h3>
        <div class="mb-3 text-center">In order to help others, please leave a review.</div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <input type="text" class="form-control bg-dark text-light" name="name" placeholder="Name" minlength="2"
              required="">
          </div>

          <div class="review-rating col-4" align="right">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i> <i class="fas fa-star"></i>
            <i class="fas fa-star"></i> <i class="far fa-star"></i>
          </div>

          <div class="form-group col-12">
            <textarea class="form-control bg-dark text-light" name="review" placeholder="Enter your review" rows="10"
              required=""></textarea>
          </div>
          <div class="form-group col-12">
            <button type="submit" class="btn btn-block btn-secondary py-2">Add review</button>
          </div>
        </div>
        <!--//form-row-->
      </form>
    </div>
    <!--//container-->
  </section>

  <!-- Main Area -->


  <!-- FOOTER -->
  <?php
    include_once 'footer.php';
  ?>
  <!-- FOOTER -->


</body>


</html>