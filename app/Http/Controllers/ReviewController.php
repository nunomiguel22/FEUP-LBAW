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
use App\Models\Review;

class ReviewController extends Controller
{
    // POST /reviews/products/{id}/review
    public function addReview(Request $request, $id)
    {
        $game = null;
        try {
            $game = Game::findOrFail($id);
        } catch (ModelNotFoundException  $err) {
            abort(404);
        }

        $this->authorize('purchased', $game);
        $this->authorize('add', Review::class);

        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
    
        $review = new Review();

        // Fill review object
        $review->description = $request->description;
        $review->score = $request->score;
        $review->user_id = Auth::user()->id;
        $review->game_id = $id;

        $review->save();

        return redirect('/products/'.$review->game_id);
    }

    // PUT /reviews/products/{id}/review/{review_id}
    public function updateReview(Request $request, $game_id, $review_id)
    {
        $game = null;
        try {
            $game = Game::findOrFail($game_id);
        } catch (ModelNotFoundException  $err) {
            abort(404);
        }

        $review = null;
        try {
            $review = Review::findOrFail($review_id);
        } catch (ModelNotFoundException  $err) {
            abort(404);
        }

        $this->authorize('edit', $review);

        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update the review in the DB using a transaction as this is a multipart action
        DB::beginTransaction();
        try {
            // Edit review object
            $review->description = $request->description;
            $review->score = $request->score;
            $review->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors($e->getMessage());
        }


        return redirect('/products/'.$review->game_id);
    }

    // DELETE /reviews/products/{id}/review/{review_id}
    public function deleteReview($game_id ,$review_id)
    {
        $game = null;
        try {
            $game = Game::findOrFail($game_id);
        } catch (ModelNotFoundException  $err) {
            abort(404);
        }
        
        $review = null;
        try {
            $review = Review::findOrFail($review_id);
        } catch (ModelNotFoundException  $err) {
            abort(404);
        }


        $this->authorize('edit', $review);


        $review->delete();

        return redirect('/products/'.$game_id);
    }

    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'description' => 'required|string|max:600|min:1',
            'score' => 'required|integer|min:0|max:5'
        ]);
    }
}