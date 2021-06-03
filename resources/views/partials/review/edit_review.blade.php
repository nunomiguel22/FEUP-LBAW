<section class="contact-form-section mb-5">
    <div class="container">
        <form id="contact-form" class="contact-form" novalidate="novalidate">
            <input id="form_review_score" name="score" type="numeric" value="3" hidden="true" min="0" max="5">
            <h3 class="text-center">Edit your review</h3>
            <div class="mb-3 text-center">In order to help others, please leave a review.</div>
            <div class="row col">


                <div class="review-rating row" align="right">
                    <div class="col">
                        @php
                        $i = 1;
                        @endphp
                        @for ($x = 0; $x < $user_review->score ; $x+=1)
                            <i class="fas fa-star text-warning" score="{{$i++}}"></i>
                            @endfor
                            @for ($x = 0; $x < 5 - $review->score ; $x+=1)
                                <i class="far fa-star text-warning" score="{{$i++}}"></i>
                                @endfor

                    </div>
                </div>

                <div class="row">
                    <textarea class="form-control bg-dark text-light w-100 col" name="description"
                        placeholder="Enter your review" maxlength="600" rows="10"
                        required>{{$user_review->description ?? null}}</textarea>
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-success py-2 w-100 m-0">Edit review</button>
            </div>
            <!--//form-row-->
        </form>
    </div>
    <!--//container-->
</section>