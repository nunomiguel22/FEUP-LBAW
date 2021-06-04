@if(Auth::check() && !Auth::user()->hasVerifiedEmail())
<section class="row col bg-dark mt-1 mx-0 p-0" style="height:35px; ">
    <a href="{{ route('verification.notice') }}" class="col my-2 text-center text-warning">
        Verify your email to begin purchasing
    </a>
</section>
@endif