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

        // kiem tra dang nhap cach 1
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            $user= Auth::attempt() ;
            session()->push('user',$user);
            return redirect()->intended('/');
        };

        return back()->with('password', 'Wrong email or Password!');

        //  // kiem tra dang nhap cach 2
        //  $email= $request->email;
        //  $password = $request->password;
        //     $user = User::where('email',$email)->where('password',$password)-> get();
        //     if(count($user)==0){
        //         $errs[0] = 'Wrong email or Password!';
        //         return redirect('login')->with('errors',$errs);
        //     }
        //     //dua thong tin dang nhap vao session
        //     session()->push('user',$user);
        //     return redirect()->route('/');
    }


    //check user
    public function checkLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $user = DB::table('accounts')->where('email', $email)->first();
        if ($user != null && $user->password == $password) {
           session()->push('user', $user);
            if ($user->role == 1) {
                return redirect('admin');
            } else {
                return redirect("/" . $user->account_id);
            }
        } else {
            return redirect('login')->with('message', 'Login Fail.');
        }
    }

    public function users()
    {
        $users = DB::table('accounts')->get();
        return view('admin.user.dashboard')->with(['users' => $users]);
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
        DB::table('account')->insert([
            
            'email' => $email,
            'password' => $password,
            'fullname' => $fullname,
            'role' => intval($role),
            'active' => intval($active),
            'image' => $image,
            'address' => $address,
            'phone' => $phone,
        ]);
        return redirect('admin');
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
