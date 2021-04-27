<div class="container p-4">
    <h4 class="text-shadow">ADD A NEW GAME</h4>
    <span class="text-muted">Add a game to the platform</span>

    <h4 class="mt-5 text-shadow">GAME IDENTITY</h4>
    <span class="text-muted">Enter the basic game information</span>

    <div class="my-2 row ml-auto mb-4">
        <input type="text" class="form-control my-auto col-5  bg-secondary text-light" style="height:50px"
            placeholder="*Title">
        <div class="col-1"></div>
        <input type="text" class="form-control my-auto col-5 bg-secondary text-light" style="height:50px"
            placeholder="*Developer">
    </div>
    <div class="my-2 row mb-5 ml-auto">
        <input type="text" class="form-control my-auto col-5 bg-secondary text-light" style="height:50px"
            placeholder="*Date">
        <div class="col-1"></div>
        <input type="text" class="form-control my-auto col-5 bg-secondary text-light" style="height:50px"
            placeholder="*Price">
    </div>
    <div class="my-2 row ml-auto">
        <textarea class="form-control col-11  bg-dark text-light" name="description"
            placeholder="Enter the game's description" rows="6" required=""></textarea>
    </div>
    <hr>
    <h4 class="mt-5 text-shadow">GAME IMAGES</h4>
    <span class="text-muted">Add the cover photo and the image gallery for this game</span>

    <div class="my-2 row ">
        <div class="form-group col-12">
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input " id="inputGroupFile02">
                    <label class="custom-file-label" for="inputGroupFile02">Add galery
                        photos</label>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <h4 class="mt-5 text-shadow">CATEGORIES AND VISIBILITY</h4>
    <span class="text-muted">Select the game's tags, categories and the visibility in the
        store</span>

    <div class="row mt-4">

        <div class="col-5">
            Category
            <select name="Category" class="form-control bg-dark text-light">
                <option value="Action">Action</option>
                <option value="Adventure">Adventure</option>
                <option value="etc">etc</option>
                <option value="etc">etc</option>
            </select>
        </div>
        <div class="col-1"></div>
        <div class="col-5">
            Listed
            <select name="Category" class="form-control bg-dark text-light">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>


    </div>
    <div class="row mt-4">
        <div class="col-lg-5 col-md-6">
            <div class="row ml-auto">
                <label for="exampleSelect2 ">Tags</label>
                <select multiple="" class="form-control bg-dark text-light" id="exampleSelect2">
                    <option>Open World</option>
                    <option>Souls-like</option>
                    <option>Co-op</option>
                    <option>Story-based</option>
                    <option>Side-scroller</option>
                </select>
            </div>
            <div class="row mt-1 ml-auto">
                <input type="text" class="form-control my-auto col-6 bg-secondary text-light"
                    placeholder="*Enter a new tag">
                <button class="btn btn-info col-6" type="submit">
                    Add Tag</button>
            </div>
        </div>
    </div>

    <div class="row mt-4">

        <div class="col-8 m-auto">
            <button class="btn btn-success my-5 btn-lg w-100" type="submit">
                Add Game</button>
        </div>
    </div>

</div>