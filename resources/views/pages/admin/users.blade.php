<script src="{{ asset('js/paginator.js') }}"></script>


@section('breadcrumbs')
<!-- Breadcrumbs -->
<nav class="container my-4">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"> <a href="{{ route('homepage') }}"> Home </a></li>
        <li class="breadcrumb-item"> <a href="{{ route('admin') }}"> Admin panel </a></li>
        <li class="breadcrumb-item active" aria-current="page"> Manage users </li>
    </ol>
</nav>
@endsection


<div class="container my-4 px-0">
    <h4 class="text-shadow">MANAGE USERS</h4>


    <aside class="row">
        <div class="col-10">
            <span class="text-muted">Manager user's status and roles</span>
        </div>
    </aside>

    <aside class="row my-3">
        <div class="col-8">
            <input id="search_input" type="number" min="1" placeholder="Search user ids"
                class="form-control bg-secondary text-light">
        </div>
        <div class="col-4">
            <button id="search_btn" type="button" class="btn btn-secondary my-auto w-100">
                Search
            </button>
        </div>
    </aside>

    <aside class="container mt-3">
        <article class="row">
            <div class="col-1 text-light px-0">#ID</div>
            <div class="col-3 text-light px-0">USERNAME</div>
            <div class="col-3 text-light px-0">EMAIL</div>
            <div class="col-2 text-light px-0">BANNED</div>
            <div class="col-3 text-light px-0">ADMIN</div>
        </article>
    </aside>
    <section class="container mt-3">

        @forelse($users as $user)
        <a class="row my-2 bg-secondary" href="" style="min-height:30px">
            <div class="col-1 my-auto mx-0 p-1">
                {{ $user->id }}
            </div>
            <div class="col-3 my-auto mx-0 p-1">
                {{ $user->username }}
            </div>
            <div class="col-3 my-auto mx-0 p-1">
                {{ $user->email }}
            </div>
            <div class="col-2 my-auto mx-0 p-1">

                <form method="POST" action="/user/{{ $user->id }}/ban">
                    @csrf
                    @method('PUT')
                    @if($user->banned)
                    <input type="checkbox" name="unban" checked="true" hidden>
                    <button type="submit" class="btn btn-success w-75 my-auto" style="min-height:45px">
                        Unban
                    </button>

                    @else
                    <button type="submit" class="btn btn-danger w-75 my-auto" style="min-height:45px">
                        Ban
                    </button>
                    @endif
                </form>
            </div>
            <div class="col-3 my-auto mx-0 p-1">

                <form method="POST" action="/user/{{ $user->id }}/admin">
                    @csrf
                    @method('PUT')
                    @if($user->is_admin)
                    <input type="checkbox" name="make_admin" checked="true" hidden>
                    <button type="submit" class="btn btn-danger w-75 my-auto" style="min-height:45px">
                        Remove admin
                    </button>

                    @else
                    <button type="submit" class="btn btn-success w-75 my-auto" style="min-height:45px">
                        Grant admin
                    </button>
                    @endif
                </form>
            </div>
        </a>
        @empty
        @endforelse
</div>

<aside id="list-links" class="container">

</aside>

<script src="{{ asset('js/admin_users.js') }}" ></script>
<!-- Add Paginator  -->
<script type="text/javascript" >
    startPaginator({{ $users->lastPage() }}, {{ $users->currentPage() }});
</script>