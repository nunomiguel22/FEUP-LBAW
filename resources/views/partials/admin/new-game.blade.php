<section class="container p-4">
    <h4 class="text-shadow">ADD A NEW GAME</h4>
    <span class="text-muted">Add a game to the platform</span>

    <form method="POST" action="/admin/products/add_product" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('partials.admin.product-form')

        <hr>
        <h4 class="mt-5 text-shadow">IMAGES AND TAGS</h4>
        <span class="text-muted">Add the the image gallery and tags for this game</span>

        <div class="my-2 row ">

            <div class="col-6">
                <div class="row">
                    <label for="images" class="col control-label">Gallery Images</label>
                </div>
                <div class="row">
                    <input type="file" name="images[]" class="col mt-2" multiple required>
                </div>



                <div class="row">
                    <div class="col">
                        <button class="btn btn-success my-5 btn-lg w-100" type="submit">
                            Add Game</button>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <label for="tags ">Tags</label>
                <select multiple name="tags[]" class="form-control bg-dark text-light">
                    @forelse($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @empty
                    @endforelse
                </select>
                <div class="row mt-2">
                    <div class="col-9 pr-0">
                        <input type="text" class="form-control bg-secondary text-light" placeholder="Add New Tag Name">
                    </div>
                    <div class="col-3 pl-0">
                        <button type="button" id="dev_adder" class="btn btn-sm btn-success my-auto"
                            style="width:100%; height:95%;">
                            +
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>