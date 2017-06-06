<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show(Request $request)
    {
        $user = User::where('slug', $request->slug)->first();
        return view('user.show', compact('user'));
    }
}
