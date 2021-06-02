@if(Auth::check() && !Auth::user()->hasVerifiedEmail())
<section class="row bg-dark mt-1" style="height:35px; ">
    <a href="{{ route('verification.notice') }}" class="col my-2 text-center text-warning">
        Verify your email to begin purchasing
    </a>
</section>
@endif