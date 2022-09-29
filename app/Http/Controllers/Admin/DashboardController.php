<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard() {
        return view('admin.user.dashboard');
    }

    public function create_user() {
        return view('admin.user.CreateUser');
    }

}
