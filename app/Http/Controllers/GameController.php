<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use App\Models\Game;
use App\Models\Image;
use App\Models\Tag;

class GameController extends Controller
{
    public function search()
    {
        return Game::where('listed', '=', true)->with('developers', 'categories', 'images')->paginate(3);
    }

    public function showProducts()
    {
        return view('pages.products', []);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Game::class);

        $validator = $this->validator($request->all());

        $game = new Game();

        $game->title = $request->title;
        $game->launch_date = $request->launch_date;
        $game->developer_id = $request->developer;
        $game->category_id = $request->category;
        $game->price = $request->price;
        $game->listed = $request->listed;
        $game->description = $request->description;
        $game->save();
        
        // Images
        foreach ($request->file('images') as $image) {
            $path = Storage::disk('public')->putFile('images/games', $image);
            $game->images()->save(new Image(['path' => $path]));
        }

        // Tags
        foreach ($request->tags as $tag) {
            $tag = Tag::find($tag);
            $game->tags()->attach($tag);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:30|min:1',
            'launch_date' => 'required|date',
            'developer' => 'required|integer',
            'category' => 'required|integer',
            'price' => 'required|numeric|min:0',
            'listed' => 'required|boolean',
            'description' => 'required|string|max:200|min:1',
            'images' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'nullable',
            'tags.*' => 'string'
        ]);
    }
}
