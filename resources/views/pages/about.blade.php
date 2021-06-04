@extends('layouts.app')

@section('title', 'OGS')

@section('breadcrumbs')
<!-- Breadcrumbs -->
<nav class="container my-4 p-0">
  <ol class="breadcrumb m-0 p-0">
    <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">About</li>
  </ol>
</nav>
@endsection


@section('content')

<div class="container" style="padding:2% 0% 5%;">
  <div class="jumbotron">
    <h1 class="display-4">About</h1>
    <p>Online Game Shop is a website where you can find various games and buy digital keys to get them. This way, you
      can manage your colection of games, browse reviews, make your own reviews of games you bought, and even gift
      games to your friends and see what games they have. You also have a wishlist of games so you can keep track of
      all the games you're interested in to buy later.</p>

    <p>This website was developed by:</p>
    <ul class="px-3">
      <li>
        <h6><span class="text-info">Abel Augusto Dias Tiago</span>, ei11102@fe.up.pt, up201107963@g.uporto.pt</h6>
      </li>
      <li>
        <h6><span class="text-info">João Nuno Diegues Vasconcelos</span>, up201504397@fe.up.pt, up201504397@g.uporto.pt
        </h6>
      </li>
      <li>
        <h6><span class="text-info">Nuno Duarte Ferreira Neves Mourinha Gonçalves</span>, up201706864@fe.up.pt,
          up201706864@g.uporto.pt</h6>
      </li>
      <li>
        <h6> <span class="text-info">Nuno Miguel Fernandes Marques</span>, up201708997@fe.up.pt,
          up201708997@g.uporto.pt,
          nunomiguel22@gmail.com</h6>
      </li>
    </ul>
    <a class="btn btn-primary btn-lg" href="{{ route('homepage') }}" role="button">Back to Homepage</a>
  </div>
</div>


@endsection