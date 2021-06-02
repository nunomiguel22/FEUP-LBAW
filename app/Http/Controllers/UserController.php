<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

use App\Models\Purchase;
use App\Models\Image;
use App\Models\Address;
use App\Models\Country;


class UserController extends Controller
{
    //GET /user
    public function showDefault()
    {
        return $this->showKeys();
    }

    //GET /user/edit
    public function showGeneral()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
       
        $counties = Country::all();

        return view('pages.user.user', ['tab_id' => 1, 'countries' => $counties]);
    }

    //PUT /user/edit
    public function updateGeneral(Request $request)
    {
        $this->authorize('modify', User::class);
        $this->authorize('modify', Address::class);

        /*$validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect('user/edit')
                ->withErrors($validator)
                ->withInput();
        }*/

        // Update the game in the DB using a transaction as this is a multipart action
        DB::beginTransaction();
        try {
            Auth::user()->username = $request->username;
            Auth::user()->first_name = $request->fist_name;
            Auth::user()->last_name = $request->last_name;
            Auth::user()->nif = $request->nif;
            Auth::user()->description = $request->description;
            Auth::user()->save();
            // Create address if it does not existe
            if(is_null(Auth::user()->address)){    
                $address = new Address();
                $address->line1 = $request->line1;
                $address->line2 = $request->line2;
                $address->postal_code = $request->postal_code;
                $address->city = $request->city;
                $address->region = $request->region;
                $address->country_id = $request->country;
                $address->save();
                Auth::user()->address_id = $address->id;
            } else{
                Auth::user()->address->line1 = $request->line1;
                Auth::user()->address->line2 = $request->line2;
                Auth::user()->address->postal_code = $request->postal_code;
                Auth::user()->address->city = $request->city;
                Auth::user()->address->region = $request->region;
                Auth::user()->address->country_id = $request->country;
                Auth::user()->save();
            }
            
            // Add images to disk with an unique name, create images in table and add relation
            if ($request->file('image')) {
                // Delete images from disk, database and game relation if not default
                if(Auth::user()->image_id != 1){
                    $image = Image::find(Auth::user()->image_id);
                    Auth::user()->images()->detach(Auth::user()->image_id); // verificar se isto é so para muitos para um
                    $image->deleteFromDisk();
                    $image->delete();
                }
                $image = $request->file('image');
                    $path = Image::saveOnDisk($image);
                    Auth::user()->images()->save(new Image(['path' => $path]));// verificar se isto é so para muitos para um
            }
        
            DB::commit();

        }  catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors($e->getMessage());
        }

        return redirect('pages.user.user', ['tab_id' => 1]);
    }

    //GET /user/security
    public function showSecurity()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        
        return view('pages.user.user', ['tab_id' => 3]);
    }

    //GET /user/avatar
    public function showAvatar()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        
        return view('pages.user.user', ['tab_id' => 4]);
    }

    //GET /user/keys
    public function showKeys()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        
        $purchases = Auth::user()->purchases;

        return view('pages.user.user', ['tab_id' => 2, 'purchases' => $purchases]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:60|min:1',
            'first_name' => 'required|string|max:60|min:1',
            'last_name' => 'required|string|max:60|min:1',
            'nif' => 'nullable',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
        ]);
    }
}
