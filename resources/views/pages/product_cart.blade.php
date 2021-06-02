@extends('layouts.app')

@section('title', 'OGS')


@section('breadcrumbs')
<!-- Breadcrumbs -->
<nav class="container my-4 p-0">
  <ol class="breadcrumb m-0 p-0">
    <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('user') }}">User</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cart</li>
  </ol>
</nav>
@endsection


@section('content')

<section class="container">
  @php
  $checkout_enabled = true;
  @endphp
  @forelse($cart_items as $game)
  <div class="row bg-secondary b-shadow my-1 px-2">

    <div class="col-2 d-none d-lg-block">
      <a href="{{url('/products/'.$game->id)}}">
        <img src="{{$game->cover_image()}}" style="max-width:96px;max-height:54px;">
      </a>
    </div>

    @if(!$game->hasAvailableKeys())
    @php
    $checkout_enabled = false;
    @endphp
    <div class="col-8 m-auto">
      <div class="row">
        {{$game->title}} <span class="text-danger ml-1 small"> unavailable </span>
      </div>
      <div class="row"><span class="HomeNav-devInfo">{{$game->developer->name}}</span></div>
    </div>
    @else
    <div class="col-8 m-auto">
      <div class="row">
        {{$game->title}}
      </div>
      <div class="row"><span class="HomeNav-devInfo">{{$game->developer->name}}</span></div>
    </div>
    @endif


    <span class="col-1 my-auto text-right">{{$game->price}}€</span>

    <form class="col-1 my-auto" method="POST" action="/products/{{$game->id}}/cart">
      @csrf
      @method('DELETE')
      <button class="btn btn-secondary" type="submit" role="button"><i class="fas fa-trash"></i></button>
    </form>
  </div>

  @empty
  <div class="row bg-transparent b-shadow p-2">
    You have no games in your cart yet
  </div>

  @endforelse


  @if($cart_items->first())
  <div class="row bg-dark text-light mt-3">

    <div class="col col-sm-4 my-3">
      Estimated Total*
    </div>

    <div class="col">
      <div class="row">
        <span class="col my-3 text-right font-weight-bold" id="cart_total">{{$total_price}}€</span>
      </div>
    </div>
  </div>

  <div class="row bg-dark text-light p-2" align="right">
    <div class="col-2 col-md-8"></div>
    <form class="col-5 col-md-2" method="POST" action="/user/cart">
      @csrf
      @method('DELETE')
      <button class="w-100 btn btn-danger mb-2" style="min-height:44px;" type="submit" role="button">
        <i class="fas fa-trash"></i> Remove all
      </button>
    </form>

    @if($checkout_enabled)
    <a class="col-5 col-md-2" href="{{ url('/user/cart/checkout') }}">
      <button class="btn btn-success mb-2 w-100" style="min-height:44px;" role="button">
        <i class="fas fa-shopping-cart"></i> Checkout
      </button>
    </a>
    @else
    <a class="col-5 col-md-2">
      <button class="btn btn-success mb-2 w-100" style="min-height:44px;" role="button"
        title="One or more items are not currently available" disabled>
        <i class="fas fa-shopping-cart"></i> Checkout
      </button>
    </a>
    @endif
  </div>

  @if(!$checkout_enabled)
  <span class="row text-danger ml-1 my-3">Some items are currently unavailable, you can remove these items or try again
    later
  </span>
  @endif
  <span class="row text-light ml-1 my-3 small">*All prices include VAT where applicable</span>
  @endif
</section>

@endsection