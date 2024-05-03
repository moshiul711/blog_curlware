<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Session;
class BlogController extends Controller
{
    public $user;
    public function index()
    {
        if (Session::get('user_id'))
        {
            $user = User::find(Session::get('user_id'));
            return view('blog.index',compact('user'));
        }
        return view('blog.index');
    }
}
