@extends('layouts.app')

@section('title', 'OGS - Sale')

@section('breadcrumbs')
<section class="container">
    <div class="row mx-0 my-3 p-0">
        <ol class="breadcrumb m-0 p-0">
            <li class="breadcrumb-item"> <a href="{{ route('homepage') }}"> Home </a></li>
            <li class="breadcrumb-item"> <a href="{{ route('admin') }}"> Admin Panel </a></li>
            <li class="breadcrumb-item"> <a href="{{ url('admin/sales') }}"> Sales </a></li>
            <li class="breadcrumb-item active" aria-current="page"> {{ $purchase->id }} </li>
        </ol>
    </div>

</section>
@endsection

@section('content')

<section class="container">
    <section class="bg-dark p-5 my-4">
        <h4 class="text-shadow">MANAGE SALE</h4>
        <span class="text-muted">Confirm or abort sales</span>

        <div class="container px-0">

            <div class="row mt-4">
                <h5 class="col"> USERNAME </h5>
                <h5 class="col"> TITLE </h5>
                <h5 class="col"> STATUS </h5>


            </div>

            <div class="row mt-2">
                <h5 class="col text-light"> {{ $purchase->user->username }} </h5>
                <h5 class="col text-light"> {{ $purchase->game()->title }} </h5>
                <h5 class="col text-light"> {{ $purchase->status }} </h5>
            </div>

            <div class="row mt-3">
                <span class="col">Product Key</span>
            </div>

            <div class="row mt-1">
                <div class="col">
                    <input type="text" class="form-control text-light bg-secondary"
                        value="{{ $purchase->game_key->key }}" readonly>
                </div>
            </div>


            <hr>
            <div class="row my-4">
                <div class="col-4">
                    Order ID: <span class="text-light"> {{$purchase->id}} </span>
                </div>
                <div class="col">
                    Timestamp: <span class="text-light">{{ $purchase->formattedTimestamp('d-m-Y H:i:s') }}</span>
                </div>
            </div>

            <div class="row my-4">
                <div class="col-4 my-auto">
                    Price: <span id="modal_price" class="text-light">{{ $purchase->price }}</span> EUR
                </div>
                <div class="col">
                    Payment Method: <spand class="text-light"> {{ $purchase->method }} </span>
                </div>
            </div>

            <div class="row mt-3">
                <span class="col">Purchase UUID</span>
            </div>

            <div class="row mt-1">
                <div class="col">
                    <input type="text" class="form-control text-light bg-secondary"
                        value="{{ $purchase->payment_uuid }}" readonly>
                </div>
            </div>

            <div class="row mt-3">
                <form method="POST" action="/admin/sale/{{ $purchase->id }}" class="col">
                    @csrf
                    <input type="checkbox" name="confirm" checked="true" hidden>
                    <button type="submit" class="btn btn-success mb-3 w-100" style="min-height:45px">
                        Approve purchase
                    </button>

                </form>
                <form method="POST" action="/admin/sale/{{ $purchase->id }}" class="col">
                    @csrf

                    <button type="submit" class="btn btn-danger mb-3 w-100" style="min-height:45px">
                        Abort purchase
                    </button>

                </form>
            </div>

            <ul class="row">
                @foreach ($errors->all() as $error)
                <li class="error mt-2">{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    </section>
</section>

@endsection