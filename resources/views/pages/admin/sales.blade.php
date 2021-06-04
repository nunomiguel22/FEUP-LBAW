<script src="{{ asset('js/paginator.js') }}"></script>
<script src="{{ asset('js/admin_sales.js') }}"></script>

@section('breadcrumbs')
<!-- Breadcrumbs -->
<nav class="container my-4">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"> <a href="{{ route('homepage') }}"> Home </a></li>
        <li class="breadcrumb-item"> <a href="{{ route('admin') }}"> Admin panel </a></li>
        <li class="breadcrumb-item active" aria-current="page"> Manage sales </li>
    </ol>
</nav>
@endsection


<div class="container my-4 px-0">
    <h4 class="text-shadow">MANAGE SALES</h4>


    <aside class="row">
        <div class="col-10">
            <span class="text-muted">View confirm or abort purchases</span>
        </div>
    </aside>

    <aside class="container mt-3">
        <article class="row">
            <div class="col-1 text-light px-0">#ID</div>
            <div class="col-2 text-light px-0">USERNAME</div>
            <div class="col-3 text-light px-0">PRODUCT</div>
            <div class="col-2 text-light px-0">METHOD</div>
            <div class="col-2 text-light px-0">PRICE</div>
            <div class="col-2 text-light px-0">STATUS</div>
        </article>
    </aside>
    <section class="container mt-3">
        @forelse($purchases as $purchase)

        <a class="row my-2 bg-secondary" href="{{ url('/admin/sale/'.$purchase->id) }}" style="min-height:30px">
            <div class="col-1 my-auto mx-0 p-1">
                {{ $purchase->id }}
            </div>
            <div class="col-2 my-auto mx-0 p-1">
                {{ $purchase->user->username }}
            </div>
            <div class="col-3 my-auto mx-0 p-1">
                {{ $purchase->game()->title }}
            </div>
            <div class="col-2 my-auto mx-0 p-1">
                {{ $purchase->method }}
            </div>
            <div class="col-2 my-auto mx-0 p-1">
                {{ $purchase->price }}
            </div>
            <div class="col-2 my-auto mx-0 p-1">
                {{ $purchase->status }}
            </div>
        </a>

        @empty
        @endforelse
</div>

<aside id="list-links" class="container">

</aside>

<!-- Add Paginator  -->
<script type="text/javascript">
    startPaginator({{ $purchases->lastPage() }}, {{ $purchases->currentPage() }});
</script>


