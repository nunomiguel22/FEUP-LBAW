@php
use App\Models\Category;
use App\Models\User;

$categories = Category::all();
$cart_item_count = 0;
if(Auth::check()){
$cart_item_count = Auth::user()->cart_items()->count();
}

@endphp

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
        <figure class="my-auto">
            <a class="navbar-brand" href="{{route('homepage')}}">
                <img src="{{ Storage::url('images/logo/logo_transparent2.png') }}" width="40" height="40" alt="">
            </a>
        </figure>

        <article>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </article>

        <section class="collapse navbar-collapse" id="navbarColor02">
            <nav>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">Browse Categories</a>
                        <div class="dropdown-menu mb-1">
                            @forelse($categories as $category)
                            <a class="dropdown-item text-light"
                                href="{{ route('products', ['category' => $category->id ]) }}">{{$category->name}}</a>
                            @empty
                            @endforelse
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-light" href="{{ route('products') }}">Browse All</a>
                        </div>
                    </li>
                </ul>
            </nav>

            <form type="GET" action="/products" class="form-inline mx-lg-auto w-50">
                <input class="form-control bg-secondary text-light" name="text_search" type="text"
                    placeholder="Search for a title..." style="width:85%" value="{{ $_GET['text_search'] ?? null }}">
                <button class="btn bg-transparent border-0 my-2" half-loader="true" type="submit"
                    style="margin-left:-40px;">
                    <i class="fas fa-search"></i>
                </button>
            </form>

            <nav>
                @if(Auth::guest())
                <ul class="navbar-nav">
                    <li class="nav-item ml-lg-5">
                        <a class="nav-link" href="{{ route('login')}}">
                            <i class="fas fa-user fa text-shadow"></i>
                            Login
                        </a>
                    </li>
                </ul>
                @else
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-secondary" href="{{ url('/user/cart')}}" role="button">
                            <i class="fas fa-shopping-cart mr-3"></i>
                            <span class="badge badge-light" id="cart_count_nav">{{$cart_item_count}}</span>
                            </button>
                        </a>
                    </li>

                    <li class="nav-item dropdown ml-3">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fas fa-user-cog"></i> {{Auth::user()->username}}
                        </a>

                        <article class="dropdown-menu dropdown-menu-right" style="width:40px">
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                <div class="row text-light">
                                    <i class="fas fa-id-badge col-2"></i>
                                    <span class="col-9">Profile</span>
                                </div>
                            </a>
                            <a class="dropdown-item" href="{{ route('user') }}">
                                <div class="row text-light">
                                    <i class="fas fa-user-edit col-2"></i></i>
                                    <span class="col-9">Account</span>
                                </div>
                            </a>
                            @if(Auth::user()->is_admin)
                            <a class="dropdown-item" href="{{route('admin')}}">
                                <div class="row text-light">
                                    <i class="fas fa-hammer col-2"></i>
                                    <span class="col-9">Admin Panel</span>
                                </div>
                            </a>
                            @endif
                            <a class="dropdown-item" href="{{route('logout')}}">
                                <div class="row text-light">
                                    <i class="fas fa-sign-out-alt col-2"></i>
                                    <span class="col-9">Logout</span>
                                </div>
                            </a>
                        </article>
                    </li>
                </ul>
                @endif
            </nav>
        </section>
    </nav>
    @include('partials.verification_notice')
</header>