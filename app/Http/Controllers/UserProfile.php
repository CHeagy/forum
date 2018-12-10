<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserProfile extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(User $user)
    {
        return view('account.profile', compact('user'));
    }
}
