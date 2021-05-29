    <h4 class="mt-5 text-shadow">GAME IDENTITY</h4>
    <span class="text-muted">Enter the basic game information</span>

    <div class="row my-3">
        <div class="col-6">
            <label for="title" class="control-label text-light">Title</label>
            <input type="text" name="title" class="form-control text-field my-auto bg-secondary text-light"
                placeholder="*Title" value="{{ $game->title ?? null }}" required>

        </div>

        <div class="col-6">
            <label for="date" class="control-label text-light">Launch Date</label>
            <input type="date" name="launch_date" class=" form-control text-field my-auto  bg-secondary text-light"
                value="{{ $game->launch_date ?? null }}" required>
        </div>
    </div>

    <div class="row my-2">
        <div class="col-6">
            <label for="developer" class="control-label text-light">Developer</label>
            <select name="developer" class="form-control text-field bg-secondary text-light" required>
                @forelse($developers as $developer)
                @if($developer->id === ($game->developer_id ?? null))
                <option selected="selected" value="{{$developer->id}}">{{$developer->name}}</option>
                @else
                <option value="{{$developer->id}}">{{$developer->name}}</option>
                @endif
                @empty
                @endforelse
            </select>

            <div class="row">
                <div class="col-9 pr-0">
                    <input type="text" class="form-control bg-secondary text-light"
                        placeholder="Add New Developer Name">
                </div>
                <div class="col-3 pl-0">
                    <button type="button" id="dev_adder" class="btn btn-sm btn-success my-auto"
                        style="width:100%; height:95%;">
                        +
                    </button>
                </div>
            </div>
        </div>

        <div class="col-6">
            <label for="category" class="control-label text-light">Category</label>
            <select name="category" class="form-control text-field bg-secondary text-light" required>
                @forelse($categories as $category)
                @if($category->id == ($game->category_id ?? null))
                <option selected="selected" value="{{$category->id}}">{{$category->name}}</option>
                @else
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endif
                @empty
                @endforelse
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <label for="price" class="control-label text-light">Price (€)</label>
            <input type="number" name="price" min="0" step="0.01"
                class="form-control text-field my-auto  bg-secondary text-light" placeholder="*Price"
                value="{{ $game->price ?? null }}" required>
        </div>

        <div class="col-6">

            <label for="listed" class="control-label text-light">Publicly Listed</label>

            <select name="listed" class="form-control text-field bg-secondary text-light" required>
                @if(($game->listed ?? true) == true)
                <option selected="selected" value="true">Yes</option>
                <option value="0">No</option>
                @else
                <option value="1">Yes</option>
                <option selected="selected" value="false">No</option>
                @endif
            </select>
        </div>
    </div>


    <div class="row my-4">
        <div class="col">
            <label for="description" class="control-label text-light">Description</label>
            <textarea class="form-control bg-secondary text-light" name="description"
                placeholder="Enter the game's description" rows="6" required>{{$game->description ?? ""}}</textarea>
        </div>
    </div>