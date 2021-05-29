<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;

use App\Models\Game;
use App\Models\Developer;
use App\Models\GameKey;
use App\Models\Image;
use App\Models\Tag;
use App\Models\Category;

class GameController extends Controller
{
    public function search(Request $request)
    {
        $query = Game::query();

        if (!Auth::user() || !Auth::user()->is_admin) {
            $query = Game::where('listed', true);
        }

        if ($request->category && $request->category != -1 && Category::find($request->category)->exists()) {
            $query->where('category_id', $request->category);
        }

        if ($request->max_price) {
            $query->where('price', '<', $request->max_price);
        }

        if ($request->text_search) {
            $query->whereIn('id', Game::FTS($request->text_search));
        }

        switch ($request->sort_by) {
            case 0:
                $query->orderByDesc('score');
                break;
            case 1:
                $query->orderByDesc('launch_date');
                break;
            case 2:
                $query->orderByDesc('price');
                break;
            default: break;
        }

        return $query->with('developer', 'category', 'images')->paginate(10);
    }


    public function showProducts()
    {
        $categories = Category::all();
        return view('pages.products', ['categories' => $categories]);
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

        DB::beginTransaction();
        try {
            $game = new Game();

            $game->title = $request->title;
            $game->launch_date = $request->launch_date;
        
            if ($request->developer == -1) {
                $developer = new Developer();
                $developer->name = $request->dev_name;
                $developer->save();
                $game->developer_id = $developer->id;
            } else {
                $game->developer_id = $request->developer;
            }

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
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors($e->getMessage());
        }

        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $this->authorize('modify', Game::class);

        $game = null;
        try {
            $game = Game::findOrFail($id);
        } catch (ModelNotFoundException  $err) {
            abort(404);
        }

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect('admin/products/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            $game->title = $request->title;
            $game->launch_date = $request->launch_date;
            if ($request->developer == -1) {
                $developer = new Developer();
                $developer->name = $request->dev_name;
                $developer->save();
                $game->developer_id = $developer->id;
            } else {
                $game->developer_id = $request->developer;
            }
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
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors($e->getMessage());
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

    public function updateKeys(Request $request, $id)
    {
        $this->authorize('modify', Game::class);

        $validator = Validator::make($request->all(), [
            'del_keys.*' => 'int',
            'f_keys' => 'file|mimetypes:text/plain|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect('admin/products/'.$id.'/keys')
                ->withErrors($validator)
                ->withInput();
        }

        $game = null;
        try {
            $game = Game::findOrFail($id);
        } catch (ModelNotFoundException  $err) {
            abort(404);
        }

        $del_keys = empty($request->del_keys) ? array() : $request->del_keys;

        foreach ($del_keys as $key_id) {
            $key = null;
            try {
                $key = GameKey::findOrFail($key_id);
            } catch (ModelNotFoundException  $err) {
                continue;
            }
            $key->delete();
        }

        $m_keys = empty($request->m_keys) ? array() : explode("\r\n", $request->m_keys);
   
        foreach ($m_keys as $key_code) {
            $key = new GameKey();
            $key->key = $key_code;
            $key->available = true;
            $key->game_id = $id;
            $key->save();
        }

        if (!is_null($request->f_keys)) {
            $request_f_keys = $request->f_keys->getContent();
            $f_keys = empty($request_f_keys) ? array() : explode("\r\n", $request_f_keys);
   
            foreach ($f_keys as $key_code) {
                $key = new GameKey();
                $key->key = $key_code;
                $key->available = true;
                $key->game_id = $id;
                $key->save();
            }
        }

        return back();
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:60|min:1',
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

        
        $score = ($game->score / 5) * 100;
        $percent = ceil($score / 5) * 5;
        $purchases = null;
        $keys_available = $game->game_keys->where('available', 'true')->count();

        if (Auth::check() && Auth::user()->is_admin) {
            $purchases = $game->purchases()->where('status', 'Completed')->orderByDesc('timestamp');
        }

        return view('pages.product_page', ['game' => $game, 'percent' => $percent,
                                            'purchases' => $purchases, 'keys_available' => $keys_available]);
    }
}
