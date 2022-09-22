<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home() {
    $products = Product::all();
        return view('home.home', compact('products'));
    }

    public function search(Request $request) {
        $keywords  = $request->keywords_submit;
        $products = Product::all();
        // $search = DB::table('products') where('name','like','%' . $keywords .'%')->orderBy('created_at','name')->take(6)->get();
        // return view('timkiem', ('search'),$search);
    }

    public function CATEGORY() {
        return view('CATEGORY');
    }

    public function samsung() {
        $products = Product::where('type','samsung')->get();
        return view('samsung', compact('products'));
    }

    public function apple() {
        $products = Product::where('type','apple')->get();
        return view('apple', compact('products'));
    }

    public function xiaomi() {
        $products = Product::where('type','xiaomi')->get();
        return view('xiaomi', compact('products'));
    }

    public function garmin() {
        $products = Product::where('type','garmin')->get();
        return view('garmin', compact('products'));
    }

    
    public function detail($id) {
       
        $products = Product::find($id);
        return view('detail', compact(
            'products'
        
        ));
    }
    
    
}

