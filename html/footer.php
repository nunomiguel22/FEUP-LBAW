<html>

<!-- Footer -->
<footer class="bg-dark text-center text-lg-start" style="position:sticky; top: Calc(100vh - 10em);">
    <!-- Grid container -->
    <div class="container p-4">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-lg-8 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Online Game Store</h5>

                <p>
                    Welcome to the Online Game Store, this website is a project developed for
                    the 2021 LBAW class of the Faculty of Engineering at the University of Porto.
                </p>

                <img src="/img/logo/logo_transparent.png" width="100" height="100" alt="">
                <img src="/img/others/logo-feup.png" width="100" height="100" alt="">
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Links</h5>

                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="/about.php" class="text-light">About us</a>
                    </li>
                    <li>
                        <a href="#!" class="text-light" data-toggle="modal" data-target="#ReportModal">Report a
                            problem</a>
                    </li>
                    <li>
                        <a href="/all_links.php" class="text-light">All Links</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2021 Copyright:
        <a class="text-light" href="http://lbaw2156-piu.lbaw-prod.fe.up.pt/">OGS.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

<!-- Report Problem Modal -->
<div class="modal fade" id="ReportModal">
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
                        <p>Report a problem and helps us improve your experience</p>
                    </div>
                </div>

                <!-- Signup Form -->
                <form action="">

                    <!-- Problem text Row -->
                    <div class="form-group row justify-content-center">
                        <textarea class="form-control bg-dark text-light" placeholder="Describe your problem..."
                            rows="7" style="width:85%; resize:none;"></textarea>
                    </div>

                    <!-- Submit button Row -->
                    <div class="form-group row mt-3 mb-4">
                        <button class="btn btn-secondary col-10 m-auto my-2 my-sm-0 btn-lg" style="width:100%;"
                            type="submit">
                            Submit Report</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>


</html>