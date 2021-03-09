<html>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/index.php">
        <img src="/img/logo/logo_transparent2.png" width="40" height="40" alt="">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
        aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">

        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">Browse Categories</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Adventure</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Casual</a>
                    <a class="dropdown-item" href="#">Indie</a>
                    <a class="dropdown-item" href="#">Massively Multiplayer</a>
                    <a class="dropdown-item" href="#">Racing</a>
                    <a class="dropdown-item" href="#">RPG</a>
                    <a class="dropdown-item" href="#">Simulation</a>
                    <a class="dropdown-item" href="#">Sports</a>
                    <a class="dropdown-item" href="#">Strategy</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/search_game.php">Browse All</a>
                </div>
            </li>
        </ul>

        <form class="form-inline ml-auto mr-auto" style="width:30%">
            <input class="form-control bg-secondary text-light mr-sm-2" type="text" placeholder="Search for a title..."
                style="width:68%">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </form>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#LoginModal">
                    <i class="far fa-user fa-2x"></i>
                    Login
                </a>
            </li>
        </ul>
    </div>
</nav>

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
                        <input type="email" class="form-control col-10 m-auto bg-secondary text-light"
                            style="height:50px" placeholder="Email address">
                    </div>

                    <!-- Password Row -->
                    <div class="form-group row">
                        <input type="password" class="form-control col-10 m-auto bg-secondary text-light"
                            style="height:50px" placeholder="Password">
                    </div>

                    <!-- Submit button Row -->
                    <div class="form-group row mt-5">

                        <button class="btn btn-secondary col-10 m-auto my-2 my-sm-0 btn-lg" style="width:100%;"
                            type="submit">
                            Sign in</button>
                    </div>

                </form>

                <!-- Signup link -->
                <div class="row mb-4" align="center">
                    <span class="col-10 m-auto">Don't have an OGS account?
                        <a href="#" class="text-muted" data-dismiss="modal" data-toggle="modal"
                            data-target="#SignupModal">
                            Sign up.
                        </a> </span>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Signin Modal -->
<div class="modal fade" id="SignupModal">
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
                        <p>SIGN UP FOR AN OGS ACCOUNT</p>
                    </div>
                </div>

                <!-- Signup Form -->
                <form action="">

                    <!-- Country Row -->
                    <div class=" form-group row mb-4 justify-content-center">
                        <select class="form-control col-10 bg-secondary text-light" name="Country" style="height:50px">
                            <option value="Portugal" default>Portugal</option>
                            <option value="Spain">Spain</option>
                            <option value="France">France</option>
                            <option value="Germany">Germany</option>
                        </select>
                    </div>

                    <!-- Name Row -->
                    <div class="form-group row justify-content-center">
                        <input type="text" class="form-control col-md-5 bg-secondary text-light" style="height:50px"
                            placeholder="*First Name">
                        <input type="text" class="form-control col-md-5 bg-secondary text-light" style="height:50px"
                            placeholder="*Last Name">
                    </div>
                    <!-- Display name Row -->
                    <div class="form-group row justify-content-center">
                        <input type="text" class="form-control col-10 bg-secondary text-light" style="height:50px"
                            placeholder="*Display Name">
                    </div>

                    <!-- Email Row -->
                    <div class=" form-group row">
                        <input type="email" class="form-control col-10 m-auto bg-secondary text-light"
                            style="height:50px" placeholder="Email address">
                    </div>

                    <!-- Password Row -->
                    <div class="form-group row">
                        <input type="password" class="form-control col-10 m-auto bg-secondary text-light"
                            style="height:50px" placeholder="Password">
                    </div>

                    <!-- Submit button Row -->
                    <div class="form-group row mt-3">

                        <a href="/index_logged.php" <button class="btn btn-secondary col-10 m-auto my-2 my-sm-0 btn-lg"
                            style="width:100%;" type="submit">
                            Sign in</button>
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

</html>