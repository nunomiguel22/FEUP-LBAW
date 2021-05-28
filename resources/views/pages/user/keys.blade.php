@section('breadcrumbs')
<!-- Breadcrumbs -->
<nav class="container my-4">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"> <a href="{{ route('homepage') }}"> Home </a></li>
        <li class="breadcrumb-item"> <a href="{{ route('user') }}"> User panel </a></li>
        <li class="breadcrumb-item active" aria-current="page"> My keys </li>
    </ol>
</nav>
@endsection


<div class="container mt-4 px-0">
    <h4 class="text-shadow">MY KEYS</h4>
    <div class="row">
        <div class="col-8">
            <span class="text-muted">Browser your purchase history and game keys</span>
        </div>
        <div class="col-4">
            <span class="text-muted">Filter status</span>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <input type="text" class="form-control bg-secondary text-light w-100 mt-2" placeholder="Search for a game"
                id="key_search_field">
        </div>
        <div class="col-4">
            <select id="key_filter" class="form-control mt-2 bg-secondary text-light">
                <option selected="selected">All</option>
                <option value="Completed">Completed</option>
                <option value="Pending">Pending</option>
                <option value="Aborted">Aborted</option>
            </select>
        </div>
    </div>
</div>


<aside class="container mt-3">
    <article class="row">
        <div class="col-3 col-md-4 my-auto mx-0 p-1 text-light">TITLE</div>
        <div class="col col-md-1 my-auto mx-0 p-1 text-light">PRICE</div>
        <div class="col my-auto mx-0 p-1 text-light">DATE</div>
        <div class="col my-auto mx-0 p-1 text-light">PAYMENT<br>METHOD</div>
        <div class="col my-auto mx-0 p-1 text-light">STATUS</div>
        <div class="col my-auto mx-0 p-1 text-light">KEY</div>
    </article>

</aside>
<hr>

<section id="key_list" class="container mb-3">


</section>

<aside id="spinner_loader" class="row my-3"></aside>

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

                <div class="row mt-4">
                    <h4 id="modal_title" class="col text-light"></h4>
                </div>

                <div class="row my-2">
                    <span class="col">Product Key</span>
                </div>

                <div class="row">
                    <div class="col">
                        <input id="modal_key" type="text" class="form-control text-light bg-secondary" readonly>
                    </div>
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

                </div>
            </div>
        </div>
    </div>
</aside>