<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function register()
    {
        $data['title'] = 'Register';
        return view('register', $data);
    }

    public function register_action(Request $request)
    {

        $account = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'jpeg' && $extension != 'png') {
                $errs[0] = 'Please upload image file !';
                return redirect()->route('register.action')->with('errors', $errs);
            }
        }

        $request->validate([
            'fullname' => 'required',
            'email' => 'required|unique:accounts',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);


        $user = new User([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->email),
            'role' => $request->role,
            'active' => $request->active,
            'image' => $request->image,
            'phone' => $request->phone,
            'address' => $request->address,

        ]);
        $user->save();
        return redirect()->route('login')->with('success', 'Registration Success. Please login!');
    }

    public function login()
    {
        $data['title'] = 'Register';
        return view('login', $data);
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect('/');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // kiem tra dang nhap cach 
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
        
            return redirect()->intended('/');
        };

        return back()->with('password', 'Wrong email or Password!');

    }

    public function adminlogin()
    {
        $data['title'] = 'Register';
        return view('adminlogin', $data);
    }

   

    public function adminlogin_action(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        // kiem tra dang nhap
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
        
            return redirect()->intended('admin');
        };
        return back()->with('password', 'Wrong email or Password!');

    }

    //check user

   
    public function users()
    {
        $users = DB::table('accounts')->get();
        return view('admin.user.dashboard',$users)->with(['users' => $users]);
    }

    public function displayAddUser()
    {
        return view('admin.user.CreateUser');
    }

    public function addUser(Request $request)
    {

        $email = $request->email;
        $password = $request->password;
        $fullname = $request->fullname;
        $role = $request->role;
        $active = $request->active;
        $image = $request->image;
        $address = $request->address;
        $phone = $request->phone;
        DB::table('accounts')->insert([

            'email' => $email,
            'password' => $password,
            'fullname' => $fullname,
            'role' => intval($role),
            'active' => intval($active),
            'image' => $image,
            'address' => $address,
            'phone' => $phone,
        ]);
        return redirect()->route('ProfileList');
    }
    public function resetPassword($id)
    {
        DB::table('accounts')
            ->where('account_id', $id)
            ->update(['password' => '123']);
        return redirect()->action('UserController@users');
    }

    public function userdetail($id)
    {
        $user = DB::table('accounts')
            ->where('account_id', $id)->first();
        return view('userdetail')->with(['user' => $user]);
    }
}
