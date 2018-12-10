<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\post;
use App\User;
use Illuminate\Support\Facades\Hash;


class AccountController extends Controller
{
    public function Index() {
    	$posts = post::where('author_id', Auth::user()->id)
    	return view('account.home')->withModel($posts);
    }

    public function Store(Request $request) {
    	$validator = Validator::make($request->all(), [
    		'email' => 'confirmed|nullable|email|unique:users',
    		'new_password' => 'nullable|confirmed|min:6|max:255'
    	]);

    	if(Hash::check($request->old_password, Auth::user()->password) == false) {

	    	$validator->errors()->add('old_password', 'Your current password is incorrect.');
    	}
    	
    	if ($validator->errors()->any()) {
            return redirect('/account')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = Auth::user();
        if(isset($request->email)) {
        	$user->email = $request->email;
        }

        if(isset($request->new_password)) {
        	$user->password = Hash::make($request->new_password);
        }

        $user->website = $request->website;
        $user->location = $request->location;

        $user->save();

        return back();


    }
}
