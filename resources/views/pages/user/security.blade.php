<script src="{{ asset('js/paginator.js') }}"></script>
<script src="{{ asset('js/user_keys.js') }}" defer></script>

@section('breadcrumbs')
<!-- Breadcrumbs -->
<nav class="container my-4">
    <ol class="breadcrumb m-0 p-0">
        <li class="breadcrumb-item"> <a href="{{ route('homepage') }}"> Home </a></li>
        <li class="breadcrumb-item"> <a href="{{ route('user') }}"> User panel </a></li>
        <li class="breadcrumb-item active" aria-current="page"> My keys </li>
    </ol>
</nav>
@endsection


<div class="container mt-4 px-0">
    <h4 class="text-shadow">PASSWORD AND SECURITY</h4>
    <span class="text-muted">Manage your password and security details</span>

    <form action="">

        <h4 class="mt-5 text-shadow"> Email</h4>
        <span class="text-muted">Change your email</span>

        <div class="row mx-auto mt-4">
            <label for="new_password" class="control-label text-light col-5">New Email</label>
        </div>
        <div class="row mt-2 mx-auto">
                <input type="text" name="new_email" class="form-control col-5 bg-secondary text-white"
                    style="height:50px" placeholder="*Email">
        </div>

        <h4 class="mt-5 text-shadow">Password</h4>
        <span class="text-muted">Change your password</span>

        <div class="row mx-auto mt-4">
            <label for="old_password" class="control-label text-light col-5">Old Password</label>
        </div>

        <div class="row mx-auto ">
        <input type="text" name="old_password" class="form-control col-5 text-field my-auto  bg-secondary text-light"
                style="height:50px" placeholder="*Old Password" >
        </div>

        <div class="row mx-auto mt-4">
            <label for="new_password" class="control-label text-light col-5">New Password</label>
            <div class="col-1"></div>
            <label for="confirm_new_password" class="control-label text-light col-5">Confirm New Password</label>
        </div>

        <div class="row mt-2 mx-auto">
            <input type="text" name="new_password" class="form-control col-5 text-field my-auto  bg-secondary text-light"
                style="height:50px" placeholder="*New Password">

            <div class="col-1"></div>

            <input type="text" name="confirm_new_password" class="form-control col-5 text-field my-auto  bg-secondary text-light"
                style="height:50px" placeholder="*Confirm New Password" value=>
        </div>
        
        <hr>

        <div class="row">
                <div class="col-6">
                    <button class="btn btn-success my-4 btn-lg w-100" type="submit">
                        SAVE CHANGES</button>
                </div>
                <div class="col-6">
                    <button class="btn btn-danger my-4 btn-lg w-100" data-toggle="modal" data-target="#"
                        type="button">
                        DELETE ACCOUNT</button>
                </div>
        </div>
    
</div>

