@extends('layouts.app')

@section('title', 'OGS')


@section('scripts')
<script src="{{ asset('js/tab_navigation.js') }}"></script>
@endsection

@section('content')



<!-- Page Content -->
<section class="container">
    <!-- Breadcrumbs -->
    <div class="row mx-0 my-3 p-0">
        <ol class="breadcrumb m-0 p-0">
             <li class="breadcrumb-item"> <a href="{{ route('homepage') }}"> Home </a></li>
            <li class="breadcrumb-item active" aria-current="page"> Admin Panel </li>
        </ol>
    </div>

    <nav class="row d-lg-none d-sm-block mb-2">
        <div class="nav flex-column nav-pills nav-menu w-100" id="v-pills-tab" role="tablist"
            aria-orientation="vertical">
            <a class="nav-link" id="v-pills-0-tab-2" href="{{ url('admin/sales') }}" role="tab"
                aria-controls="v-pills-sale" aria-selected="true">
                <i class="fas fa-money-bill-wave mr-3"></i> SALES
            </a>
            <a class="nav-link" id="v-pills-1-tab-2" href="{{ url('admin/products') }}" role="tab"
                aria-controls="v-pills-games" aria-selected="false">
                <i class="fas fa-gamepad mr-3"></i>MANAGE GAMES
            </a>
            <a class="nav-link" id="v-pills-3-tab-2" data-toggle="pill" href="#v-pills-3" role="tab"
                aria-controls="v-pills-users" aria-selected="false">
                <i class="fas fa-users-cog mr-3"></i>MANAGE USERS
            </a>
            <a class="nav-link" id="v-pills-4-tab-2" data-toggle="pill" href="#v-pills-4" role="tab"
                aria-controls="v-pills-reports" aria-selected="false">
                <i class="fas fa-bug mr-3"></i></i> MANAGE REPORTS
            </a>

        </div>
    </nav>

    <div class="row">
        <nav class="col-lg-3 d-none d-lg-block">
            <div class="nav flex-column nav-pills nav-menu" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" id="v-pills-0-tab" href="{{ url('admin/sales') }}" role="tab"
                    aria-controls="v-pills-sale" aria-selected="true">
                    <i class="fas fa-money-bill-wave mr-3"></i> SALES
                </a>
                <a class="nav-link" id="v-pills-1-tab" href="{{ url('admin/products') }}" role="tab"
                    aria-controls="v-pills-games" aria-selected="false">
                    <i class="fas fa-gamepad mr-3"></i>MANAGE GAMES
                </a>
                <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab"
                    aria-controls="v-pills-users" aria-selected="false">
                    <i class="fas fa-users-cog mr-3"></i>MANAGE USERS
                </a>
                <a class="nav-link" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab"
                    aria-controls="v-pills-reports" aria-selected="false">
                    <i class="fas fa-bug mr-3"></i></i> MANAGE REPORTS
                </a>
            </div>
        </nav>

        <div class="col bg-dark mb-4">

            <div class="tab-pane fade" id="v-pills-0" role="tabpanel" aria-labelledby="v-pills-2-tab">
                
            </div>

            <div class="tab-pane fade" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-2-tab">
                
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