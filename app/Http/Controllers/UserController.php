<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Purchase;
use App\Models\Image;
use App\Models\Address;
use App\Models\Country;

class UserController extends Controller
{
    //Change admin status of other user (Aux Function)
    public function adminRole(Request $request, $user_id)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            throw new AuthorizationException('This page is limited to administrators only');
        }

        
        $user = null;
        try {
            $user = User::findOrFail($user_id);
        } catch (ModelNotFoundException  $err) {
            abort(404);
        }
        if ($request->make_admin) {
            $user->is_admin = true;
        } else {
            $user->is_admin = false;
        }

        $user->save();
    
        return back();
    }

    //Change banned status of other user (Aux Function)
    public function ban(Request $request, $user_id)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            throw new AuthorizationException('This page is limited to administrators only');
        }

        $user = null;
        try {
            $user = User::findOrFail($user_id);
        } catch (ModelNotFoundException  $err) {
            abort(404);
        }
 
        if ($request->unban) {
            $user->banned = false;
        } else {
            $user->banned = true;
        }

        $user->save();
    
        return back();
    }

    // PUT /user/security
    public function changeLoginDetails(Request $request)
    {
        $this->authorize('modify', User::class);

        $request->validate([
            'email' => 'nullable|email',
            'password' => 'required|string',
            'new_password' => 'nullable|
                        min:6|
                        regex:/[a-z]/|
                        regex:/[A-Z]/|
                        regex:/[0-9]/',

            'password_confirmation' => 'nullable|string|same:new_password',
        ]);
        $user = Auth::user();
        
        // Confirm user password in order to change data
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Incorrect password']);
        }

        // Change email if diferente than existing one
        if (!is_null($request->email) && ($request->email != $user->email)) {
            if (is_null(User::where('email', $request->email)->first())) {
                $user->email = $request->email;
                $user->email_verified_at = null;
                $user->save();
            } else {
                return back()->withErrors(['email' => 'This email is already registered']);
            }
        }

        // Change password
        if (!is_null($request->new_password)) {
            $user->forceFill([
                'password' => bcrypt($request->new_password)
            ])->setRememberToken(Str::random(60));
            $user->save();
        }
    
        return back();
    }

    // DELETE /user/security
    public function deleteAccount(Request $request)
    {
        $this->authorize('modify', User::class);

        $user = Auth::user();
        // Update delete user form DB using a transaction as this is a multipart action
        DB::beginTransaction();
        try {
            
            $user->cart_items()->detach();
            $user->wishlist_items()->detach();
            $user->purchases()->delete();
            $user->reviews()->delete();
            
            //Delete image if not default
            if ($user->image->id != 1) {
                $user_image = $user->image;
                $user->image_id = 1;
                $user->save();
                $user_image->deleteFromDisk();
                $user_image->delete();
            }
            $user->address()->delete();
            $user->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors($e->getMessage());
        }

        Auth::logout();
        
        return redirect('login');
    }

    //GET /user
    public function showDefault()
    {
        return $this->showWishlist();
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

            // Edit user object
            Auth::user()->username = $request->username;
            Auth::user()->first_name = $request->first_name;
            Auth::user()->last_name = $request->last_name;
            Auth::user()->nif = $request->nif;
            Auth::user()->description = $request->description;

            //verify that is inserted a valid address
            if ($this->hasAddress($request)) {
                $validator = $this->addressValidator($request->all());
                if ($validator->fails()) {
                    return redirect('user/edit')
                    ->withErrors($validator)
                    ->withInput();
                }
                // Create address if it does not existe
                if (Auth::user()->address === null) {
                    $address = new Address();
                } else {
                    $address = Auth::user()->address;
                }
                // Edit address object
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
                // Delete images from disk, database and game relation if not default image
                if ($old_image->id != 1) {
                    $old_image->deleteFromDisk();
                    $old_image->delete();
                }
            } else {
                Auth::user()->save();
            } 
            
            DB::commit();
        } catch (\Exception $e) {
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
            'nif' => 'nullable|string|max:20',
            'description' => 'nullable|string|max:500',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
        ]);
    }

    
    protected function hasAddress($request)
    {
        return $request->line1 || $request->postal_code || $request->city || $request->region;
    }

    protected function addressValidator(array $data)
    {
        return Validator::make($data, [
            'line1' => 'required|string|max:100|min:1',
            'line2' => 'nullable|string|max:100',
            'postal_code' => 'required|string|max:20|min:1',
            'region' => 'required|string|max:60|min:1',
            'city' => 'required|string|max:60|min:1',
            'country' => 'required|integer|min:1|max:500',
        
        ]);
    }

    // GET /user/wishlist
    public function showWishlist()
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $wishlist_games = Auth::user()->wishlist_items;
        
        return view('pages.user.user', ['tab_id' => 0, 'wishlist_games' => $wishlist_games]);
    }
}
