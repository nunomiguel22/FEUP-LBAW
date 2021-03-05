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
                    <a class="dropdown-item" href="#">Browse All</a>
                </div>
            </li>
        </ul>

        <form class="form-inline ml-auto mr-auto" style="width:30%">
            <input class="form-control mr-sm-2" type="text" placeholder="Search for a title..." style="width:68%">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#LoginModal">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#SignupModal">Signup</a>
            </li>

        </ul>

    </div>
</nav>

<div class="modal" id="LoginModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>LOGIN</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="SignupModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>SIGNUP</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</html>