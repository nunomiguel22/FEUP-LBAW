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
            <li class="breadcrumb-item active" aria-current="page"> editProfile </li>
        </ol>
    </div>
    <!-- HEADER AREA -->

    <!-- MAIN AREA -->

    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img src="/img/logo/instagram_profile_image.png" class="align-self-start mr-3" width="150" height="150"
                    alt="...">
            </div>
            <div class="col-md-10">
                <div class="card mb-3">
                    <h3 class="card-header"><i class="fas fa-user"></i>  The_User</h3>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <form>
                                <fieldset>
                                    <legend>Personal Details</legend>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="name" class="form-control bg-dark text-light"
                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="Enter name">
                                        <small id="nameHelp" class="form-text text-muted">Publicly available.</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleTextarea">Description</label>
                                        <textarea class="form-control bg-dark text-light" id="description"
                                            rows="3"></textarea>
                                        <small id="descriptionHelp" class="form-text text-muted">Publicly
                                            available.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Profile Picture</label>
                                        <input type="file" class="form-control-file bg-dark text-light"
                                            id="profilePicture" aria-describedby="fileHelp">
                                        <small id="fileHelp" class="form-text text-muted">Please use a valid image. PNG
                                            and JPEG accepted.</small>
                                    </div>
                                    <button type="submit" class="btn btn-secondary">Submit</button>
                                </fieldset>
                            </form>
                        </li>
                    </ul>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <form>
                                <fieldset>
                                    <legend>Account details</legend>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email Address</label>
                                        <input type="email" class="form-control bg-dark text-light"
                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="Enter email">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email
                                            with anyone else.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">New Password</label>
                                        <input type="password" class="form-control bg-dark text-light"
                                            id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Confirm Password</label>
                                        <input type="password" class="form-control bg-dark text-light"
                                            id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-secondary">Submit</button>
                                </fieldset>
                            </form>
                        </li>
                    </ul>
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