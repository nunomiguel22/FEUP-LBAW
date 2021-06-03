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

<div class="container p-4">

    <h4 class="text-shadow">CHANGE YOUR LOGIN INFORMATION</h4>
    <span class="text-muted">For your security, we highly recommend that you choose a unique
        password that you don't use for any other online account</span>




    <div class="row my-5">
        <form class="col-6" method="POST" action="/user/security" style="border-right: 1px solid lightgray;">
            @csrf
            @method('PUT')
            <h6 class="text-light mt-3">CURRENT PASSWORD</h6>
            <input type="password" name="password" class="form-control mt-2 bg-secondary text-white" style="height:44px"
                placeholder="*Current Password" required>

            @if ($errors->has('password'))
            <div class="row my-2">
                <span class="error col">{{ $errors->first('password') }}</span>
            </div>
            @endif

            <h6 class="text-light mt-3">CURRENT EMAIL</h6>
            <input type="email" name="email" value="{{ old('email') ?? Auth::user()->email }}"
                class="form-control mt-2 bg-secondary text-white" style="height:44px" placeholder="Current Email">

            @if ($errors->has('email'))
            <div class="row my-2">
                <span class="error col">{{ $errors->first('email') }}</span>
            </div>
            @endif

            <h6 class="text-light mt-3">NEW PASSWORD</h6>
            <input type="password" name="new_password" class="form-control mt-2 bg-secondary text-white"
                style="height:44px" placeholder="New Password">

            @if ($errors->has('new_password'))
            <div class="row my-2">
                <span class="error col">{{ $errors->first('new_password') }}</span>
            </div>
            @endif

            <h6 class="text-light mt-3">RETYPE NEW PASSWORD</h6>
            <input type="password" name="password_confirmation" class="form-control mt-2 bg-secondary text-white"
                style="height:44px" placeholder="Retype new password">

            @if ($errors->has('password_confirmation'))
            <div class="row mt-2">
                <span class="error col">{{ $errors->first('password_confirmation') }}</span>
            </div>
            @endif

            <button class="btn btn-lg btn-info mt-3 w-100 " type="submit">SAVE CHANGES</button>


        </form>

        <div class="col-5 ml-2">
            <h6 class="text-light row my-4">YOUR PASSWORD AND EMAIL</h6>

            <span class="text-light row my-2">Your password must follow the following format:</span>

            <ul class="text-muted row pl-3">
                <li class="mt-2">Must be at least 6 characters in length</li>
                <li class="mt-2">Must contain at least one lowercase letter (a – z)</li>
                <li class="mt-2">Must contain at least one uppercase letter (A – Z)</li>
                <li class="mt-2">Must contain at least one digit (0 – 9)</li>
            </ul>

            <span class="text-light row my-3">To change your email or password you need to enter
                your current password</span>

            <span class="text-light row my-3">To change your password you type your new
                password on the new password and retype new password fields</span>

            <span class="text-light row my-2">A new email will must not be already registered
                to another account and will have to be verified again</span>

        </div>

    </div>

    <hr>
    <h6 class="text-shadow">DELETE YOUR ACCOUNT</h6>
    <div class="row mx-auto">
        <div class="col-7">
            <span class="text-muted row my-4">Click DELETE ACCOUNT to permanently delete
                your OGS account including all personal information, purchase history, whishlist
                entries, and
                pending purchases.</span>

            <span class="text-danger row my-4">THIS IS NOT REVERSIBLE, AFTER TAKING THIS
                ACTION YOUR ACCOUNT WILL NOT BE RECOVERABLE.</span>
        </div>
        <div class="col-4">
            <button class="btn btn-lg btn-danger mt-2" type="button" data-toggle="modal"
                data-target="#deleteUserModal">DELETE ACCOUNT</button>
        </div>

    </div>
</div>

<aside class="modal fade" id="deleteUserModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="container">

                <!-- Modal Header -->
                <div class="row mt-4 mb-3 float-right">
                    <div class="col-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="row mt-4 mb-3">
                    <div class="col-12" align="center">
                        <img src="{{ Storage::url('images/logo/logo_transparent.png')}}" width="100" height="100"
                            alt="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-10 ml-auto mr-auto">
                        <p>DELETE USER FROM SYSTEM</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 ml-auto mr-auto">
                        <p class="text-danger">
                            Warning: Deleting your account from the system will also delete all information
                            related to it. This includes reviews, purchase histories, wishlist selections, game keys,
                            etc, along with all your acount information. This actions is not reversible.
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5 ml-auto">
                        <form method="POST" action="/user/security">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger my-5 btn-lg w-100" type="submit">
                                CONFIRM</button>
                        </form>
                    </div>

                    <div class="col-5 mr-auto">
                        <button class="btn btn-info my-5 btn-lg w-100" type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            GO BACK</button>
                    </div>

                </div>
                </form>

            </div>
        </div>
    </div>
</aside>