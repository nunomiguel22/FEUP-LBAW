<div class="container px-0" style="padding-top:50px;">

    <div class="card mb-3">

        <div class="card-header">
            <div class="row">
                <h4 class="col-4" style="font-style: italic;">{{$review->user->username ?? null}} </h4>
                <span class="col-4 text-center text-white">{{$review->formattedTimestamp('d-m-Y H:i:s') ?? null}}</span>
                <div class="review-rating col-4" align="right">
                    @for ($x = 0; $x < $review->score ; $x+=1)
                        <i class="fas fa-star text-light"></i>
                    @endfor
                    @for ($x = 0; $x < 5 - $review->score ; $x+=1)
                        <i class="far fa-star text-dark"></i>
                    @endfor
                </div>
            </div>
        </div>

        <div class="card-body">

            <p class="card-text ml-3 my-2">{{$review->description ?? null}}</p>
            <hr style="background:white;">
            <div class="row">
                @if(Auth::check() && $review->user_id === Auth::user()->id)
                <button id="open_review_form" type="button" class="btn btn-warning mb-3 ml-3 col-md-3 col-5" style="min-height:45px">Edit your review <i
                        class="fas fa-edit"></i></i>
                </button>
                <form method="POST" action="/reviews/products/{{$review->game_id}}/review/{{$review->id}}" class="col-md-3 col-6">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mb-3 ml-3  w-100"  style="min-height:45px">
                        Delete your review <i class="fas fa-trash"></i>
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>

</div>