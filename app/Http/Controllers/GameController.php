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
use App\Models\Category;

class GameController extends Controller
{
    public function search(Request $request)
    {
        $query = Game::where('listed', true);

        if ($request->category && Category::find($request->category)->exists()) {
            $query->where('category_id', $request->category);
        }

        if ($request->text_search) {
            $query->whereIn('id', Game::FTS($request->text_search));
        }

        return $query->with('developers', 'categories', 'images')->paginate(10);
    }


    public function showProducts()
    {
        return view('pages.products', []);
    }

    public function store(Request $request)
    {
        $this->authorize('modify', Game::class);

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect('admin/products/add_product')
                ->withErrors($validator)
                ->withInput();
        }

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
            $path = Image::saveOnDisk($image);
            $game->images()->save(new Image(['path' => $path]));
        }

        $tags = $request->tags ? $request->tags : array();
        // Tags
        foreach ($tags as $tag) {
            $tag = Tag::find($tag);
            $game->tags()->attach($tag);
        }

        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $this->authorize('modify', Game::class);

        $game = Game::find($id);

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect('admin/products/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }


        $game->title = $request->title;
        $game->launch_date = $request->launch_date;
        $game->developer_id = $request->developer;
        $game->category_id = $request->category;
        $game->price = $request->price;
        $game->listed = $request->listed;
        $game->description = $request->description;
        $game->save();

        
        $rem_images = $request->images_del ? $request->images_del : array();
        foreach ($rem_images as $image_id) {
            $image = Image::find($image_id);
            $game->images()->detach($image_id);
            $image->deleteFromDisk();
            $image->delete();
        }

        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $path = Image::saveOnDisk($image);
                $game->images()->save(new Image(['path' => $path]));
            }
        }

        $request_tags = $request->tags ? $request->tags : array();
        $curr_tags = $game->tags;

        foreach ($request_tags as $tag) {
            if (!$game->tags()->find($tag)) {
                $tag = Tag::find($tag);
                $game->tags()->attach($tag);
            }
        }

        foreach ($curr_tags as $tag) {
            if (!in_array($tag->id, $request_tags)) {
                $tag = Tag::find($tag->id);
                $game->tags()->detach($tag->id);
            }
        }


        return redirect('admin/products/'.$id.'/edit');
    }

    public function delete($id)
    {
        $this->authorize('modify', Game::class);

        $game = null;
        try {
            $game = Game::findOrFail($id);
        } catch (ModelNotFoundException  $err) {
            abort(404);
        }

        foreach ($game->images as $image) {
            $image->deleteFromDisk();
        }

        $game->game_keys()->delete();
        $game->images()->delete();
        $game->tags()->detach();

        $game->delete();


        return redirect('admin/products');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:30|min:1',
            'launch_date' => 'required|date',
            'developer' => 'required|integer',
            'category' => 'required|integer',
            'price' => 'required|numeric|min:0',
            'listed' => 'required|string',
            'description' => 'required|string|max:600|min:1',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'nullable',
            'tags.*' => 'string'
        ]);
    }

    public function showProductPage($id)
    {
        $game = null;
        try {
            $game = Game::findOrFail($id);
        } catch (ModelNotFoundException  $err) {
            abort(404);
        }

        //dd($game); //para ver o que recebo
        //$game->with('developers');
        //dd($game);
        //calculating score to update in radial progress bar
        $score = ($game->score / 5) * 100;
        $percent = ceil($score / 5) * 5;


        return view('pages.product_page', ['game' => $game, 'percent' => $percent]);
    }
}