@extends('layouts.app')

@section('title', 'OGS')


@section('content')


<div class="container vertical-center-jumbo">


    <div class="jumbotron bg-dark w-100 p-5">
        <h1 class="row display-4 mb-4">Thank you for choosing OGS</h1>
        <p class="row lead">To complete your purchase perform a bank transfer using the following details</p>
        <hr class="row my-4">
        <div class="row">
            <span class="text-light mr-2">Account Name:</span>
            <span>OGS</span>
        </div>
        <div class="row">
            <span class="text-light mr-2">BIC/SWIFT:</span>
            <span>ACTVPTPL</span>
        </div>
        <div class="row">
            <span class="text-light mr-2">IBAN:</span>
            <span>PT60003506511598684695806</span>
        </div>
        <div class="row">
            <span class="text-light mr-2">Amount:</span>
            <span>{{ $amount ?? null }} €</span>
        </div>
        <div class="row">
            <span class="text-danger mr-2">Include this code in the description: </span>
            <span>{{ $uuid ?? null }}</span>
        </div>

    </div>
</div>



@endsection