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
      <li class="breadcrumb-item active" aria-current="page"> AdminPage </li>
    </ol>
  </div>

  <!-- HEADER AREA -->

  <!-- MAIN AREA -->

  <div class="container">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#gameList">Games List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#userReports">User Reports</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#reviewReports">Review Reports</a>
      </li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade active show" id="home">
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4 class="alert-heading">Urgent!</h4>
          <p class="mb-0">There are 10 games to add!</a>.</p>
        </div>
        <div class="alert alert-dismissible alert-warning">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4 class="alert-heading">Warning!</h4>
          <p class="mb-0">There are 10 user reports to evaluate!</a>.</p>
        </div>
        <div class="alert alert-dismissible alert-success">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4 class="alert-heading">To Do!</h4>
          <p class="mb-0">There are 10 review reports to evaluate!</a>.</p>
        </div>
        <div class="alert alert-dismissible alert-warning">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4 class="alert-heading">Warning!</h4>
          <p class="mb-0">There are 10 user reports to evaluate!</a>.</p>
        </div>
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4 class="alert-heading">Urgent!</h4>
          <p class="mb-0">There are 10 games to delete!</a>.</p>
        </div>
        <div>
          <ul class="pagination">
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
      <div class="tab-pane fade" id="gameList">
        <div class="container game-list mt-4 mb-3">

          <form class="container search-criteria m-auto">

            <div class="form-row">
              <div class="game-name col-md-5">
                <h5 class="criteria-text">Search for title: </h5>
                <input class="form-control bg-dark text-light" type="text" style="width:85%">
              </div>
              <div class="game-category col-md-2">
                <h5 class="criteria-text">Category: </h5>
                <select name="Category" class="form-control bg-dark text-light" style="width:80%">
                  <option value="any">Any</option>
                  <option value="adventure">Adventure</option>
                  <option value="action">Action</option>
                  <option value="casual">Casual</option>
                  <option value="hacknslash">Hack-and-slash</option>
                  <option value="indie">Indie</option>
                  <option value="multiplayer">Multiplayer</option>
                  <option value="openWorld">Open world</option>
                  <option value="racing">Racing</option>
                  <option value="rpg">RPG</option>
                  <option value="shooter">Shooter</option>
                  <option value="simulation">Simulation</option>
                  <option value="sports">Sports</option>
                  <option value="stealth">Stealth</option>
                  <option value="strategy">Strategy</option>
                </select>
              </div>

              <div class="sort-by col-md-2">
                <h5 class="criteria-text">Sort by: </h5>
                <select name="SortBy" class="form-control bg-dark text-light" style="width:80%">
                  <option value="popularity">Popularity</option>
                  <option value="newReleases">New Releases</option>
                  <option value="topRated">Top Rated</option>
                </select>
              </div>

              <div class="price col-md-2">
                <h5 class="criteria-text">Price: </h5>
                <select name="Price" class="form-control bg-dark text-light" style="width:80%">
                  <option value="any">Any</option>
                  <option value="<=50">50€ or less</option>
                  <option value="<=30">30€ or less</option>
                  <option value="<=20">20€ or less</option>
                  <option value="<=10">10€ or less</option>
                  <option value="<=5">5€ or less</option>
                  <option value="free">Free</option>
                </select>
              </div>
              <button type="button" class=" col-md-1 mt-auto btn btn-secondary">Search</button>
            </div>
          </form>

          <div class="card mt-2 mb-2">
            <div class="row no-gutters">
              <div class="col-md-3">
                <a href="/product_page.php" class="text-white">
                  <img src="/img/CP2077.jpg" widht="75" height="75" alt="...">
                </a>
              </div>
              <div class="card-body col-md-7">
                <a href="/product_page.php" class="text-white">
                  <h5 class="card-title">Cyberpunk 2077</h5>
                  <p class="card-text">59.99€</p>
                </a>
              </div>
              <button class="btn btn-secondary col-md-1" data-toggle="tooltip" data-placement="top" title="Hide">
                <i class="fas fa-minus-circle"></i>
              </button>
              <button type="button" class="btn btn-secondary col-md-1" data-toggle="tooltip" data-placement="top" title="Delete">
                <i class="far fa-trash-alt"></i>
              </button>
            </div>
          </div>

          <div class="card mt-2 mb-2">
            <div class="row no-gutters">
              <div class="col-md-3">
                <a href="/product_page.php" class="text-white">
                  <img src="/img/hitman.jpg" widht="75" height="75" alt="...">
                </a>
              </div>
              <div class="card-body col-md-7">
                <a href="/product_page.php" class="text-white">
                  <h5 class="card-title">Hitman 3</h5>
                  <p class="card-text">30.00€</p>
                </a>
              </div>
              <button class="btn btn-secondary col-md-1" data-toggle="tooltip" data-placement="top" title="Hide">
                <i class="fas fa-minus-circle"></i>
              </button>
              <button class="btn btn-secondary col-md-1" data-toggle="tooltip" data-placement="top" title="Delete">
                <i class="far fa-trash-alt"></i>
              </button>
            </div>
          </div>
          <div>
            <ul class="pagination">
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
          <form style="padding-top:30px;">
            <fieldset>
              <legend>Add Game</legend>

              <div class="form-group">
                <label for="name">Name</label>
                <input type="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter name">
              </div>
              <div class="form-group">
                <label for="producer">Producer</label>
                <input type="producer" class="form-control" id="producer" placeholder="Producer">
              </div>
              <div class="form-group">
                <label for="date">Release Date</label>
                <input type="date" class="form-control" id="date" placeholder="Date">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Price</label>
                <input type="Price" class="form-control" id="Price" placeholder="Price">
              </div>
              <div class="form-group">
                <label for="exampleTextarea">Description</label>
                <textarea class="form-control" id="Description" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="producer">Categories</label>
                <input type="categories" class="form-control" id="categories" placeholder="Categories">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Cover Image</label>
                <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                <small id="fileHelp" class="form-text text-muted">Primary image.</small>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </fieldset>
          </form>
        </div>
      </div>

      <div class="tab-pane fade" id="userReports">
        <form class="container search-criteria m-auto" style="padding-top:30px;">

          <div class="form-row">
            <div class="game-name col-md-5">
              <h5 class="criteria-text">Search for Report: </h5>
              <input class="form-control bg-dark text-light" type="text" style="width:85%">
            </div>
            <button type="button" class=" col-md-1 mt-auto btn btn-secondary">Search</button>
          </div>
          <div class="form-row">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Reported User </th>
                  <th scope="col">Reported For</th>
                  <th scope="col">Reported By</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr class="table-active">
                  <th scope="row">1</th>
                  <td>premiEr</td>
                  <td>Insults</td>
                  <td>The_User</td>
                  <td>
                    <div class="row">
                      <button type="button" class=" col-md-2 mt-auto btn btn-secondary">
                        <i class="fas fa-ban"></i> PermaBan
                      </button>
                    </div>
                    <div class="row">
                      <button type="button" class=" col-md-2 mt-auto btn btn-secondary">
                        <i class="fas fa-ban"></i> TimeOut
                      </button>
                    </div>
                  </td>
                </tr>
                <tr class="table-active">
                  <th scope="row">1</th>
                  <td>Salter</td>
                  <td>Spam</td>
                  <td>The_User</td>
                  <td>
                    <div class="row">
                      <button type="button" class=" col-md-2 mt-auto btn btn-secondary">
                        <i class="fas fa-ban"></i> PermaBan
                      </button>
                    </div>
                    <div class="row">
                      <button type="button" class=" col-md-2 mt-auto btn btn-secondary">
                        <i class="fas fa-ban"></i> TimeOut
                      </button>
                    </div>
                  </td>
                </tr>
                <tr class="table-active">
                  <th scope="row">1</th>
                  <td>Ripper2000</td>
                  <td>Inappropriate content</td>
                  <td>The_User</td>
                  <td>
                    <div class="row">
                      <button type="button" class=" col-md-2 mt-auto btn btn-secondary">
                        <i class="fas fa-ban"></i> PermaBan
                      </button>
                    </div>
                    <div class="row">
                      <button type="button" class=" col-md-2 mt-auto btn btn-secondary">
                        <i class="fas fa-ban"></i> TimeOut
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <div>
              <ul class="pagination">
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
        </form>
      </div>

      <div class="tab-pane fade" id="reviewReports">
        <form class="container search-criteria m-auto" style="padding-top:30px;">

          <div class="form-row">
            <div class="game-name col-md-5">
              <h5 class="criteria-text">Search for Report: </h5>
              <input class="form-control bg-dark text-light" type="text" style="width:85%">
            </div>
            <button type="button" class=" col-md-1 mt-auto btn btn-secondary">Search</button>
          </div>
          <div class="form-row">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Reported Review </th>
                  <th scope="col">Reported For</th>
                  <th scope="col">Reported By</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr class="table-active">
                  <th scope="row">1</th>
                  <td>299450</td>
                  <td>Insults</td>
                  <td>The_User</td>
                  <td>
                    <div class="row">
                      <button type="button" class=" col-md-2 mt-auto btn btn-secondary">
                        <i class="fas fa-ban"></i> PermaBan
                      </button>
                    </div>
                    <div class="row">
                      <button type="button" class=" col-md-2 mt-auto btn btn-secondary">
                        <i class="fas fa-ban"></i> TimeOut
                      </button>
                    </div>
                  </td>
                </tr>
                <tr class="table-active">
                  <th scope="row">1</th>
                  <td>44859</td>
                  <td>Spam</td>
                  <td>The_User</td>
                  <td>
                    <div class="row">
                      <button type="button" class=" col-md-2 mt-auto btn btn-secondary">
                        <i class="fas fa-ban"></i> PermaBan
                      </button>
                    </div>
                    <div class="row">
                      <button type="button" class=" col-md-2 mt-auto btn btn-secondary">
                        <i class="fas fa-ban"></i> TimeOut
                      </button>
                    </div>
                  </td>
                </tr>
                <tr class="table-active">
                  <th scope="row">1</th>
                  <td>1372449</td>
                  <td>Inappropriate content</td>
                  <td>The_User</td>
                  <td>
                    <div class="row">
                      <button type="button" class=" col-md-2 mt-auto btn btn-secondary">
                        <i class="fas fa-ban"></i> PermaBan
                      </button>
                    </div>
                    <div class="row">
                      <button type="button" class=" col-md-2 mt-auto btn btn-secondary">
                        <i class="fas fa-ban"></i> TimeOut
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </form>
        <div>
          <ul class="pagination">
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