
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
                    style="height:50px" minlength="1" maxlength="60" placeholder="*Display Name" value="{{Auth::user()->username ?? null}}" required>
            </div>

            @if ($errors->has('username'))
            <div class="row mb-3">
                <span class="error col-5">{{ $errors->first('username') }}</span>
            </div>
            @endif

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
                    style="height:50px" minlength="1" maxlength="60" placeholder="*First Name" value="{{Auth::user()->first_name ?? null}}" required>

                <div class="col-1"></div>

                <input type="text" name="last_name" class="form-control col-5 text-field my-auto  bg-secondary text-light"
                    style="height:50px" minlength="1" maxlength="60" placeholder="*Last Name" value="{{Auth::user()->last_name ?? null}}" required>
            </div>

            @if ($errors->has('first_name') || $errors->has('last_name'))
            <div class="row mb-3">
                <span class="error col-5">{{ $errors->first('first_name') }}</span>
                <div class="col-1"></div>
                <span class="error col-5 pl-0">{{ $errors->first('last_name') }}</span>
            </div>
            @endif

            <div class="row mx-auto mt-4">
                <label for="description" class="control-label col-5 text-light">Description</label>
                <div class="col-1"></div>
                <label for="nif" class="control-label col-5 text-light">NIF</label>
            </div>

            <div class="row mt-2 mx-auto ">
                    <input type="text" name="description" class="form-control col-5 text-field my-auto  bg-secondary text-light"
                    style="height:50px" maxlength="500" placeholder="Add a Description" value="{{Auth::user()->description ?? null}}">

                    <div class="col-1"></div>

                    <input type="text" name="nif" class="form-control col-5 text-field  bg-secondary text-light"
                    style="height:50px" maxlength="20" placeholder="NIF" value="{{Auth::user()->nif ?? null}}">
            </div>

            @if ($errors->has('nif') || $errors->has('description'))
            <div class="row mb-3">
                <span class="error col-5">{{ $errors->first('description') }}</span>
                <div class="col-1"></div>
                <span class="error col-5">{{ $errors->first('nif') }}</span>
            </div>
            @endif

            <hr>

            <h4 class="text-shadow mt-5">Address</h4>
            <span class="text-muted">View and manage your address</span>

            <div class="row mx-auto mt-4">
                <label for="line1" class="control-label text-light col-5">Address Line 1</label>
                <div class="col-1"></div>
                <label for="line2" class="control-label text-light col-5">Address Line 2</label>
            </div>

            <div class="row mt-2 mx-auto">
                <input type="text" name="line1" class="form-control col-5 bg-secondary text-white"
                    style="height:50px" minlength="1" maxlength="100" placeholder="*Address Line 1" value="{{Auth::user()->address->line1 ?? null}}" required>

                <div class="col-1"></div>

                <input type="text" name="line2" class="form-control col-5 bg-secondary text-white"
                    style="height:50px" minlength="1" maxlength="100" placeholder="Address Line 2" value="{{Auth::user()->address->line2 ?? null}}">
            </div>

            @if ($errors->has('line1') || $errors->has('line2'))
            <div class="row mb-3">
                <span class="error col-5">{{ $errors->first('line1') }}</span>
                <div class="col-1"></div>
                <span class="error col-5 pl-0">{{ $errors->first('line2') }}</span>
            </div>
            @endif

            <div class="row mx-auto mt-4">
                <label for="city" class="control-label text-light col-5">City</label>
                <div class="col-1"></div>
                <label for="region" class="control-label text-light col-2">Region</label>
                <label for="postal_code" class="control-label text-light col-3">Postal Code</label>
            </div>

            <div class="row mt-2 mx-auto">
                <input type="text" name="city" class="form-control col-5 bg-secondary text-white"
                    style="height:50px" minlength="1" maxlength="60" placeholder="*City" value="{{Auth::user()->address->city ?? null}}" required>

                <div class="col-1"></div>

                <input type="text" name="region" class="form-control mr-1 col-2 bg-secondary text-white"
                    style="height:50px" minlength="1" maxlength="60" placeholder="*Region" value="{{Auth::user()->address->region ?? null}}" required>

                <input type="text" name="postal_code" class="form-control col-3 bg-secondary text-white"
                    style="height:50px" minlength="1" maxlength="20" placeholder="*Postal Code" value="{{Auth::user()->address->postal_code ?? null}}" required>
            </div>

            @if ($errors->has('city') || $errors->has('region') || $errors->has('postal_code'))
            <div class="row mb-3">
                <span class="error col-5">{{ $errors->first('city') }}</span>
                <div class="col-1"></div>
                <span class="error col-2 pl-0">{{ $errors->first('region') }}</span>
                <span class="error col-3 pl-0">{{ $errors->first('postal_code') }}</span>
            </div>
            @endif

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

            @if ($errors->has('country'))
            <div class="row mb-3">
                <span class="error col-5">{{ $errors->first('country') }}</span>
            </div>
            @endif

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
                            <input type="file" name="image" accept="image/*" class="col mt-2">
                        </div>
            </div>

            @if ($errors->has('image'))
            <div class="row mb-3">
                <span class="error col-5">{{ $errors->first('image') }}</span>
            </div>
            @endif

            <hr>

            <div class="row">
                    <div class="col-6">
                        <button class="btn btn-success my-4 btn-lg w-100" type="submit">
                            SAVE CHANGES</button>
                    </div>
            </div>

    </form>
</div>


