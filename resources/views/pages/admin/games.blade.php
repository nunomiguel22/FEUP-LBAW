<script src="{{ asset('js/paginator.js') }}"></script>
<script src="{{ asset('js/admin_games.js') }}" defer></script>

@section('breadcrumbs')
<!-- Breadcrumbs -->
<nav class="container my-4">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"> <a href="{{ route('homepage') }}"> Home </a></li>
        <li class="breadcrumb-item"> <a href="{{ route('admin') }}"> Admin panel </a></li>
        <li class="breadcrumb-item active" aria-current="page"> Manage Games </li>
    </ol>
</nav>
@endsection

<div class="container mt-4 px-0">
    <h4 class="text-shadow">MANAGE GAMES</h4>


    <div class="row">
        <div class="col-10">
            <span class="text-muted">Edit or delete games</span>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-10">
            <input type="text" class="form-control bg-secondary text-light w-100 mt-2" placeholder="Search for a game"
                id="game_search_field">
        </div>

        <a href="{{url('/admin/products/add_product')}}" class="col-2 text-center my-auto">
            <i class="fas fa-plus-circle h4 my-auto mr-2"></i><span class="text-muted small"> Add new game</span>
        </a>


    </div>
</div>

<aside class="container mt-3">
    <article class="row">
        <div class="col-2 text-light px-0">#ID</div>
        <div class="col-6 text-light px-0">TITLE</div>
        <div class="col text-light px-0">LISTED</div>
        <div class="col text-light px-0">ACTION</div>
    </article>
</aside>
<hr>

<section id="game-list" class="container mb-3">


</section>

<aside id="spinner_loader" class="row my-3"></aside>

<aside id="list-links" class="container">

</aside>