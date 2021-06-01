
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


    <h4 class="mt-5 text-shadow"> Account Info</h4>
    <span class="text-muted">Manage your account details</span>

    <form action="">
        <div class="row mx-auto mt-4">
            <h6 class="col m-0 p-0 text-light">Display Name</h6>
            <h6 class="col text-light">Email</h6>
        </div>
        <div class="row mt-2 mx-auto">
            <input type="text" class="form-control col-5 bg-secondary text-white"
                style="height:50px" placeholder="*Display Name" value="the_user">

            <div class="col-1"></div>

            <input type="text" class="form-control col-5 bg-secondary text-white"
                style="height:50px" placeholder="*Email" value="the_user@email.com">
        </div>
        <hr>
        <h4 class="mt-5 text-shadow"> Personal Info</h4>
        <span class="text-muted">Manage your personal details</span>

        <div class="row mx-auto mt-4">
            <h6 class="col m-0 p-0 text-light">First Name</h6>
            <h6 class="col text-light">Last Name</h6>
        </div>
        <div class="row mt-2 mx-auto">
            <input type="text" class="form-control col-5 bg-secondary text-white"
                style="height:50px" placeholder="*First Name" value="My">

            <div class="col-1"></div>

            <input type="text" class="form-control col-5 bg-secondary text-white"
                style="height:50px" placeholder="*Last Name" value="Name">

        </div>

        <div class="row mx-auto mt-4">
            <h6 class="col m-0 p-0 text-light">Country/Region</h6>
            <h6 class="col text-light">NIF</h6>
        </div>
        <div class="row mx-auto ">
            <select class="form-control col-5 bg-secondary text-white" name="Country"
                style="height:50px">
                <option value="Portugal" default>Portugal</option>
                <option value="Spain">Spain</option>
                <option value="France">France</option>
                <option value="Germany">Germany</option>
            </select>
            <div class="col-1"></div>

            <input type="text" class="form-control col-5 bg-secondary text-white"
                style="height:50px" placeholder="*NIF" value="024156988">
        </div>
        <hr>
        <h4 class="text-shadow mt-5">Address</h4>
        <span class="text-muted">View and manage your address</span>

        <div class="row mx-auto mt-4">
            <h6 class="col m-0 p-0 text-light">Address Line 1</h6>
            <h6 class="col text-light">Address Line 2</h6>
        </div>
        <div class="row mt-2 mx-auto">
            <input type="text" class="form-control col-5 bg-secondary text-white"
                style="height:50px" placeholder="*Address Line 1" value="Rua 9">

            <div class="col-1"></div>

            <input type="text" class="form-control col-5 bg-secondary text-white"
                style="height:50px" placeholder="*Address Line 2" value="151 1E">
        </div>


        <div class="row mx-auto mt-4">
            <h6 class="col-5 m-0 p-0 text-light">City</h6>
            <div class="col-1"></div>
            <h6 class="col-2 m-0 p-0 text-light">Region</h6>
            <h6 class="col-2 text-light">Postal Code</h6>
        </div>
        <div class="row mt-2 mx-auto">
            <input type="text" class="form-control col-5 bg-secondary text-white"
                style="height:50px" placeholder="*City" value="Evora">

            <div class="col-1"></div>

            <input type="text" class="form-control mr-1 col-2 bg-secondary text-white"
                style="height:50px" placeholder="*Region" value="Alentejo">

            <input type="text" class="form-control col-3 bg-secondary text-white"
                style="height:50px" placeholder="*Postal Code" value="444-5555">
        </div>




        <button class="btn btn-lg btn-info mt-5" type="submit">Save Changes</button>

    </form>
</div>
