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
                <a class="btn btn-secondary" href="/cart.php" role="button">
                    <i class="fas fa-shopping-cart mr-2"></i>
                    <span class="numberCircle">2</span>
                    </button>
                </a>
            </li>

            <li class="nav-item dropdown ml-3">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false"><i class="fas fa-user-cog"></i> The_User</a>
                <div class="dropdown-menu dropdown-menu-right" style="width:30px">
                    <a class="dropdown-item" href="/editProfile.php">
                        <i class="fas fa-id-badge"></i>
                        <span> Profile</span>
                    </a>
                    <a class="dropdown-item" href="/AdminPage.php"><i class="fas fa-hammer"></i>
                        <span> Admin Dashboard</span>
                    </a>
                    <a class="dropdown-item" href="/wishlist.php">
                        <i class="fas fa-star"></i>
                        <span> Wishlist</span>
                    </a>
                    <a class="dropdown-item" href="/history.php"><i class="fas fa-archive"></i>
                        <span> History</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-sign-out-alt"></i>
                        <span> Logout</span>
                    </a>
                </div>
            </li>

        </ul>

    </div>
</nav>



</html>