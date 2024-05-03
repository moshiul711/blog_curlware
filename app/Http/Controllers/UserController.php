<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    public $user_info;
    public function register(Request $request)
    {
        $validateForm = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $this->user_info = User::registerUserInfo($request);
        if ($this->user_info)
        {
            Session::put('user_id',$this->user_info->id);
            Session::put('user_name',$this->user_info->name);
            Session::put('user_image',$this->user_info->image);
            return back()->with('success','User Registered Successfully');
        }
        else
        {
            return back()->with('error','Try again');
        }
    }

    public function login(Request $request)
    {
        $this->user_info = User::where('email', $request->email)->first();
        if ($this->user_info)
        {
            $password_option = [
                'password'=>$this->user_info->password
            ];
            if (password_hash($request->password,PASSWORD_BCRYPT,$password_option))
            {
                Session::put('user_id',$this->user_info->id);
                Session::put('user_name',$this->user_info->name);
                Session::put('user_image',$this->user_info->image);
                return back()->with('success','Successfully logged in');
            }
            else
            {
                return back()->with('success', 'Sorry ... you password is invalid.');
            }
        }
        else
        {
            return back()->with('success', 'Sorry ... your email or password is invalid.');
        }
    }

    public function logout()
    {
        Session::forget('user_id');
        Session::forget('user_name');
        Session::forget('user_image');
        return redirect('/');
    }
}
