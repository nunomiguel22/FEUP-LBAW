@extends('layouts.app')

@section('title', 'OGS')


@section('breadcrumbs')
<!-- Breadcrumbs -->
<nav class="container my-4 p-0">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('user') }}">User</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/user/cart') }}">Cart</a></li>
        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
    </ol>
</nav>
@endsection


@section('content')

<section class="container mt-4 mb-5 p-4 bg-dark">
    <h4 class="text-shadow">CHECKOUT</h4>
    <span class="text-muted">Here you have an overview of your purchase, choose your payment method and
        finalize your purchase when ready</span>

    <div class="row my-5">
        <div class="col-6" style="border-right: 1px solid lightgray;">
            <h5 class="my-4">PRODUCTS</h5>

            @forelse($cart_items as $game)
            <article class="row text-muted">
                <span class="col">{{ $game->title }}</span>
                <span class="col text-right" style="overflow: auto; white-space: nowrap;">{{ $game->price }}
                    €</span>
            </article>
            @empty
            @endforelse

            <article class="row mt-5">
                <span class="col text-light">TOTAL</span>
                <span class="col text-light text-right" style="overflow: auto; white-space: nowrap;">{{ $total_price
                    }}
                    €</span>

            </article>

        </div>

        <form method="POST" action="/user/cart/checkout" class="col-5 ml-4">
            @csrf
            <h5 class="row my-4">FINALIZE YOUR PURCHASE</h5>
            <span class="text-muted row my-2">Payment Method</span>
            <select name="method" class="row form-control bg-dark text-light w-100">
                <option selected value="BankTransfer">Bank Transfer</option>
            </select>
            <button class="row btn btn-lg btn-success my-4 w-100" type="submit">PURCHASE</button>
        </form>
    </div>
    <a href="{{ url('/products') }}"> <button class="btn btn btn-secondary" type="button">
            <i class="fas fa-arrow-left"></i> Continue Shopping</button>

</section>



@endsection