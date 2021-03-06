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
            <a class="nav-link" id="v-pills-0-tab-2" href="{{ url('admin/sales') }}" role="tab"
                aria-controls="v-pills-sale" aria-selected="true">
                <div class="row">
                    <i class="fas fa-money-bill-wave col-1"></i>
                    <span class="col">MANAGE SALES</span>
                </div>
            </a>
            <a class="nav-link" id="v-pills-1-tab-2" href="{{ url('admin/products') }}" role="tab"
                aria-controls="v-pills-games" aria-selected="false">
                <div class="row">
                    <i class="fas fa-gamepad col-1"></i>
                    <span class="col">MANAGE GAMES</span>
                </div>
            </a>
            <a class="nav-link" id="v-pills-2-tab-2" href="{{ url('admin/users') }}" role="tab"
                aria-controls="v-pills-users" aria-selected="false">
                <div class="row">
                    <i class="fas fa-users-cog col-1"></i>
                    <span class="col">MANAGE USERS</span>
                </div>
            </a>

        </div>
    </nav>

    <div class="row">
        <nav class="col-lg-3 d-none d-lg-block">
            <div class="nav flex-column nav-pills nav-menu" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" id="v-pills-0-tab" href="{{ url('admin/sales') }}" role="tab"
                    aria-controls="v-pills-sale" aria-selected="true">
                    <div class="row">
                        <i class="fas fa-money-bill-wave col-1"></i>
                        <span class="col">MANAGE SALES</span>
                    </div>
                </a>
                <a class="nav-link" id="v-pills-1-tab" href="{{ url('admin/products') }}" role="tab"
                    aria-controls="v-pills-games" aria-selected="false">
                    <div class="row">
                        <i class="fas fa-gamepad col-1"></i>
                        <span class="col">MANAGE GAMES</span>
                    </div>
                </a>
                <a class="nav-link" id="v-pills-2-tab"  href="{{ url('admin/users') }}" role="tab"
                    aria-controls="v-pills-users" aria-selected="false">
                    <div class="row">
                        <i class="fas fa-users-cog col-1"></i>
                        <span class="col">MANAGE USERS</span>
                    </div>
                </a>
            </div>
        </nav>

        <div class="col bg-dark mb-4">

            <div class="tab-pane fade" id="v-pills-0" role="tabpanel" aria-labelledby="v-pills-2-tab">
            @if (isset($tab_id) && $tab_id == 0)
                @include('pages.admin.sales')
            @endif
            </div>

            <div class="tab-pane fade" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-2-tab">
            @if (isset($tab_id) && $tab_id == 1)
                @include('pages.admin.games')
            @endif
            </div>

            <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
            @if (isset($tab_id) && $tab_id == 2)
                @include('pages.admin.users')
            @endif
            </div>



        </div>
    </div>
</section>

<!-- Activate correct tab on startup  -->
<script type="text/javascript"> activateTab({{$tab_id}} ) </script>


@endsection