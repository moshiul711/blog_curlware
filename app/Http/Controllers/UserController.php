<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $user_info;
    public function register(Request $request)
    {
        $this->user_info = User::registerUserInfo($request);
        if ($this->user_info)
        {
            return back()->with('message','User Registered Successfully');
        }
    }
}
