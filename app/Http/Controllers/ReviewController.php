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
    public function addReview(Request $request)
    {

        return redirect('/');
    }

    
}