<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('homepage')}}">
        <img src="{{ Storage::url('images/logo/logo_transparent2.png') }}" width="40" height="40" alt="">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
        aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">

        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">Browse Categories</a>
                <div class="dropdown-menu">
                    @forelse($categories as $category)
                    <a class="dropdown-item" href="#">{{$category->name}}</a>
                    @empty
                    @endforelse
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('products') }}">Browse All</a>
                </div>
            </li>
        </ul>

        <form class="form-inline ml-auto mr-auto" style="width:30%">
            <input class="form-control bg-secondary text-light mr-sm-1" type="text" placeholder="Search for a title..."
                style="width:68%">
            <button class="btn btn-secondary my-2 my-sm-0" type="button"><i class="fas fa-search"></i></button>
        </form>

        @if(Auth::guest())
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login')}}">
                    <i class="fas fa-user fa text-shadow"></i>
                    Login
                </a>
            </li>
        </ul>
        @else
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="btn btn-secondary" href="/cart.php" role="button">
                    <i class="fas fa-shopping-cart mr-3"></i>
                    <span class="badge badge-light">4</span>
                    </button>
                </a>
            </li>

            <li class="nav-item dropdown ml-3">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false"><i class="fas fa-user-cog"></i> {{Auth::user()->username}}</a>
                <div class="dropdown-menu dropdown-menu-right" style="width:30px">
                    <a class="dropdown-item" href="/profile.php">
                        <i class="fas fa-id-badge"></i>
                        <span> Profile</span>
                    </a>
                    <a class="dropdown-item" href="/account.php">
                        <i class="fas fa-user-edit"></i></i>
                        <span> Account</span>
                    </a>
                    @if(Auth::user()->is_admin)
                    <a class="dropdown-item" href="{{route('admin')}}"><i class="fas fa-hammer"></i>
                        <span> Admin Panel</span>
                    </a>
                    @endif
                    <a class="dropdown-item" href="{{route('logout')}}">
                        <i class="fas fa-sign-out-alt"></i>
                        <span> Logout</span>
                    </a>
                </div>
            </li>
        </ul>
        @endif

    </div>
</nav>

@if(Auth::guest())
@include('partials.modals.login')
@include('partials.modals.register')
@endif