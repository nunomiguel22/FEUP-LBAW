<section class="contact-form-section mb-5">
    <div class="container">
        <form id="contact-form" class="contact-form" novalidate="novalidate">
            <h3 class="text-center">Write a review</h3>
            <div class="mb-3 text-center">In order to help others, please leave a review.</div>
            <div class="form-row">

                <div class="review-rating col-4" align="right">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i> <i class="far fa-star"></i>
                </div>

                <div class="form-group col-12">
                    <label for="description" class="control-label">Your game review</label>
                    <textarea class="form-control bg-dark text-light" name="review" placeholder="Enter your review"
                        rows="10" required{{$review->description ?? ""}}></textarea>
                </div>

                <div class="form-group col-12">
                    <button type="submit" class="btn btn-block btn-success py-2">Add review</button>
                </div>
            </div>
            <!--//form-row-->
        </form>
    </div>
    <!--//container-->
</section>


<input name="score" type="numeric" value="3" hidden="true">