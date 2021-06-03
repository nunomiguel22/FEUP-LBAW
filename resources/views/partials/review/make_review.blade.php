<section class="contact-form-section mb-5">
    <div class="container">
        <form id="contact-form" class="contact-form" novalidate="novalidate">
            <input id="form_review_score" name="score" type="numeric" value="3" hidden="true" min="0" max="5">
            <div class="row">
                <h3 class="col text-center">Write a review</h3>
            </div>
            <div class="row mb-3">
                <span class="col text-center">In order to help others, please leave a review</span>
            </div>

            <div class="row">
                <div class="row mb-3">
                    <span class="col text-light">Your review</span>
                </div>

                <a class="review-rating col" href="#" onclick="return false;" align="right">
                    <i class="fas fa-star text-warning" score="1"></i>
                    <i class="fas fa-star text-warning" score="2"></i>
                    <i class="fas fa-star text-warning" score="3"></i>
                    <i class="far fa-star text-warning" score="4"></i>
                    <i class="far fa-star text-warning" score="5"></i>
                </a>

            </div>

            <div class="row">

                <textarea class="form-control bg-dark text-light w-100 col" name="description"
                    placeholder="Enter your review" maxlength="600" rows="10" required></textarea>
            </div>
            <div class="row mt-2">
                <button type="submit" class="btn btn-success py-2 col">Add review</button>
            </div>
            <!--//form-row-->
        </form>
    </div>
    <!--//container-->
</section>