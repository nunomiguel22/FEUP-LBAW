<div class="container" style="padding-top:50px;">

    <div class="card mb-3">

        <div class="card-header">
            <div class="row">
                <h4 class="col" style="font-style: italic;">{{$review->user->username ?? null}} </h4>
                <span class="col text-center text-white">{{$review->formattedTimestamp('d-m-Y H:i:s') ?? null}}</span>
                <div class="review-rating col" align="right">
                    @for ($x = 0; $x < $review->score ; $x+=1)
                        <i class="fas fa-star"></i>
                        @endfor
                        @for ($x = 0; $x < 5 - $review->score ; $x+=1)
                            <i class="far fa-star"></i>
                            @endfor
                </div>
            </div>
        </div>

        <div class="card-body">

            <p class="card-text ml-3 my-2">{{$review->description ?? null}}</p>
            <hr style="background:white;">
            @if(Auth::check() && $review->user_id === Auth::user()->id)
            <button type="button" class="btn btn-warning mb-3 ml-3">Edit your review <i class="fas fa-edit"></i></i>
            </button>
            <button type="button" class="btn btn-danger mb-3 ml-3">Delete your review <i class="fas fa-trash"></i>
            </button>
            @endif

        </div>
    </div>

</div>