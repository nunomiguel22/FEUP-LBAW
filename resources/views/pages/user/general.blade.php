
@section('breadcrumbs')
<!-- Breadcrumbs -->
<nav class="container my-4">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"> <a href="{{ route('homepage') }}"> Home </a></li>
        <li class="breadcrumb-item"> <a href="{{ route('user') }}"> User panel </a></li>
        <li class="breadcrumb-item active" aria-current="page"> General </li>
    </ol>
</nav>
@endsection



<div class="container mt-4 px-0">
    <h4 class="text-shadow">GENERAL</h4>
    <span class="text-muted">View and manage your general account details</span>

    <form method="POST" action="/user/edit"  enctype="multipart/form-data">
        @csrf
        @method('PUT')

            <h4 class="mt-5 text-shadow"> Account Info</h4>
            <span class="text-muted">Manage your account details</span>

            <div class="row mx-auto mt-4">
                <label for="username" class="control-label text-light col-5">Display Name</label>
            </div>

            <div class="row mt-2 mx-auto">
                <input type="text" name="username" class="form-control col-5 text-field my-auto  bg-secondary text-light"
                    style="height:50px" placeholder="*Display Name" value="{{Auth::user()->username ?? null}}">
            </div>

            <hr>

            <h4 class="mt-5 text-shadow"> Personal Info</h4>
            <span class="text-muted">Manage your personal details</span>

            <div class="row mx-auto mt-4">
                <label for="first_name" class="control-label text-light col-5">First Name</label>
                <div class="col-1"></div>
                <label for="last_name" class="control-label text-light col-5">Last Name</label>
            </div>

            <div class="row mt-2 mx-auto">
                <input type="text" name="first_name" class="form-control col-5 text-field my-auto  bg-secondary text-light"
                    style="height:50px" placeholder="*First Name" value="{{Auth::user()->first_name ?? null}}">

                <div class="col-1"></div>

                <input type="text" name="last_name" class="form-control col-5 text-field my-auto  bg-secondary text-light"
                    style="height:50px" placeholder="*Last Name" value="{{Auth::user()->last_name ?? null}}">
            </div>

            <div class="row mx-auto mt-4">
                <label for="nif" class="control-label col-5 text-light">NIF</label>
            </div>

            <div class="row mt-2 mx-auto ">
            <input type="text" name="last_name" class="form-control col-5 text-field my-auto  bg-secondary text-light"
                    style="height:50px" placeholder="*NIF" value="{{Auth::user()->nif ?? null}}">
            </div>

            <hr>

            <h4 class="text-shadow mt-5">Address</h4>
            <span class="text-muted">View and manage your address</span>

            <div class="row mx-auto mt-4">
                <label for="line1" class="control-label text-light col-5">Address Line 1</label>
                <div class="col-1"></div>
                <label for="line2" class="control-label text-light col-5">Address Line 2</label>
            </div>

            <div class="row mt-2 mx-auto">
                <input type="text" name="price" class="form-control col-5 bg-secondary text-white"
                    style="height:50px" placeholder="*Address Line 1" value="{{Auth::user()->address->line1 ?? null}}">

                <div class="col-1"></div>

                <input type="text" name="price" class="form-control col-5 bg-secondary text-white"
                    style="height:50px" placeholder="*Address Line 2" value="{{Auth::user()->address->line2 ?? null}}">
            </div>

            <div class="row mx-auto mt-4">
                <label for="city" class="control-label text-light col-5">City</label>
                <div class="col-1"></div>
                <label for="region" class="control-label text-light col-2">Region</label>
                <label for="postal_code" class="control-label text-light col-3">Postal Code</label>
            </div>

            <div class="row mt-2 mx-auto">
                <input type="text" name="price" class="form-control col-5 bg-secondary text-white"
                    style="height:50px" placeholder="*City" value="{{Auth::user()->address->city ?? null}}">

                <div class="col-1"></div>

                <input type="text" name="price" class="form-control mr-1 col-2 bg-secondary text-white"
                    style="height:50px" placeholder="*Region" value="{{Auth::user()->address->region ?? null}}">

                <input type="text" name="price" class="form-control col-3 bg-secondary text-white"
                    style="height:50px" placeholder="*Postal Code" value="{{Auth::user()->address->postal_code ?? null}}">
            </div>

            <div class="row mx-auto mt-4">
                <label for="country" class="control-label col-5 text-light">Country</label>
            </div>

            <div class="row mx-auto ">
                <select name="country" class="form-control col-5 bg-secondary text-white"
                    style="height:50px">
                    @forelse($countries as $country)
                    @if($country->id === (Auth::user()->address->country->id ?? null))
                    <option selected="selected" value="{{$country->id}}">{{$country->name}}</option>
                    @else
                    <option value="{{$country->id}}">{{$country->name}}</option>
                    @endif
                    @empty
                    @endforelse
                </select>
            </div>

            <hr>

            <h4 class="text-shadow mt-5">Image</h4>
            <span class="text-muted">View and update your image</span>

            <div class="row my-1"></div>

            <div class="col-6">
                        <div class="row col-5 mt-2">
                            <img src="{{ Auth::user()->image->getPath() }}" style="max-height:150px; max-width:150px;"
                            class="align-self-start border b-shadow w-100" alt="...">
                        </div>
                        
                        <div class="row mt-2">
                            <label for="image" class="col control-label text-light">Add new Image</label>
                        </div>
                        <div class="row">
                            <input type="file" name="image" class="col mt-2">
                        </div>
            </div>

            <hr>

            <div class="row">
                    <div class="col-6">
                        <button class="btn btn-success my-4 btn-lg w-100" type="submit">
                            SAVE CHANGES</button>
                    </div>
            </div>

    </form>
</div>


