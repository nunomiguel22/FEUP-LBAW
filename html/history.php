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
            <li class="breadcrumb-item active"> History</li>
        </ol>
    </div>

    <!-- HEADER AREA -->

    <!-- MAIN AREA -->

    <table class="table table-hover container">
        <thead>
            <tr class="table-secondary">
                <th style="width:10%" scope="col">Order ID</th>
                <th style="width:50%" scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Date</th>
                <th scope="col">View Key</th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-dark">
                <th scope="row">#1345</th>
                <td>Hitman 3</td>
                <td>30.00€</td>
                <td>03/05/2020</td>
                <td><button class="btn btn-secondary m-0" data-toggle="modal" data-target="#KeyModal" type="submit">View
                        Key</button></td>
            </tr>
            <tr class="table-dark">
                <th scope="row">#4325</th>
                <td>Outriders</td>
                <td>40.00€</td>
                <td>06/08/2020</td>
                <td><button class="btn btn-secondary" data-toggle="modal" data-target="#KeyModal" type="submit">View
                        Key</button></td>
            </tr>
            <tr class="table-dark">
                <th scope="row">#13215</th>
                <td>Cyberpunk 2077</td>
                <td>59.99€</td>
                <td>06/08/2020</td>
                <td><button class="btn btn-secondary" data-toggle="modal" data-target="#KeyModal" type="submit">View
                        Key</button></td>
            </tr>
            <tr class="table-dark">
                <th scope="row">#134532</th>
                <td>GTA V</td>
                <td>20.99€</td>
                <td>01/02/2021</td>
                <td><button class="btn btn-secondary" data-toggle="modal" data-target="#KeyModal" type="submit">View
                        Key</button></td>
            </tr>
            <tr class="table-dark">
                <th scope="row">#111345</th>
                <td>Ghostrunner</td>
                <td>29.99€</td>
                <td>03/03/2021</td>
                <td><button class="btn btn-secondary" data-toggle="modal" data-target="#KeyModal" type="submit">View
                        Key</button></td>
            </tr>
    </table>

    <br><br>

    <!-- MAIN AREA -->
</body>

<!-- FOOTER -->
<?php
    include_once 'footer.php';
  ?>
<!-- FOOTER -->

</html>


<!-- Signin Modal -->
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