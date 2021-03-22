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
            <li class="breadcrumb-item "> <a href="/index_logged.php"> Home </a> </li>
            <li class="breadcrumb-item active"> My Account</li>
        </ol>
    </div>

    <!-- HEADER AREA -->

    <!-- MAIN AREA -->
    <div class="container">

        <div class="row d-lg-none d-sm-block mb-2">
            <div class="nav flex-column nav-pills nav-menu w-100" id="v-pills-tab" role="tablist"
                aria-orientation="vertical">
                <a class="nav-link nav-item active" id="v-pills-wishlist-tab" data-toggle="pill"
                    href="#v-pills-wishlist" role="tab" aria-controls="v-pills-wishlist" aria-selected="true">
                    <i class="fas fa-hand-holding-heart mr-2"></i> WISHLIST
                </a>
                <a class="nav-link" id="v-pills-general-tab" data-toggle="pill" href="#v-pills-general" role="tab"
                    aria-controls="v-pills-general" aria-selected="false">
                    <i class="fas fa-user mr-3"></i>GENERAL
                </a>
                <a class="nav-link" id="v-pills-history-tab" data-toggle="pill" href="#v-pills-history" role="tab"
                    aria-controls="v-pills-history" aria-selected="false">
                    <i class="fas fa-history mr-3"></i>HISTORY
                </a>
                <a class="nav-link" id="v-pills-security-tab" data-toggle="pill" href="#v-pills-security" role="tab"
                    aria-controls="v-pills-security" aria-selected="false">
                    <i class="fas fa-key mr-3"></i>PASSWORD & SECURITY
                </a>
                <a class="nav-link" id="v-pills-avatar-tab" data-toggle="pill" href="#v-pills-avatar" role="tab"
                    aria-controls="v-pills-avatar" aria-selected="false">
                    <i class="fas fa-image mr-3"></i></i> AVATAR
                </a>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-3 d-none d-lg-block">
                <div class="nav flex-column nav-pills nav-menu" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <a class="nav-link nav-item active" id="v-pills-wishlist-tab" data-toggle="pill"
                        href="#v-pills-wishlist" role="tab" aria-controls="v-pills-wishlist" aria-selected="true">
                        <i class="fas fa-hand-holding-heart mr-2"></i> WISHLIST
                    </a>
                    <a class="nav-link" id="v-pills-general-tab" data-toggle="pill" href="#v-pills-general" role="tab"
                        aria-controls="v-pills-general" aria-selected="false">
                        <i class="fas fa-user mr-3"></i>GENERAL
                    </a>
                    <a class="nav-link" id="v-pills-history-tab" data-toggle="pill" href="#v-pills-history" role="tab"
                        aria-controls="v-pills-history" aria-selected="false">
                        <i class="fas fa-history mr-3"></i>HISTORY
                    </a>
                    <a class="nav-link" id="v-pills-security-tab" data-toggle="pill" href="#v-pills-security" role="tab"
                        aria-controls="v-pills-security" aria-selected="false">
                        <i class="fas fa-key mr-3"></i>PASSWORD & SECURITY
                    </a>
                    <a class="nav-link" id="v-pills-avatar-tab" data-toggle="pill" href="#v-pills-avatar" role="tab"
                        aria-controls="v-pills-avatar" aria-selected="false">
                        <i class="fas fa-image mr-3"></i></i> AVATAR
                    </a>
                </div>
            </div>

            <!-- Whishlist TAB  -->
            <div class="col bg-dark mb-4">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-wishlist" role="tabpanel"
                        aria-labelledby="v-pills-wishlist-tab">
                        <div class="container p-4">

                            <h4 class="text-shadow">WISHLIST</h4>
                            <span class="text-muted">View the games on your wishlist</span>

                            <div class="card mt-4 mb-2">
                                <div class="row no-gutters">
                                    <div class="col-md-3">
                                        <a href="/product_page.php" class="text-white">
                                            <img src="/img/carousel/Outriders.jpg" widht="75" height="75"
                                                alt="Outriders">
                                        </a>
                                    </div>
                                    <div class="card-body col-md-8">
                                        <a href="/product_page.php" class="text-white">
                                            <h5 class="card-title">Outriders</h5>
                                            <p class="card-text">40.00€</p>
                                        </a>
                                    </div>

                                    <button class="btn btn-secondary col-md-1" role="button">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card mt-2 mb-2">
                                <div class="row no-gutters">
                                    <div class="col-md-3">
                                        <a href="/product_page.php" class="text-white">
                                            <img src="/img/carousel/GR.jpg" widht="75" height="75" alt="Ghostrunner">
                                        </a>
                                    </div>
                                    <div class="card-body col-md-8">
                                        <a href="/product_page.php" class="text-white">
                                            <h5 class="card-title">Ghostrunner</h5>
                                            <p class="card-text">29.99€</p>
                                        </a>
                                    </div>

                                    <button class="btn btn-secondary col-md-1" role="button">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card mt-2 mb-2">
                                <div class="row no-gutters">
                                    <div class="col-md-3">
                                        <a href="/product_page.php" class="text-white">
                                            <img src="/img/carousel/GTAV.jpg" widht="75" height="75" alt="GTA V">
                                        </a>
                                    </div>
                                    <div class="card-body col-md-8">
                                        <a href="/product_page.php" class="text-white">
                                            <h5 class="card-title">Grand Theft Auto V</h5>
                                            <p class="card-text">20.99€</p>
                                        </a>
                                    </div>

                                    <button class="btn btn-secondary col-md-1" role="button">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>

                            <button class="btn btn-secondary float-right my-4" href="/index.php" role="button">
                                <i class="fas fa-trash"></i> Remove all
                            </button>

                        </div>


                    </div>
                    <div class="tab-pane fade" id="v-pills-general" role="tabpanel"
                        aria-labelledby="v-pills-general-tab">

                        <div class="container p-4">

                            <h4 class="text-shadow">GENERAL</h4>
                            <span class="text-muted">View and manage your general account details</span>


                            <h4 class="mt-5 text-shadow"> Account Info</h4>
                            <span class="text-muted">Manage your account details</span>

                            <form action="">
                                <div class="row mx-auto mt-4">
                                    <h6 class="col m-0 p-0 text-light">Display Name</h6>
                                    <h6 class="col text-light">Email</h6>
                                </div>
                                <div class="row mt-2 mx-auto">
                                    <input type="text" class="form-control col-5 bg-secondary text-white"
                                        style="height:50px" placeholder="*Display Name" value="the_user">

                                    <div class="col-1"></div>

                                    <input type="text" class="form-control col-5 bg-secondary text-white"
                                        style="height:50px" placeholder="*Email" value="the_user@email.com">
                                </div>
                                <hr>
                                <h4 class="mt-5 text-shadow"> Personal Info</h4>
                                <span class="text-muted">Manage your personal details</span>

                                <div class="row mx-auto mt-4">
                                    <h6 class="col m-0 p-0 text-light">First Name</h6>
                                    <h6 class="col text-light">Last Name</h6>
                                </div>
                                <div class="row mt-2 mx-auto">
                                    <input type="text" class="form-control col-5 bg-secondary text-white"
                                        style="height:50px" placeholder="*First Name" value="My">

                                    <div class="col-1"></div>

                                    <input type="text" class="form-control col-5 bg-secondary text-white"
                                        style="height:50px" placeholder="*Last Name" value="Name">

                                </div>

                                <div class="row mx-auto mt-4">
                                    <h6 class="col m-0 p-0 text-light">Country/Region</h6>
                                    <h6 class="col text-light">NIF</h6>
                                </div>
                                <div class="row mx-auto ">
                                    <select class="form-control col-5 bg-secondary text-white" name="Country"
                                        style="height:50px">
                                        <option value="Portugal" default>Portugal</option>
                                        <option value="Spain">Spain</option>
                                        <option value="France">France</option>
                                        <option value="Germany">Germany</option>
                                    </select>
                                    <div class="col-1"></div>

                                    <input type="text" class="form-control col-5 bg-secondary text-white"
                                        style="height:50px" placeholder="*NIF" value="024156988">
                                </div>
                                <hr>
                                <h4 class="text-shadow mt-5">Address</h4>
                                <span class="text-muted">View and manage your address</span>

                                <div class="row mx-auto mt-4">
                                    <h6 class="col m-0 p-0 text-light">Address Line 1</h6>
                                    <h6 class="col text-light">Address Line 2</h6>
                                </div>
                                <div class="row mt-2 mx-auto">
                                    <input type="text" class="form-control col-5 bg-secondary text-white"
                                        style="height:50px" placeholder="*Address Line 1" value="Rua 9">

                                    <div class="col-1"></div>

                                    <input type="text" class="form-control col-5 bg-secondary text-white"
                                        style="height:50px" placeholder="*Address Line 2" value="151 1E">
                                </div>


                                <div class="row mx-auto mt-4">
                                    <h6 class="col-5 m-0 p-0 text-light">City</h6>
                                    <div class="col-1"></div>
                                    <h6 class="col-2 m-0 p-0 text-light">Region</h6>
                                    <h6 class="col-2 text-light">Postal Code</h6>
                                </div>
                                <div class="row mt-2 mx-auto">
                                    <input type="text" class="form-control col-5 bg-secondary text-white"
                                        style="height:50px" placeholder="*City" value="Evora">

                                    <div class="col-1"></div>

                                    <input type="text" class="form-control mr-1 col-2 bg-secondary text-white"
                                        style="height:50px" placeholder="*Region" value="Alentejo">

                                    <input type="text" class="form-control col-3 bg-secondary text-white"
                                        style="height:50px" placeholder="*Postal Code" value="444-5555">
                                </div>




                                <button class="btn btn-lg btn-info mt-5" type="submit">Save Changes</button>

                            </form>
                        </div>


                    </div>

                    <!-- HISTORY TAB  -->
                    <div class="tab-pane fade" id="v-pills-history" role="tabpanel"
                        aria-labelledby="v-pills-history-tab">

                        <div class="container p-4">
                            <h4 class="text-shadow">HISTORY</h4>
                            <span class="text-muted">View your previous purchases details and keys</span>
                            <table class="table borderless table-hover mt-5">
                                <thead>
                                    <tr class="text-light">
                                        <th scope="col" class="d-none d-lg-block">Order ID</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">View Key</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-dark">
                                        <th scope="row" class="d-none d-lg-block">#1345</th>
                                        <td><a href="/product_page_logged.php">Hitman 3</a></td>
                                        <td>30.00€</td>
                                        <td>03/05/2020</td>
                                        <td><button class="btn btn-secondary m-0" data-toggle="modal"
                                                data-target="#KeyModal" type="submit">View
                                                Key</button></td>
                                    </tr>
                                    <tr class="table-dark">
                                        <th scope="row" class="d-none d-lg-block">#4325</th>
                                        <td><a href="/product_page_logged.php">Outriders</a></td>
                                        <td>40.00€</td>
                                        <td>06/08/2020</td>
                                        <td><button class="btn btn-secondary" data-toggle="modal"
                                                data-target="#KeyModal" type="submit">View
                                                Key</button></td>
                                    </tr>
                                    <tr class="table-dark">
                                        <th scope="row" class="d-none d-lg-block">#13215</th>
                                        <td><a href="/product_page_logged.php">Cyberpunk 2077</a></td>
                                        <td>59.99€</td>
                                        <td>06/08/2020</td>
                                        <td><button class="btn btn-secondary" data-toggle="modal"
                                                data-target="#KeyModal" type="submit">View
                                                Key</button></td>
                                    </tr>
                                    <tr class="table-dark">
                                        <th scope="row" class="d-none d-lg-block">#134532</th>
                                        <td><a href="/product_page_logged.php">GTA V</a></td>
                                        <td>20.99€</td>
                                        <td>01/02/2021</td>
                                        <td><button class="btn btn-secondary" data-toggle="modal"
                                                data-target="#KeyModal" type="submit">View
                                                Key</button></td>
                                    </tr>
                                    <tr class="table-dark">
                                        <th scope="row" class="d-none d-lg-block">#111345</th>
                                        <td><a href="/product_page_logged.php">Ghostrunner</a></td>
                                        <td>29.99€</td>
                                        <td>03/03/2021</td>
                                        <td><span class="text-warning">Pending</span></td>
                                    </tr>
                            </table>

                            <nav aria-label="Page navigation" class="mt-5">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav>

                        </div>

                    </div>
                    <div class="tab-pane fade" id="v-pills-avatar" role="tabpanel" aria-labelledby="v-pill-avatar">

                        <div class="container p-4">
                            <h4 class="text-shadow">CHANGE YOUR AVATAR</h4>
                            <span class="text-muted">Change the avatar shown in your profile.</span>
                            <form action="">
                                <div class="row mt-5">
                                    <img src="/img/logo/instagram_profile_image.png"
                                        class="border border-primary mx-auto" width="350" height="350" alt="Avatar">


                                </div>
                                <div class="form-group col-5 mx-auto mt-3">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input " id="inputGroupFile02">
                                            <label class="custom-file-label" for="inputGroupFile02">Upload
                                                Avatar</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <span class="text-muted">JPEG, PNG and BMP formats only, up to 2MB in size. </span>
                                </div>
                                <div class="row">
                                    <button class="btn btn-lg btn-info mt-5 mx-auto" type="submit">Save Changes</button>
                                </div>
                            </form>

                        </div>
                    </div>


                    <div class="tab-pane fade" id="v-pills-security" role="tabpanel"
                        aria-labelledby="v-pills-security-tab">

                        <div class="container p-4">

                            <h4 class="text-shadow">CHANGE YOUR PASSWORD</h4>
                            <span class="text-muted">For your security, we highly recommend that you choose a unique
                                password that you don't use for any other online account</span>

                            <div class="row my-5">
                                <div class="col" style="border-right: 1px solid lightgray;">
                                    <h5 class="text-light mt-4">CURRENT PASSWORD</h5>
                                    <span class="text-muted">REQUIRED</span>
                                    <input type="text" class="form-control mt-2 bg-secondary text-white"
                                        style="height:50px" placeholder="*Current Password">


                                    <h5 class="text-light mt-5">NEW PASSWORD</h5>
                                    <span class="text-muted">REQUIRED</span>
                                    <input type="text" class="form-control mt-2 bg-secondary text-white"
                                        style="height:50px" placeholder="*New Password">

                                    <h5 class="text-light mt-5">RETYPE NEW PASSWORD</h5>
                                    <span class="text-muted">REQUIRED</span>
                                    <input type="text" class="form-control mt-2 bg-secondary text-white"
                                        style="height:50px" placeholder="*Retype new password">

                                </div>

                                <div class="col ml-4">
                                    <h5 class="text-light row my-4">YOUR PASSWORD</h5>

                                    <span class="text-muted row my-4">Your password must not be equal to your previous
                                        password</span>

                                    <span class="text-muted row my-4">Your password must have 7
                                        characters or more</span>

                                    <span class="text-muted row my-4">Your password must have at
                                        least
                                        one number</span>

                                    <span class="text-muted row my-4">Your password must contain
                                        no spaces</span>
                                </div>

                            </div>
                            <button class="btn btn-lg btn-info " type="submit">SAVE CHANGES</button>
                            <hr>
                            <h4 class="text-shadow">DELETE YOUR ACCOUNT</h4>
                            <div class="row mx-auto">
                                <div class="col-8">
                                    <span class="text-muted row my-4">Click DELETE ACCOUNT to permanently delete
                                        your OGS account including all personal information, purchase history, whishlist
                                        entries, and
                                        pending purchases.</span>

                                    <span class="text-danger row my-4">THIS IS NOT REVERSIBLE, AFTER TAKING THIS
                                        ACTION YOUR ACCOUNT WILL NOT BE RECOVERABLE.</span>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-lg btn-danger mt-2" type="submit">DELETE ACCOUNT</button>
                                </div>

                            </div>



                        </div>
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

<div class="modal fade" id="KeyModal">
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
                        <p>HERE IS YOUR KEY</p>
                    </div>
                </div>
                <div class="form-group">

                    <input class="form-control" type="text" value="XF-03-AS-A5-3F-2A-3G" readonly="">

                </div>


            </div>
        </div>
    </div>
</div>


</html>