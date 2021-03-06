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
       <script src="/js/admin.js"></script>
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
               <li class="breadcrumb-item active" aria-current="page"> Admin Dashboard </li>
           </ol>
       </div>

       <!-- HEADER AREA -->

       <!-- MAIN AREA -->
       <div class="container">

           <div class="row d-lg-none d-sm-block mb-2">
               <div class="nav flex-column nav-pills nav-menu w-100" id="v-pills-tab" role="tablist"
                   aria-orientation="vertical">
                   <a class="nav-link nav-item active" id="v-pills-sale-tab" data-toggle="pill" href="#v-pills-sale"
                       role="tab" aria-controls="v-pills-sale" aria-selected="true">
                       <i class="fas fa-money-bill-wave mr-3"></i> SALES
                   </a>
                   <a class="nav-link" id="v-pills-games-tab" data-toggle="pill" href="#v-pills-games" role="tab"
                       aria-controls="v-pills-games" aria-selected="false">
                       <i class="fas fa-gamepad mr-3"></i>MANAGE GAMES
                   </a>
                   <a class="nav-link" id="v-pills-ngame-tab" data-toggle="pill" href="#v-pills-ngame" role="tab"
                       aria-controls="v-pills-ngame" aria-selected="false">
                       <i class="fas fa-gamepad mr-3"></i>ADD NEW GAME
                   </a>
                   <a class="nav-link" id="v-pills-users-tab" data-toggle="pill" href="#v-pills-users" role="tab"
                       aria-controls="v-pills-users" aria-selected="false">
                       <i class="fas fa-users-cog mr-3"></i>MANAGE USERS
                   </a>
                   <a class="nav-link" id="v-pills-reports-tab" data-toggle="pill" href="#v-pills-reports" role="tab"
                       aria-controls="v-pills-reports" aria-selected="false">
                       <i class="fas fa-bug mr-3"></i></i> MANAGE REPORTS
                   </a>

               </div>
           </div>


           <div class="row">
               <div class="col-lg-3 d-none d-lg-block">
                   <div class="nav flex-column nav-pills nav-menu" id="v-pills-tab" role="tablist"
                       aria-orientation="vertical">
                       <a class="nav-link nav-item active" id="v-pills-sale-tab" data-toggle="pill" href="#v-pills-sale"
                           role="tab" aria-controls="v-pills-sale" aria-selected="true">
                           <i class="fas fa-money-bill-wave mr-3"></i> SALES
                       </a>
                       <a class="nav-link" id="v-pills-games-tab" data-toggle="pill" href="#v-pills-games" role="tab"
                           aria-controls="v-pills-games" aria-selected="false">
                           <i class="fas fa-gamepad mr-3"></i>MANAGE GAMES
                       </a>
                       <a class="nav-link" id="v-pills-ngame-tab" data-toggle="pill" href="#v-pills-ngame" role="tab"
                           aria-controls="v-pills-ngame" aria-selected="false">
                           <i class="fas fa-gamepad mr-3"></i>ADD NEW GAME
                       </a>
                       <a class="nav-link" id="v-pills-users-tab" data-toggle="pill" href="#v-pills-users" role="tab"
                           aria-controls="v-pills-users" aria-selected="false">
                           <i class="fas fa-users-cog mr-3"></i>MANAGE USERS
                       </a>
                       <a class="nav-link" id="v-pills-reports-tab" data-toggle="pill" href="#v-pills-reports"
                           role="tab" aria-controls="v-pills-reports" aria-selected="false">
                           <i class="fas fa-bug mr-3"></i></i> MANAGE REPORTS
                       </a>
                   </div>
               </div>

               <!-- Whishlist TAB  -->
               <div class="col bg-dark mb-4">
                   <div class="tab-content" id="v-pills-tabContent">
                       <div class="tab-pane fade show active" id="v-pills-sale" role="tabpanel"
                           aria-labelledby="v-pills-sale-tab">
                           <div class="container p-4">

                               <h4 class="text-shadow">SALES</h4>
                               <span class="text-muted">View all sales on the platform</span>

                               <form action="">

                                   <div class="form-row">
                                       <div class="col-lg-5 col-sm-12 my-3">

                                           <div class="input-group">
                                               <input type="text" class="form-control bg-dark text-light"
                                                   placeholder="Search for a user..." aria-label="Search for a user..."
                                                   aria-describedby="basic-addon2">
                                               <div class="input-group-append">
                                                   <span class="input-group-text" id="basic-addon2"><i
                                                           class="fas fa-search"></i></span>
                                               </div>
                                           </div>
                                       </div>
                                       <span class="my-auto col-lg-2 col-sm-2 text-right">Filter by </span>

                                       <div class="col-lg-2 col-md-4 my-auto">
                                           <select name="SortBy" class="form-control bg-dark text-light">
                                               <option value="Any">Any</option>
                                               <option value="Pending">Pending</option>
                                               <option value="Confirmed">Confirmed</option>
                                               <option value="Canceled">Canceled</option>
                                           </select>
                                       </div>

                                       <span class="my-auto col-lg-1 col-sm-2">Sort by </span>

                                       <div class="col-lg-2 col-md-4 my-auto">
                                           <select name="SortBy" class="form-control bg-dark text-light">
                                               <option value="Date">Date</option>
                                               <option value="User">User</option>
                                               <option value="Status">Status</option>
                                               <option value="Price">Price</option>
                                           </select>
                                       </div>

                                   </div>
                               </form>


                               <table class="table borderless table-hover">
                                   <thead>
                                       <tr>
                                           <th scope="col"><a href="#"> #Order ID</a></th>
                                           <th scope="col" class="d-none d-lg-table-cell"><a href="#">User</a></th>
                                           <th scope="col"><a href="#">Payment Method</a></th>
                                           <th scope="col" class="d-none d-lg-table-cell"><a href="#">Date</a></th>
                                           <th scope="col"><a href="#">Total Price</a></th>
                                           <th scope="col"><a href="#">Status</a></th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <tr class="table-dark" style="cursor: pointer;" data-toggle="modal"
                                           data-target="#SaleModal">
                                           <th scope="row">01254</th>
                                           <td class="d-none d-lg-table-cell">the_user</td>
                                           <td>SEPA Transfer</td>
                                           <td class="d-none d-lg-table-cell">20/03/2020</td>
                                           <td>29.99???</td>
                                           <td><span style="color:yellow;">Pending</span> </td>
                                       </tr>
                                       <tr class="table-dark" style="cursor: pointer;" data-toggle="modal"
                                           data-target="#SaleModal">
                                           <th scope="row">012344</th>
                                           <td class="d-none d-lg-table-cell">Joao</td>
                                           <td>Paypal</td>
                                           <td class="d-none d-lg-table-cell">24/05/2020</td>
                                           <td>59.99???</td>
                                           <td><span style="color:green;">Completed</span> </td>
                                       </tr>
                                       <tr class="table-dark" style="cursor: pointer;" data-toggle="modal"
                                           data-target="#SaleModal">
                                           <th scope="row">01555</th>
                                           <td class="d-none d-lg-table-cell">Andre</td>
                                           <td>MB</td>
                                           <td class="d-none d-lg-table-cell">20/01/2020</td>
                                           <td>49.99???</td>
                                           <td><span style="color:yellow;">Pending</span> </td>
                                       </tr>
                                       <tr class="table-dark" style="cursor: pointer;" data-toggle="modal"
                                           data-target="#SaleModal">
                                           <th scope="row">2354</th>
                                           <td class="d-none d-lg-table-cell">Catarina</td>
                                           <td>SEPA Transfer</td>
                                           <td class="d-none d-lg-table-cell">20/02/2021</td>
                                           <td>100.99???</td>
                                           <td><span style="color:red;">Canceled</span> </td>
                                       </tr>
                                   </tbody>
                               </table>

                               <div class="container mt-5">
                                   <ul class="pagination row justify-content-center pb-3 mt-n4">
                                       <li class="page-item disabled">
                                           <a class="page-link" href="#">&laquo;</a>
                                       </li>
                                       <li class="page-item active">
                                           <a class="page-link" href="#">1</a>
                                       </li>
                                       <li class="page-item">
                                           <a class="page-link" href="#">&raquo;</a>
                                       </li>
                                   </ul>
                               </div>

                           </div>


                       </div>
                       <div class="tab-pane fade" id="v-pills-games" role="tabpanel"
                           aria-labelledby="v-pills-games-tab">

                           <div class="container p-4">

                               <h4 class="text-shadow">MANAGE GAMES</h4>
                               <span class="text-muted">Find and manage games on the platform</span>


                               <form action="">


                                   <div class="form-row">
                                       <div class="col-lg-5 col-sm-12 my-3">

                                           <div class="input-group ">
                                               <input type="text" class="form-control bg-dark text-light"
                                                   placeholder="Search for a user..." aria-label="Search for a user..."
                                                   aria-describedby="basic-addon2">
                                               <div class="input-group-append">
                                                   <span class="input-group-text" id="basic-addon2"><i
                                                           class="fas fa-search"></i></span>
                                               </div>
                                           </div>
                                       </div>
                                       <span class="my-auto col-lg-2 col-sm-2 text-right">Filter by </span>

                                       <div class="col-lg-2 col-md-4 my-auto">
                                           <select name="SortBy" class="form-control bg-dark text-light">
                                               <option value="Any">Any</option>
                                               <option value="Pending">Pending</option>
                                               <option value="Confirmed">Confirmed</option>
                                               <option value="Canceled">Canceled</option>
                                           </select>
                                       </div>

                                       <span class="my-auto col-lg-1 col-sm-2 text-right">Sort by </span>

                                       <div class="col-lg-2 col-md-4 my-auto">
                                           <select name="SortBy" class="form-control bg-dark text-light">
                                               <option value="Date">Date</option>
                                               <option value="User">User</option>
                                               <option value="Status">Status</option>
                                               <option value="Price">Price</option>
                                           </select>
                                       </div>

                                   </div>
                               </form>

                               <table class="table borderless table-hover" data-link="row">
                                   <thead>
                                       <tr>
                                           <th scope="col"><a href="#"> #ID</a></th>
                                           <th scope="col"><a href="#">Title</a></th>
                                           <th scope="col" class="d-none d-lg-table-cell"><a href="#">Date</a></th>
                                           <th scope="col"><a href="#">Sales</a></th>
                                           <th scope="col"><a href="#">Keys Available</a></th>
                                           <th scope="col"><a href="#">Listed?</a></th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <tr class="table-dark clickable-row" data-href='/product_page_admin.php'
                                           style="cursor: pointer;">
                                           <th scope="row">01254</th>
                                           <td>Cyberpunk</td>
                                           <td class="d-none d-lg-table-cell">20/12/2020</td>
                                           <td>50321</td>
                                           <td>20000</td>
                                           <td><span style="color:green;">yes</span> </td>

                                       </tr>
                                       <tr class="table-dark clickable-row" data-href='/product_page_admin.php'
                                           style="cursor: pointer;">
                                           <th scope="row">01254</th>
                                           <td>Cyberpunk</td>
                                           <td class="d-none d-lg-table-cell">20/12/2020</td>
                                           <td>50321</td>
                                           <td>20000</td>
                                           <td><span style="color:green;">yes</span> </td>
                                       </tr>
                                       <tr class="table-dark clickable-row" data-href='/product_page_admin.php'
                                           style="cursor: pointer;">
                                           <th scope="row">01254</th>
                                           <td>Cyberpunk</td>
                                           <td class="d-none d-lg-table-cell">20/12/2020</td>
                                           <td>50321</td>
                                           <td>20000</td>
                                           <td><span style="color:green;">yes</span> </td>
                                       </tr>
                                       <tr class="table-dark clickable-row" data-href='/product_page_admin.php'
                                           style="cursor: pointer;">
                                           <th scope="row">01254</th>
                                           <td>Cyberpunk</td>
                                           <td class="d-none d-lg-table-cell">20/12/2020</td>
                                           <td>50321</td>
                                           <td>20000</td>
                                           <td><span style="color:green;">yes</span> </td>
                                       </tr>
                                   </tbody>
                               </table>

                               <div class="container mt-5">
                                   <ul class="pagination row justify-content-center pb-3 mt-n4">
                                       <li class="page-item disabled">
                                           <a class="page-link" href="#">&laquo;</a>
                                       </li>
                                       <li class="page-item active">
                                           <a class="page-link" href="#">1</a>
                                       </li>
                                       <li class="page-item">
                                           <a class="page-link" href="#">&raquo;</a>
                                       </li>
                                   </ul>
                               </div>


                           </div>

                       </div>

                       <!-- HISTORY TAB  -->
                       <div class="tab-pane fade" id="v-pills-ngame" role="tabpanel"
                           aria-labelledby="v-pills-ngame-tab">

                           <div class="container p-4">
                               <h4 class="text-shadow">ADD A NEW GAME</h4>
                               <span class="text-muted">Add a game to the platform</span>

                               <h4 class="mt-5 text-shadow">GAME IDENTITY</h4>
                               <span class="text-muted">Enter the basic game information</span>

                               <div class="my-2 row ml-auto mb-4">
                                   <input type="text" class="form-control my-auto col-5  bg-secondary text-light"
                                       style="height:50px" placeholder="*Title">
                                   <div class="col-1"></div>
                                   <input type="text" class="form-control my-auto col-5 bg-secondary text-light"
                                       style="height:50px" placeholder="*Developer">
                               </div>
                               <div class="my-2 row mb-5 ml-auto">
                                   <input type="text" class="form-control my-auto col-5 bg-secondary text-light"
                                       style="height:50px" placeholder="*Date">
                                   <div class="col-1"></div>
                                   <input type="text" class="form-control my-auto col-5 bg-secondary text-light"
                                       style="height:50px" placeholder="*Price">
                               </div>
                               <div class="my-2 row ml-auto">
                                   <textarea class="form-control col-11  bg-dark text-light" name="description"
                                       placeholder="Enter the game's description" rows="6" required=""></textarea>
                               </div>
                               <hr>
                               <h4 class="mt-5 text-shadow">GAME IMAGES</h4>
                               <span class="text-muted">Add the cover photo and the image gallery for this game</span>

                               <div class="my-2 row ">
                                   <div class="form-group col-12">
                                       <div class="input-group mb-3">
                                           <div class="custom-file">
                                               <input type="file" class="custom-file-input " id="inputGroupFile02">
                                               <label class="custom-file-label" for="inputGroupFile02">Add galery
                                                   photos</label>
                                           </div>
                                           <div class="input-group-append">
                                               <span class="input-group-text">Upload</span>
                                           </div>
                                       </div>
                                   </div>
                               </div>

                               <hr>
                               <h4 class="mt-5 text-shadow">CATEGORIES AND VISIBILITY</h4>
                               <span class="text-muted">Select the game's tags, categories and the visibility in the
                                   store</span>

                               <div class="row mt-4">

                                   <div class="col-5">
                                       Category
                                       <select name="Category" class="form-control bg-dark text-light">
                                           <option value="Action">Action</option>
                                           <option value="Adventure">Adventure</option>
                                           <option value="etc">etc</option>
                                           <option value="etc">etc</option>
                                       </select>
                                   </div>
                                   <div class="col-1"></div>
                                   <div class="col-5">
                                       Listed
                                       <select name="Category" class="form-control bg-dark text-light">
                                           <option value="Yes">Yes</option>
                                           <option value="No">No</option>
                                       </select>
                                   </div>


                               </div>
                               <div class="row mt-4">
                                   <div class="col-lg-5 col-md-6">
                                       <div class="row ml-auto">
                                           <label for="exampleSelect2 ">Tags</label>
                                           <select multiple="" class="form-control bg-dark text-light"
                                               id="exampleSelect2">
                                               <option>Open World</option>
                                               <option>Souls-like</option>
                                               <option>Co-op</option>
                                               <option>Story-based</option>
                                               <option>Side-scroller</option>
                                           </select>
                                       </div>
                                       <div class="row mt-1 ml-auto">
                                           <input type="text" class="form-control my-auto col-6 bg-secondary text-light"
                                               placeholder="*Enter a new tag">
                                           <button class="btn btn-info col-6" type="submit">
                                               Add Tag</button>
                                       </div>
                                   </div>
                               </div>

                               <div class="row mt-4">

                                   <div class="col-8 m-auto">
                                       <button class="btn btn-success my-5 btn-lg w-100" type="submit">
                                           Add Game</button>
                                   </div>
                               </div>

                           </div>










                       </div>
                       <div class="tab-pane fade" id="v-pills-reports" role="tabpanel" aria-labelledby="v-pills-report">

                           <div class="container p-4">

                               <h4 class="text-shadow">MANAGE USER REPORTS</h4>
                               <span class="text-muted">View and take action on user and bug reports</span>

                               <form action="">

                                   <div class="form-row">
                                       <div class="col-lg-5 col-sm-12  my-3">

                                           <div class="input-group ">
                                               <input type="text" class="form-control bg-dark text-light"
                                                   placeholder="Search for a user..." aria-label="Search for a user..."
                                                   aria-describedby="basic-addon2">
                                               <div class="input-group-append">
                                                   <span class="input-group-text" id="basic-addon2"><i
                                                           class="fas fa-search"></i></span>
                                               </div>
                                           </div>
                                       </div>
                                       <span class="my-auto col-lg-2 col-sm-2 text-right">Filter by </span>

                                       <div class="col-lg-2 col-md-4 my-auto">
                                           <select name="SortBy" class="form-control bg-dark text-light">
                                               <option value="Any">Any</option>
                                               <option value="Pending">Pending</option>
                                               <option value="Confirmed">Closed</option>
                                           </select>
                                       </div>

                                       <span class="my-auto col-lg-1 col-sm-2 text-right">Sort by </span>

                                       <div class="col-lg-2 col-md-4 my-auto">
                                           <select name="SortBy" class="form-control bg-dark text-light">
                                               <option value="Date">User</option>
                                               <option value="User">Date</option>
                                               <option value="Status">Status</option>
                                               <option value="Price">Type</option>
                                           </select>
                                       </div>

                                   </div>
                               </form>

                               <table class="table borderless table-hover">
                                   <thead>
                                       <tr>
                                           <th scope="col"><a href="#"> #ID</a></th>
                                           <th scope="col"><a href="#">User Reporting</a></th>
                                           <th scope="col"><a href="#">Type</a></th>
                                           <th scope="col" class="d-none d-lg-table-cell"><a href="#">Date</a></th>
                                           <th scope="col"><a href="#">Status</a></th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <tr class="table-dark" style="cursor: pointer;" data-toggle="modal"
                                           data-target="#BugModal">
                                           <th scope="row">01254</th>
                                           <td>the_user</td>
                                           <td>Bug</td>
                                           <td class="d-none d-lg-table-cell">20/03/2020</td>
                                           <td><span style="color:green;">Closed</span> </td>
                                       </tr>
                                       <tr class="table-dark" style="cursor: pointer;" data-toggle="modal"
                                           data-target="#BugModal">
                                           <th scope="row">012344</th>
                                           <td class=>Joao</td>
                                           <td>Bug</td>
                                           <td class="d-none d-lg-table-cell">24/05/2020</td>
                                           <td><span style="color:green;">Closed</span> </td>
                                       </tr>
                                       <tr class="table-dark" style="cursor: pointer;" data-toggle="modal"
                                           data-target="#RepModal">
                                           <th scope="row">01555</th>
                                           <td>Andre</td>
                                           <td>User</td>
                                           <td class="d-none d-lg-table-cell">20/01/2020</td>
                                           <td><span style="color:green;">Closed</span> </td>
                                       </tr>
                                       <tr class="table-dark" style="cursor: pointer;" data-toggle="modal"
                                           data-target="#BugModal">
                                           <th scope="row">2354</th>
                                           <td>Catarina</td>
                                           <td>Bug</td>
                                           <td class="d-none d-lg-table-cell">20/02/2021</td>
                                           <td><span style="color:yellow;">Pending</span> </td>
                                       </tr>
                                   </tbody>
                               </table>

                               <div class="container mt-5">
                                   <ul class="pagination row justify-content-center pb-3 mt-n4">
                                       <li class="page-item disabled">
                                           <a class="page-link" href="#">&laquo;</a>
                                       </li>
                                       <li class="page-item active">
                                           <a class="page-link" href="#">1</a>
                                       </li>
                                       <li class="page-item">
                                           <a class="page-link" href="#">&raquo;</a>
                                       </li>
                                   </ul>
                               </div>



                           </div>
                       </div>


                       <div class="tab-pane fade" id="v-pills-users" role="tabpanel"
                           aria-labelledby="v-pills-users-tab">

                           <div class="container p-4">

                               <h4 class="text-shadow">MANAGE USERS</h4>
                               <span class="text-muted">View user info. Ban and restrict users.</span>

                               <form action="">

                                   <div class="form-row">
                                       <div class="col-lg-9 col-sm-12  my-3">

                                           <div class="input-group  w-50">
                                               <input type="text" class="form-control bg-dark text-light"
                                                   placeholder="Search for a user..." aria-label="Search for a user..."
                                                   aria-describedby="basic-addon2">
                                               <div class="input-group-append">
                                                   <span class="input-group-text" id="basic-addon2"><i
                                                           class="fas fa-search"></i></span>
                                               </div>
                                           </div>
                                       </div>

                                       <span class="my-auto col-lg-1 col-sm-2">Sort by </span>

                                       <div class="col-lg-2 col-md-4 my-auto">
                                           <select name="SortBy" class="form-control bg-dark text-light">
                                               <option value="User">User</option>
                                               <option value="Status">Ban Status</option>
                                               <option value="Price">Total Spent</option>
                                           </select>
                                       </div>

                                   </div>
                               </form>


                               <table class="table borderless table-hover">
                                   <thead>
                                       <tr>
                                           <th scope="col"><a href="#"> #ID</a></th>
                                           <th scope="col"><a href="#">Username</a></th>
                                           <th scope="col" class="d-none d-lg-table-cell"><a href="#">Purchases</a>
                                           </th>
                                           <th scope="col"><a href="#">Total Spent</a></th>
                                           <th scope="col"><a href="#">Reports</a></th>
                                           <th scope="col"><a href="#">Review Status</a></th>
                                           <th scope="col"><a href="#">Ban Status</a></th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <tr class="table-dark" style="cursor: pointer;" data-toggle="modal"
                                           data-target="#UserModal">
                                           <th scope="row">01254</th>
                                           <td class="d-none d-lg-table-cell">the_user</td>
                                           <td>20</td>
                                           <td class="d-none d-lg-table-cell">100.50???</td>
                                           <td>3</td>
                                           <td><span style="color:green;">Allowed</span> </td>
                                           <td><span style="color:green;">Normal</span> </td>
                                       </tr>
                                       <tr class="table-dark" style="cursor: pointer;" data-toggle="modal"
                                           data-target="#UserModal">
                                           <th scope="row">012344</th>
                                           <td class="d-none d-lg-table-cell">Joao</td>
                                           <td>5</td>
                                           <td class="d-none d-lg-table-cell">50.99???</td>
                                           <td>2</td>
                                           <td><span style="color:green;">Allowed</span></td>
                                           <td><span style="color:green;">Normal</span> </td>
                                       </tr>
                                       <tr class="table-dark" style="cursor: pointer;" data-toggle="modal"
                                           data-target="#UserModal">
                                           <th scope="row">01555</th>
                                           <td class="d-none d-lg-table-cell">Andre</td>
                                           <td>3</td>
                                           <td class="d-none d-lg-table-cell">20.99???</td>
                                           <td>0</td>
                                           <td><span style="color:green;">Allowed</span> </td>
                                           <td><span style="color:green;">Normal</span> </td>
                                       </tr>
                                       <tr class="table-dark" style="cursor: pointer;" data-toggle="modal"
                                           data-target="#UserModal">
                                           <th scope="row">2354</th>
                                           <td class="d-none d-lg-table-cell">Catarina</td>
                                           <td>0</td>
                                           <td class="d-none d-lg-table-cell">0.00???</td>
                                           <td>0</td>
                                           <td><span style="color:red;">Restricted</span> </td>
                                           <td><span style="color:red;">Banned 20/12/2020</span> </td>
                                       </tr>
                                   </tbody>
                               </table>

                               <div class="container mt-5">
                                   <ul class="pagination row justify-content-center pb-3 mt-n4">
                                       <li class="page-item disabled">
                                           <a class="page-link" href="#">&laquo;</a>
                                       </li>
                                       <li class="page-item active">
                                           <a class="page-link" href="#">1</a>
                                       </li>
                                       <li class="page-item">
                                           <a class="page-link" href="#">&raquo;</a>
                                       </li>
                                   </ul>
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

   <!-- Sale Modal -->
   <div class="modal fade" id="SaleModal">
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
                   <!-- Signin Form -->
                   <form action="">

                       <div class=" form-group row mb-4 mx-3">
                           <div class="col-4 HomeNav-devInfo">the_user</div>
                           <div class="col-4 HomeNav-devInfo">SEPA Transfer</div>
                           <div class="col-4 HomeNav-devInfo">20/03/2020</div>
                       </div>

                       <!-- Products -->
                       <div class=" form-group row mb-2 mx-3">
                           <div class="col-10">Cyberpunk 2077 </div>
                           <div class="col-2">29.99???</div>
                       </div>

                       <div class=" form-group row mb-2 mx-3">
                           <div class="col-10">Hitman 3</div>
                           <div class="col-2">30.00???</div>
                       </div>

                       <!-- Total -->
                       <div class=" form-group row my-3 mx-3">
                           <div class="col-10">
                               <h5>Total</h5>
                           </div>
                           <div class="col-2">
                               <h5>59.99???</h5>
                           </div>
                       </div>

                       <!-- Submit button Row -->
                       <div class="form-group row mt-5">

                           <button class="btn btn-danger col-5 m-auto my-2 my-sm-0 btn-lg" style="width:100%;"
                               type="submit">
                               Cancel</button>

                           <button class="btn btn-success col-5 m-auto my-2 my-sm-0 btn-lg" style="width:100%;"
                               type="submit">
                               Confirm Payment</button>
                       </div>

                   </form>

               </div>
           </div>
       </div>
   </div>

   <div class="modal fade" id="UserModal">
       <div class="modal-dialog modal-lg" role="document">
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
                   <!-- Signin Form -->
                   <form action="">

                       <div class=" form-group row mb-4 mx-1">
                           <div class="col-4 HomeNav-devInfo">
                               <h4>the_user</h4>
                           </div>
                           <div class="col-4 text-success">Not Banned</div>
                           <div class="col-4 text-success">Not Restricted</div>
                       </div>

                       <div class="span mx-3">Purchase History</div>

                       <!-- Products -->
                       <table class="table table-hover container mx-3" style="width:98%;">
                           <thead>
                               <tr class="table-secondary">
                                   <th scope="col">Order ID</th>
                                   <th scope="col">Product</th>
                                   <th scope="col">Price</th>
                                   <th scope="col">Date</th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr class="table-dark">
                                   <th scope="row">#1345</th>
                                   <td>Hitman 3</td>
                                   <td>30.00???</td>
                                   <td>03/05/2020</td>
                               </tr>
                               <tr class="table-dark">
                                   <th scope="row">#4325</th>
                                   <td>Outriders</td>
                                   <td>40.00???</td>
                                   <td>06/08/2020</td>
                               </tr>
                               <tr class="table-dark">
                                   <th scope="row">#13215</th>
                                   <td>Cyberpunk 2077</td>
                                   <td>59.99???</td>
                                   <td>06/08/2020</td>
                               </tr>
                               <tr class="table-dark">
                                   <th scope="row">#134532</th>
                                   <td>GTA V</td>
                                   <td>20.99???</td>
                                   <td>01/02/2021</td>
                               </tr>
                               <tr class="table-dark">
                                   <th scope="row">#111345</th>
                                   <td>Ghostrunner</td>
                                   <td>29.99???</td>
                                   <td>03/03/2021</td>
                               </tr>
                               <tr class="table-dark">
                                   <th scope="row">
                                       <h5>Total</h5>
                                   </th>
                                   <td></td>
                                   <td>
                                       <h5>189.97???</h5>
                                   </td>
                                   <td></td>
                               </tr>
                       </table>


                       <!-- Submit button Row -->
                       <div class="form-group row mt-2">

                           <button class="btn btn-danger col-5 m-auto my-2 my-sm-0 btn-lg" style="width:100%;"
                               type="submit">
                               <i class="fas fa-gavel"></i> Ban</button>


                           <button class="btn btn-danger col-5 m-auto my-2 my-sm-0 btn-lg" style="width:100%;"
                               type="submit">
                               <i class="fas fa-hand-paper"></i> Restrict</button>
                       </div>

                   </form>

               </div>
           </div>
       </div>
   </div>

   <div class="modal fade" id="BugModal">
       <div class="modal-dialog modal-lg" role="document">
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
                   <!-- Signin Form -->
                   <form action="">

                       <div class=" form-group row mb-4 mx-1">
                           <div class="col-4 HomeNav-devInfo">
                               <h4>the_user</h4>
                           </div>
                           <div class="col-4 text-success">Not Banned</div>
                           <div class="col-4 text-success">Not Restricted</div>
                       </div>



                       <div class="span mx-3">Description</div>

                       <!-- Products -->
                       <textarea class="form-control col-11 m-auto bg-dark text-light" name="description" placeholder=""
                           readonly rows="6" required=""> Site is broken</textarea>



                       <!-- Submit button Row -->
                       <div class="form-group row mt-4">

                           <button class="btn btn-success col-5 m-auto my-2 my-sm-0 btn-lg" style="width:100%;"
                               type="submit">
                               <i class="far fa-check-circle"></i> Close</button>
                       </div>
                   </form>

               </div>
           </div>
       </div>
   </div>

   <div class="modal fade" id="RepModal">
       <div class="modal-dialog modal-lg" role="document">
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
                   <!-- Signin Form -->
                   <form action="">

                       <div class="row mx-1 col-4">User Reporting</div>

                       <div class=" form-group row mb-4 mx-1">
                           <div class="col-4 HomeNav-devInfo">
                               <h4>the_user</h4>
                           </div>
                           <div class="col-4 text-success">Not Banned</div>
                           <div class="col-4 text-success">Not Restricted</div>
                       </div>

                       <div class="row mx-1 col-4">User Reported</div>

                       <div class=" form-group row mb-4 mx-1">
                           <div class="col-4 HomeNav-devInfo">
                               <h4>another_user</h4>
                           </div>
                           <div class="col-4 text-success">Not Banned</div>
                           <div class="col-4 text-danger">Restricted</div>
                       </div>

                       <div class="span mx-3">Reported Review</div>


                       <textarea class="form-control col-11 m-auto bg-dark text-light" name="description" placeholder=""
                           readonly rows="6" required="">Offensive review...</textarea>


                       <div class="form-group row mt-4">
                           <div class="custom-control custom-checkbox mx-5">
                               <input type="checkbox" class="custom-control-input" id="customCheck1">
                               <label class="custom-control-label" for="customCheck1">Delete Review</label>
                           </div>
                       </div>

                       <div class="form-group row">
                           <div class="custom-control custom-checkbox mx-5">
                               <input type="checkbox" class="custom-control-input" id="customCheck2">
                               <label class="custom-control-label" for="customCheck2">Restrict User</label>
                           </div>
                       </div>

                       <div class="form-group row">
                           <div class="custom-control custom-checkbox mx-5">
                               <input type="checkbox" class="custom-control-input" id="customCheck3">
                               <label class="custom-control-label" for="customCheck3">Ban User</label>
                           </div>
                       </div>



                       <!-- Submit button Row -->
                       <div class="form-group row mt-4">
                           <button class="btn btn-success col-5 m-auto my-2 my-sm-0 btn-lg" style="width:100%;"
                               type="submit">
                               <i class="far fa-check-circle"></i> Close</button>
                       </div>
                   </form>

               </div>
           </div>
       </div>
   </div>


   </html>