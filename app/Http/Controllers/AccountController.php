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
    	return view('account.home');
    }

    public function Store(Request $request) {
    	$validator = Validator::make($request->all(), [
    		'email' => 'confirmed|nullable|email',
    		'new_password' => 'nullable|confirmed|min:6|max:255'
    	]);

    	if(Hash::check($request->old_password, Auth::user()->password) == false) {

	    	$validator->errors()->add('old_password', 'Your current password is incorrect.');
    	}


    	//dd(print_r($validator->errors()->all(), true) . " - " . $validator->fails() . " - " . print_r($validator->errors()->all(), true));
    	
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

        $user->save();

        return back();


    }
}
