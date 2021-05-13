@extends('layouts.app')

@section('title', 'OGS')


@section('scripts')
<script src="{{ asset('js/tab_navigation.js') }}"></script>
@endsection


@section('content')
<section class="container">

    <nav class="row d-lg-none d-sm-block mb-2">
        <div class="nav flex-column nav-pills nav-menu w-100" id="v-pills-tab" role="tablist"
            aria-orientation="vertical">
            <a class="nav-link" id="v-pills-0-tab-2" href="{{ url('user/wishlist') }}" role="tab"
                aria-controls="v-pills-0" aria-selected="true">
                <i class="fas fa-hand-holding-heart mr-2"></i> WISHLIST
            </a>
            <a class="nav-link" id="v-pills-1-tab-2" href="{{ url('user/general') }}" role="tab"
                aria-controls="v-pills-1" aria-selected="false">
                <i class="fas fa-user mr-3"></i>GENERAL
            </a>
            <a class="nav-link" id="v-pills-3-tab-2"  href="{{ url('user/security') }}" role="tab"
                aria-controls="v-pills-3" aria-selected="false">
                <i class="fas fa-key mr-3"></i>PASSWORD & SECURITY
            </a>
            <a class="nav-link" id="v-pills-2-tab-2" href="{{ url('user/keys') }}" role="tab"
                aria-controls="v-pills-2" aria-selected="false">
                <i class="fas fa-history mr-3"></i>MY KEYS
            </a>
            <a class="nav-link" id="v-pills-4-tab-2" href="{{ url('user/avatar') }}" role="tab"
                aria-controls="v-pills-4" aria-selected="false">
                <i class="fas fa-image mr-3"></i></i> AVATAR
            </a>

        </div>
    </nav>

    <div class="row">
        <nav class="col-lg-3 d-none d-lg-block">
            <div class="nav flex-column nav-pills nav-menu" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" id="v-pills-0-tab"  href="{{ url('/user/wishlist') }}" role="tab"
                    aria-controls="v-pills-sale" aria-selected="true">
                    <i class="fas fa-hand-holding-heart mr-2"></i> WISHLIST
                </a>
                <a class="nav-link" id="v-pills-1-tab" href="{{ url('user/general') }}"  role="tab"
                    aria-controls="v-pills-games" aria-selected="false">
                    <i class="fas fa-user mr-3"></i>GENERAL
                </a>
                <a class="nav-link" id="v-pills-3-tab" href="{{ url('user/security') }}" role="tab"
                    aria-controls="v-pills-users" aria-selected="false">
                    <i class="fas fa-key mr-3"></i>PASSWORD & SECURITY
                </a>
                <a class="nav-link" id="v-pills-2-tab" href="{{ url('user/keys') }}" role="tab"
                aria-controls="v-pills-2" aria-selected="false">
                     <i class="fas fa-history mr-3"></i>MY KEYS
                </a>
                <a class="nav-link" id="v-pills-4-tab" href="{{ url('user/avatar') }}" role="tab"
                    aria-controls="v-pills-reports" aria-selected="false">
                    <i class="fas fa-image mr-3"></i></i> AVATAR
                </a>
            </div>
        </nav>

        <div class="col bg-dark mb-4">

            <div class="tab-pane fade" id="v-pills-0" role="tabpanel" aria-labelledby="v-pills-2-tab">
                
            </div>

            <div class="tab-pane fade" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-2-tab">
                
            </div>

            
            <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
                @if ($tab_id && $tab_id == 2)
                    @include('pages.user.keys')
                @endif

            </div>

            <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-2-tab">
                
            </div>

            <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-2-tab">
                
            </div>

        </div>
    </div>
</section>

<!-- Activate correct tab on startup  -->
<script type="text/javascript"> activateTab(<?php echo $tab_id ?>) </script>


@endsection