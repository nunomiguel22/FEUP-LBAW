@extends('layouts.app')

@section('title', 'OGS')

@section('scripts')
<script src="{{ asset('js/paginator.js') }}"></script>
<script src="{{ asset('js/products.js') }}" defer></script>

@endsection

@section('breadcrumbs')
<!-- Breadcrumbs -->
<nav class="container my-4">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Products</li>
    </ol>
</nav>
@endsection


@section('content')

<!-- Game list -->
<div class="container">

    <form method="GET" action="/products" class="row my-4">

        <div class="col-lg-9 col-md-12">

            <div class="container search-criteria mb-4 bg-dark py-2">
                <div class="row mt-2">
                    <div class="col-8"><span class="my-auto text-light">Search games</span></div>
                    <div class="col-4 pl-1"><span class="my-auto text-light">Sort by</span></div>

                </div>

                <div class="row">
                    <div class="col-8 my-2">

                        <input type="text" id="game_search_field" name="text_search"
                            class="form-control bg-secondary text-light" placeholder="Search for a title..."
                            value="{{ $_GET['text_search'] ?? null }}">


                    </div>
                    <div class="col-4 my-2 pl-1">

                        <select id="sort_by_field" name="sort_by" class="form-control bg-secondary text-light">
                            <option value="-1">Position</option>
                            @if(($_GET["sort_by"] ?? 1) == 0)
                            <option value="0" selected>Score</option>
                            @else
                            <option value="0">Score</option>
                            @endif

                            @if(($_GET["sort_by"] ?? null) == 1)
                            <option value="1" selected>Date</option>
                            @else
                            <option value="1">Date</option>
                            @endif

                            @if(($_GET["sort_by"] ?? null) == 2)
                            <option value="2" selected>Price</option>
                            @else
                            <option value="2">Price</option>
                            @endif

                        </select>

                    </div>
                </div>
            </div>

            <section id="game-list" class="container" style="padding-bottom:40px;">
                <!-- DYNAMIC LIST OF GAMES -->
            </section>
            <!-- Next page and previous page buttons -->

            <aside id="list-links" class="container">

            </aside>
        </div>

        <div class="col-lg-3 d-none d-lg-block">

            <div class="card shadow-none border-0 d-flex text-white bg-transparent mr-3 row">
                <div class="card-header bg-transparent">Search Results</div>
                <div class="card-body">
                    <span class="text-light">Showing <span class="text-white">6</span> results,
                        use the filters below to further narrow down your search.</span>
                </div>
            </div>


            <div class="card shadow-none border-0 mt-2 d-flex text-white bg-transparent mr-3 row">
                <div class="card-header bg-transparent">Price Limit</div>
                <div class="card-body text-center">
                    <input type="range" name="max_price" class="custom-range w-100" min="1" max="100"
                        value="{{ $_GET['max_price'] ?? 100 }}" id="customRange1">
                    <label id="customRangeLabel" for="customRange1">Under {{$_GET['max_price'] ?? 100}},--€</label>
                </div>
            </div>

            <div class="card shadow-none border-0 mt-2 d-flex text-white bg-transparent mr-3 row">
                <div class="card-header bg-transparent">Category</div>
                <div class="card-body">

                    <select name="category" class="form-control bg-secondary text-light mb-3">
                        <option value="-1"> Any </option>
                        @forelse($categories as $category)
                        @if($category->id == ($_GET["category"] ?? null))
                        <option value="{{ $category->id }}" selected> {{ $category->name }} </option>
                        @else
                        <option value="{{ $category->id }}"> {{ $category->name }} </option>
                        @endif
                        @empty
                        @endforelse
                    </select>
                </div>
                <button class="btn btn btn-dark w-100 mt-4" style="min-height:44px;" type="submit">
                    Apply Filters
                </button>
            </div>


        </div>


    </form>
</div>




@endsection