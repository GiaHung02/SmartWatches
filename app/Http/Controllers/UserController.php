<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function register(){
        $data['title']='Register';
        return view('register', $data);

    }

    public function register_action(Request $request){
       $request->validate([
        'fullname'=>'required',
        'username'=>'required|unique:customer',
        'password'=>'required',
        'password_confirmation'=>'required|same:password',
       ]);
    

        $user = new User([
        'fullname'=>$request->fullname,
        'username'=>$request->username,
        'password'=>Hash::make($request->fullname),

        ]);
        $user->save();
        return redirect()->route('login')->with('success','Registration Success. Please login!');
    }

    public function login(){
        $data['title']='Register';
        return view('login', $data);

    }
    public function login_action(Request $request){
        $request->validate([
         'username'=>'required',
         'password'=>'required',
        ]);
     
 
        if(Auth::attempt(['username'=>$request->username,'password'=>$request->password])){
            $request->session()->regenerate();
            return redirect()->intended('/');
        };
         return back()->with('password','Wrong Username or Password!');
     }
}
