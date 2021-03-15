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
      <div class="col mr-4">
        <div class="carousel row slide carousel-fade" data-ride="carousel">
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


        <div class="row mt-2">

          <button type="button" class="btn btn-success mb-2 mr-2">Add to
            cart <i class="fas fa-shopping-cart"></i></button>
          <button type="button" class="btn btn-secondary mb-2 mr-2">Add to
            wishlist <i class="far fa-heart"></i></button>
          <button type="button" class="btn btn-danger mb-2 mr-2" data-toggle="modal" data-target="#EditModal">Edit Game
            <i class="fas fa-edit"></i></button>
          <span class="mt-2 mr-1 text-warning">Keys Available</span>
          <span class="mt-2"> 20000</span>
        </div>

        <div class="row mt-2">
          <div class="input-group mb-3 ">
            <input type="number" class="form-control col-3" placeholder="Add keys" aria-label="Add keys"
              aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-warning" type="button">Add</button>
            </div>
          </div>
        </div>
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

        <div class="row">
          <div class="col">
            <div class="row mt-3">
              <h4> Tags </h4>
            </div>
            <div class="row">
              <span class="text-muted" style="word-spacing: 2px;">Open-World RPG Action</span>
            </div>
          </div>
          <div class="col">
            <div class="radialProgressBar-large progress-70">
              <div class="overlay text-light">3.5</div>
            </div>
          </div>

        </div>
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

    <div class="card mb-3">

      <div class="card-header">
        <div class="row">
          <h4 class="col" style="font-style: italic;">The_User </h4>
          <span class="col text-center text-muted">25/01/2021</span>
          <div class="review-rating col" align="right">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i> <i class="fas fa-star"></i>
            <i class="fas fa-star"></i> <i class="far fa-star"></i>
          </div>
        </div>
      </div>

      <div class="card-body">

        <p class="card-text ml-3 my-2">With so many clothes to choose from, fashion (and buying cars)
          basically becomes the Cyberpunk endgame. Just be prepared to give up some armor and stat bonuses to wear
          what
          you like.</p>
        <hr style="background:white;">
        <button type="button" class="btn btn-warning mb-3 ml-3">Edit your review <i class="fas fa-edit"></i>
        </button>
        <button type="button" class="btn btn-danger mb-3 ml-3">Delete your review <i class="fas fa-trash"></i>
        </button>

      </div>
    </div>

    <div class="card mb-3">
      <div class="card-header">
        <div class="row">
          <h4 class="col" style="font-style: italic;">Maria_Ines </h4>
          <span class="col text-center text-muted">20/01/2021</span>
          <div class="review-rating col" align="right">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i> <i class="fas fa-star"></i>
            <i class="fas fa-star"></i> <i class="fas fa-star"></i>
          </div>
        </div>
      </div>
      <div class="card-body">
        <p class="card-text ml-3 my-2">
          The variety of citizens in Night City is remarkable, with outrageous future fashions, wild hairstyles, and
          elaborate cyber implants. You'll see rodeo cowboys with mechanical legs, tattooed yakuza, faces crisscrossed
          with cyberware,
          '80s metalheads sporting wraparound neon visors, and people so heavily augmented you'll wonder if there's
          any
          human left.
          There's a real sense of this being a teeming, vibrant metropolis with layers of history and culture. And
          everyone just looks cool.</p>
        <hr style="background:white;">
        <button type="button" class="btn btn-danger mb-3 ml-3">Report this review <i class="fas fa-gavel"></i></i>
        </button>
        <button type="button" class="btn btn-danger mb-3 ml-3">Delete this review <i
            class="fas fa-trash-alt"></i></i></i>

      </div>
    </div>


    <div class="card mb-3">
      <div class="card-header">
        <div class="row">
          <h4 class="col" style="font-style: italic;">Teresa_Pinto </h4>
          <span class="col text-center text-muted">21/02/2021</span>
          <div class="review-rating col" align="right">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i> <i class="fas fa-star"></i>
            <i class="far fa-star"></i> <i class="far fa-star"></i>
          </div>
        </div>
      </div>
      <div class="card-body">
        <p class="card-text ml-3 my-2">
          Some nice characters and stories nested in an astounding open world, undercut by jarring bugs at every turn.
        </p>
        <hr style="background:white;">
        <button type="button" class="btn btn-danger mb-3 ml-3">Report this review <i class="fas fa-gavel"></i></i>
        </button>
        <button type="button" class="btn btn-danger mb-3 ml-3">Delete this review <i
            class="fas fa-trash-alt"></i></i></i>
      </div>
    </div>



    <div class="card mb-5">
      <div class="card-header">
        <div class="row">
          <h4 class="col" style="font-style: italic;">Gonçalo_Gonçalves</h4>
          <span class="col text-center text-muted">20/01/2021</span>
          <div class="review-rating col" align="right">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i> <i class="far fa-star"></i>
            <i class="far fa-star"></i> <i class="far fa-star"></i>
          </div>
        </div>
      </div>
      <div class="card-body">
        <p class="card-text ml-3 my-2">
          I’m taken by how relentlessly hopeful Cyberpunk is.</p>
        <hr style="background:white;">
        <button type="button" class="btn btn-danger mb-3 ml-3">Report this review <i class="fas fa-gavel"></i></i>
        </button>
        <button type="button" class="btn btn-danger mb-3 ml-3">Delete this review <i
            class="fas fa-trash-alt"></i></i></i>
        </button>
      </div>
    </div>
  </div>

  <section class="contact-form-section mb-5">
    <div class="container">
      <form id="contact-form" class="contact-form" novalidate="novalidate">
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
            <button type="submit" class="btn btn-block btn-success py-2">Add review</button>
          </div>
        </div>
        <!--//form-row-->
      </form>
    </div>
    <!--//container-->
  </section>

  <!-- Main Area -->

  <!-- Signin Modal -->
  <div class="modal fade" id="LoginModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="container">

          <!-- Modal Header -->
          <div class="row mt-4 mb-3">
            <div class="col-11" align="center">
              <img src="/img/logo/logo_transparent.png" width="100" height="100" alt="">
            </div>
            <div class="col-1">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>

          <div class="row">
            <div class="col-10 ml-auto mr-auto">
              <p>SIGN IN WITH AN OGS ACCOUNT</p>
            </div>
          </div>

          <!-- Signin Form -->
          <form action="">

            <!-- Email Row -->
            <div class=" form-group row mb-4">
              <input type="email" class="form-control col-10 m-auto bg-secondary text-light" style="height:50px"
                placeholder="Email address">
            </div>

            <!-- Password Row -->
            <div class="form-group row">
              <input type="password" class="form-control col-10 m-auto bg-secondary text-light" style="height:50px"
                placeholder="Password">
            </div>

            <!-- Submit button Row -->
            <div class="form-group row mt-5">

              <button class="btn btn-secondary col-10 m-auto my-2 my-sm-0 btn-lg" style="width:100%;" type="submit">
                Sign in</button>
            </div>

          </form>

          <!-- Signup link -->
          <div class="row mb-4" align="center">
            <span class="col-10 m-auto">Don't have an OGS account?
              <a href="#" class="text-muted" data-dismiss="modal" data-toggle="modal" data-target="#SignupModal">
                Sign up.
              </a> </span>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="EditModal">
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
        <div class="container">

          <!-- Modal Header -->
          <div class="row mt-4 mb-3">
            <div class="col-11" align="center">
              <img src="/img/logo/logo_transparent.png" width="100" height="100" alt="">
            </div>
            <div class="col-1">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

          </div>


          <div class="container my-3">
            <div class="row my-2">
              <input type="text" class="form-control m-auto col-5 bg-secondary text-light" style="height:50px"
                value="CyberPunk 2077">

              <input type="text" class="form-control m-auto col-5 bg-secondary text-light" style="height:50px"
                value="CD Projekt Red">
            </div>
            <div class="row my-2">
              <input type="text" class="form-control m-auto col-5 bg-secondary text-light" style="height:50px"
                value="20/12/2021">

              <input type="text" class="form-control m-auto col-5 bg-secondary text-light" style="height:50px"
                value="59.99€">
            </div>
            <div class="row my-2">
              <textarea class="form-control col-11 m-auto bg-dark text-light" name="description" rows="6" required="">
                Cyberpunk 2077 is an open-world, action-adventure story set in Night City, 
                a megalopolis obsessed with power, glamour and body modification. 
                You play as V, a mercenary outlaw going after a one-of-a-kind implant that is the 
                key to immortality. You can customize your character’s cyberware, skillset and 
                playstyle, and explore a vast city where the choices you make shape the story and 
                the world around you.
              
              </textarea>
            </div>
            <div class="row mt-2">

              <div class="form-group col-5 m-auto">
                <div class="input-group mb-3">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input " id="inputGroupFile02">
                    <label class="custom-file-label" for="inputGroupFile02">Add cover photo</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>

              <div class="form-group col-5 mx-auto mt-3">
                <div class="input-group mb-3">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input " id="inputGroupFile02">
                    <label class="custom-file-label" for="inputGroupFile02">Add galery photos</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">

              <div class="col-5 mx-auto">
                Category
                <select name="Category" class="form-control bg-dark text-light">
                  <option value="RPG">RPG</option>
                  <option value="Action">Action</option>
                  <option value="Adventure">Adventure</option>
                  <option value="etc">etc</option>
                </select>
              </div>
              <div class="col-5 mx-auto">
                Listed
                <select name="Category" class="form-control bg-dark text-light">
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>


            </div>
            <div class="row mt-3">
              <div class="col-5 mx-auto">
                <label for="exampleSelect2">Tags</label>
                <select multiple="" class="form-control bg-dark text-light" id="exampleSelect2">
                  <option selected>Open World</option>
                  <option>Souls-like</option>
                  <option>Co-op</option>
                  <option selected>RPG</option>
                  <option>Story-based</option>
                  <option selected>Action</option>
                  <option>Side-scroller</option>
                </select>
              </div>

              <div class="col-5 mx-auto">
                Amount of Keys Available
                <div class="input-group mb-3 ">
                  <input type="number" class="form-control col" value="20000" aria-label="Add keys"
                    aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-warning" type="button">Change</button>
                  </div>
                </div>
                <button class="btn btn-warning btn-lg w-100" type="submit">
                  Edit Game</button>
              </div>

            </div>
          </div>
        </div>



      </div>
    </div>
  </div>
  </div>


  <!-- FOOTER -->
  <?php
    include_once 'footer.php';
  ?>
  <!-- FOOTER -->


</body>


</html>