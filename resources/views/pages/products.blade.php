@extends('layouts.app')

@section('title', 'OGS')

@section('scripts')
<script src="{{ asset('bootstrap/jquery.twbsPagination.min.js') }}" defer></script>
<script src="{{ asset('js/products.js') }}" defer></script>

@endsection


@section('content')


<!-- Game list -->
<div class="container p-0">
    <!-- Breadcrumbs -->
    <aside class="row mx-0 mt-3 p-0">
        <ol class="breadcrumb m-0 p-0">
            <li class="breadcrumb-item"><a href="/index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Products</li>
        </ol>
    </aside>


    <section class="row my-4">

        <div class="col-lg-9 col-md-12">

            <form class="container search-criteria mb-4 bg-dark py-2">

                <div class="form-row">
                    <div class="col-5 my-3">
                        <div class="input-group">
                            <input type="text" class="form-control bg-dark text-light"
                                placeholder="Search for a title..." aria-label="Search for a title..."
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 mx-auto my-auto" id="list-loader"></div>
                    <div class="col-5 my-auto">
                        <div class="row">
                            <span class="col-3 my-auto">Sort by </span>
                            <div class="col-9">

                                <select name="SortBy" class="form-control bg-dark text-light">
                                    <option value="popularity">Popularity</option>
                                    <option value="newReleases">New Releases</option>
                                    <option value="topRated">Top Rated</option>
                                </select>
                            </div>

                        </div>
                    </div>


                </div>
            </form>

            <section id="game-list" class="container" style="padding-bottom:40px;">
                <!-- DYNAMIC LIST OF GAMES -->
            </section>
            <!-- Next page and previous page buttons -->

            <aside id="list-links" class="container">

            </aside>
        </div>


        <div class="col-lg-3 d-none d-lg-block">

            <div class="card d-flex text-white bg-secondary mr-3 row">
                <div class="card-header">Search Results</div>
                <div class="card-body">
                    <span class="text-light">Showing <span class="text-white">6</span> results,
                        use the filters below to further narrow down your search.</span>
                </div>
            </div>

            <div class="card mt-2 d-flex text-white text-center bg-secondary mr-3 row">
                <div class="card-header">Price</div>
                <div class="card-body">

                    <input type="range" class="custom-range w-75" id="customRange1">
                    <label for="customRange1">Under 60,--€</label>
                </div>
            </div>

            <div class="card mt-2 d-flex text-white text-center bg-secondary mr-3 row">
                <div class="card-header">Category</div>
                <div class="card-body">

                    <select name="SortBy" class="form-control bg-dark text-light mb-3">
                        <option value="Any">Any</option>
                        <option value="newReleases">New Releases</option>
                        <option value="topRated">Top Rated</option>
                    </select>
                </div>
            </div>




        </div>
    </section>
</div>




@endsection