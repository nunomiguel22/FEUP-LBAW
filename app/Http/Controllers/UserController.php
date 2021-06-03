<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Validator;


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

        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect('user/edit')
                ->withErrors($validator)
                ->withInput();
        }

        // Update the game in the DB using a transaction as this is a multipart action
        DB::beginTransaction();
        try {
            Auth::user()->username = $request->username;
            Auth::user()->first_name = $request->first_name;
            Auth::user()->last_name = $request->last_name;
            Auth::user()->nif = $request->nif;
            Auth::user()->description = $request->description;
            if($this->hasAddress($request)){

                $validator = $this->addressValidator($request->all());
                if ($validator->fails()) {
                return redirect('user/edit')
                    ->withErrors($validator)
                    ->withInput();
                }
                // Create address if it does not existe
                if(Auth::user()->address === null){
                    $address = new Address();
                } else{
                    $address = Auth::user()->address;
                }
                $address->line1 = $request->line1;
                $address->line2 = $request->line2;
                $address->postal_code = $request->postal_code;
                $address->city = $request->city;
                $address->region = $request->region;
                $address->country_id = $request->country;
                $address->save();
                Auth::user()->address_id = $address->id;
            } 
            
            // Add images to disk with an unique name, create images in table and add relation
            if ($request->file('image')) {
                $old_image = Image::find(Auth::user()->image_id);
                $path = Image::saveOnDisk($request->file('image'));
                $image = new Image();
                $image->path = $path;
                $image->save();
                Auth::user()->image_id= $image->id;
                Auth::user()->save();
                // Delete images from disk, database and game relation if not default
                if($old_image->id != 1){
                    $old_image->deleteFromDisk();
                    $old_image->delete();
                }
                    
            }else{
                Auth::user()->save();
            }
            
            
            DB::commit();

        }  catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors($e->getMessage());
        }

        return redirect('/user/edit');
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
        ]);
    }

    protected function hasAddress($request){

        return $request->line1 || $request->postal_code || $request->city || $request->region;

    }

    protected function addressValidator(array $data)
    {
        return Validator::make($data, [
            'line1' => 'required|string|max:100|min:1',
            'line2' => 'nullable',
            'postal_code' => 'required|string|max:20|min:1',
            'region' => 'required|string|max:60|min:1',
            'city' => 'required|string|max:60|min:1',
            'country' => 'required|integer|min:1|max:500',
        
        ]);
    }
}
