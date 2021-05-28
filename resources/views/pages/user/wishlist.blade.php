@section('breadcrumbs')
<!-- Breadcrumbs -->
<nav class="container my-4">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"> <a href="{{ route('homepage') }}"> Home </a></li>
        <li class="breadcrumb-item"> <a href="{{ route('user') }}"> User panel </a></li>
        <li class="breadcrumb-item active" aria-current="page"> Wishlist </li>
    </ol>
</nav>
@endsection

<div class="container mt-4 px-0">
    <h4 class="text-shadow">Wishlist</h4>
</div>