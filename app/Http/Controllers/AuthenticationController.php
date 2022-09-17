<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
// use App\Http\Middleware\Sentinel;

class AuthenticationController extends Controller
{
    //
    public function login()
    {

            // $credentials = [
            //     'email'    => 'hoang@gmail.com',
            //     'password' => 'hoang',
            // ];

            // $user = Sentinel::registerAndActivate($credentials);
        return view('login');
    }

    public function processLogin(Request $request)
    {
        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

        if ($user = Sentinel::authenticate($credentials)) {
            //login thanh cong
            $user = Sentinel::getUser();
            $role = Sentinel::getRoleRepository()->findBySlug('admin');
            if (!$user->inRole($role)) {
                return redirect()->route('home');
            } else {
                return redirect()->route('admin.home');
            }
        } else {
            // wrong username or password
            return view('login');
        }
    }
}
