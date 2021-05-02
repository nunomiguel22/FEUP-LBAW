<footer class="bg-dark text-center text-lg-start">
    <section class="container p-4 row mx-auto">
        <article class="col-lg-8 col-md-12 mb-4 mb-md-0">
            <h5 class="text-uppercase">Online Game Store</h5>

            <p>
                Welcome to the Online Game Store, this website is a project developed for
                the 2021 LBAW class of the Faculty of Engineering at the University of Porto.
            </p>
            <figure>
                <img src="{{ Storage::url('images/logo/logo_transparent.png')}}" width="100" height="100" alt="">
                <img src="{{ Storage::url('images/others/logo-feup.png')}}" width="100" height="100" alt="">
            </figure>
        </article>

        <nav class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Links</h5>

            <ul class="list-unstyled mb-0">
                <li>
                    <a href="#todo" class="text-light">About us</a>
                </li>
                <li>
                    <a href="#todo" class="text-light" data-toggle="modal" data-target="#ReportModal">Report a
                        problem</a>
                </li>
            </ul>
        </nav>
    </section>
    <aside class="text-center p-3" style="background-color:rgba(0, 0, 0, 0.3)">
        <span>© 2021 Copyright:</span>
        <a class="text-light" href="http://lbaw2156-piu.lbaw-prod.fe.up.pt/">OGS.com</a>
    </aside>
</footer>