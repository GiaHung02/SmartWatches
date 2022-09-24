<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\cartItem;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Sentinel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function home()
    {
        $products = Product::all();
        return view('home.home', compact('products'));
    }

    public function search(Request $request)
    {
        $keywords  = $request->keywords_submit;
        $products = Product::all();
        // $search = DB::table('products') where('name','like','%' . $keywords .'%')->orderBy('created_at','name')->take(6)->get();
        // return view('timkiem', ('search'),$search);
    }

    public function CATEGORY()
    {
        return view('CATEGORY');
    }

    public function samsung()
    {
        $products = Product::where('type', 'samsung')->get();
        return view('samsung', compact('products'));
    }

    public function apple()
    {
        $products = Product::where('type', 'apple')->get();
        return view('apple', compact('products'));
    }

    public function xiaomi()
    {
        $products = Product::where('type', 'xiaomi')->get();
        return view('xiaomi', compact('products'));
    }

    public function garmin()
    {
        $products = Product::where('type', 'garmin')->get();
        return view('garmin', compact('products'));
    }


    public function viewCart()
    {
        return view('view_cart');
    }

    public function addCart(Request $request)
    {
        // dd($request->all());
        // session()->flush();
        // dd('end');

        $id = $request->id;
        $quantity = $request->quantity;
        $products = Product::find($id);
        if ($products != null) {
            $cart = [];
            if ($request->session()->get('cart') != null) {
                $cart = $request->session()->get('cart');
            }
            if (array_key_exists($id, $cart)) {
                $cart[$id]->incrementQuantity($quantity);
            } else {
     
                $item = new cartItem($products, $quantity);
                $cart[$id] = $item;
        
            }
            $request->session()->put('cart', $cart);
       
            echo '<pre>';
            print_r(session()->get('cart'));

            echo '</pre>';
        }
    }

    public function clearCart(Request $request){
        $request->session()->forget('cart');
        return redirect()->route('home');
    }

    public function updateCart(Request $request){
        $ids = $request->ids;
        $quantites = $request->quantities;

        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
            for ($i=0; $i < count($ids); $i++) { 
               $cart[intval($ids[$i])]->quantity = $quantites[$i];
            }
            $request->session()->put('cart', $cart);
        }
    }


    public function increaseQuantity(Request $request) {
        $id = $request->id;
        $quantity = $request->quantity;
        $products = Product::find($id);
        if ($products != null) {
            $cart = [];
            if ($request->session()->get('cart') != null) {
                $cart = $request->session()->get('cart');
            }
            if (array_key_exists($id, $cart)) {
                $cart[$id]->incrementQuantity($quantity);
            } else {
     
                $item = new cartItem($products, $quantity);
                $cart[$id] = $item;
        
            }
            $request->session()->put('cart', $cart);
        }
    }

    public function decreaseQuantity(Request $request) {
        $id = $request->id;
        $quantity = $request->quantity;
        $products = Product::find($id);
        if ($products != null) {
            $cart = [];
            if ($request->session()->get('cart') != null) {
                $cart = $request->session()->get('cart');
            }
            if (array_key_exists($id, $cart)) {
                $cart[$id]->decrementQuantity($quantity);
            } else {
     
                $item = new cartItem($products, $quantity);
                $cart[$id] = $item;
        
            }
            $request->session()->put('cart', $cart);
        }
    }

    public function detail($id)
    {

        // session()->flush();

        $products = Product::find($id);
        return view('detail', compact(
            'products'
        ));
    }

    public function checkout(){
        $user = Sentinel::getUser();
        return view('checkout', compact('user'));
    }
}