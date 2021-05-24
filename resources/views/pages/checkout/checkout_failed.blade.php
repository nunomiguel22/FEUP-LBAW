@extends('layouts.app')

@section('title', 'OGS')


@section('content')


<div class="container vertical-center-jumbo">


    <div class="jumbotron bg-dark w-100">
        <h1 class="display-4 mb-4 text-danger">Purchase Failed</h1>
        <p class="lead">{{ $message ?? null }}</p>
        <hr class="my-4">
    </div>
</div>



@endsection