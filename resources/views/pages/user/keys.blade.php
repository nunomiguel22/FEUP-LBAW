<div class="container mt-4 px-0">
    <h4 class="text-shadow">MY KEYS</h4>
    <div class="row">
        <div class="col-7">
            <span class="text-muted">Browser your purchase history and game keys</span>
        </div>
        <div class="col-3">
            <span class="text-muted">Filter status</span>
        </div>
    </div>
    <div class="row">
        <div class="col-7">
            <input type="text" class="form-control bg-secondary text-light w-100 mt-2" placeholder="Search for a game"
                id="key_search_field">
        </div>
        <div class="col-3">
            <select id="key_filter" class="form-control mt-2 bg-secondary text-light">
                <option selected="selected">All</option>
                <option value="Completed">Completed</option>
                <option value="Pending">Pending</option>
                <option value="Aborted">Aborted</option>
            </select>
        </div>
        <div class="col-2 my-auto" id="list-loader"></div>
    </div>
</div>


<aside class="container border border-secondary mt-3">
    <article class="row border border-primary">
        <div class="col mx-0 px-0 py-3" style="flex: 0 0 3px;"></div>
        <div class="col-3 my-auto">Title</div>
        <div class="col-2 my-auto">Price</div>
        <div class="col-2 my-auto d-none d-md-block">Date</div>
        <div class="col my-auto d-none d-md-block"> Payment Method</div>
        <div class="col-2 my-auto mr-1 d-none d-md-block">Status</div>
        <div class="col my-auto">Key</div>

    </article>
</aside>


<section id="key_list" class="container border border-secondary mb-3">


</section>

<aside id="list-links" class="container">

</aside>

<script src="{{ asset('bootstrap/jquery.twbsPagination.min.js') }}" defer></script>
<script src="{{ asset('js/user_keys.js') }}" defer></script>

<aside class="modal fade" id="gameKeyModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="container px-4">

                <!-- Modal Header -->
                <div class="row mt-4 mb-3 float-right">
                    <div class="col-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="row mt-4 mb-3">
                    <div class="col-12" align="center">
                        <img src="{{ Storage::url('images/logo/logo_transparent.png')}}" width="100" height="100"
                            alt="">
                    </div>
                </div>

                <div class="row my-4">
                    <h4 id="modal_title" class="col text-light"></h4>
                </div>
                <hr>
                <div class="row my-4">
                    <div class="col-4">
                        Order ID: <span id="modal_pid" class="text-light"></span>
                    </div>
                    <div class="col">
                        Timestamp: <span id="modal_timestamp" class="text-light"></span>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-4">
                        Status: <span id="modal_status" class="text-light"></span>
                    </div>
                    <div class="col">
                        Payment Method: <spand id="modal_pmethod" class="text-light"></span>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-4 my-auto">
                        Price: <span id="modal_price" class="text-light"></span> EUR
                    </div>
                    <div class="col">
                        <input id="modal_key" type="text" class="form-control text-light bg-secondary" readonly>
                    </div>
                </div>

            </div>
        </div>
    </div>
</aside>