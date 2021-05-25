<div class="container" style="padding-top:50px;">
    <div class="row">
        <div class="col">
            <hr style="background:white;">
        </div>
        <span><i class="fas fa-book"></i> Reviews </span>
        <div class="col">
            <hr style="background:white;">
        </div>
    </div>
</div>

<div class="container" style="padding-top:50px;">

    <div class="card mb-3">

        <div class="card-header">
            <div class="row">
                <h4 class="col" style="font-style: italic;">The_User </h4>
                <span class="col text-center text-muted">25/01/2021</span>
                <div class="review-rating col" align="right">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i> <i class="far fa-star"></i>
                </div>
            </div>
        </div>

        <div class="card-body">

            <p class="card-text ml-3 my-2">{{review->description ?? null}}</p>
            <hr style="background:white;">
            @if(Auth::check())
            <button type="button" class="btn btn-warning mb-3 ml-3">Edit your review <i class="fas fa-edit"></i></i>
            </button>
            <button type="button" class="btn btn-danger mb-3 ml-3">Delete your review <i class="fas fa-trash"></i>
            </button>
            @endif

        </div>
    </div>

</div>