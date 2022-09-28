<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('admin.product.index', compact('products' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        
        $product = $request->all();
        // xu ly upload hinh vao thu muc
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect()->route('ProductCreate')->with('loi', 'Ban chi duoc upload anh co duoi la jpg png hoac jpeg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("assets/images/products", $imageName);
        } else {
            $imageName = null;
        }
        $p = new Product($product);
        $p -> photo = $imageName;
        // $p->slug = \changeTitle($p->name);
        $p-> save();
        // return redirect()->route('admin.product.index');
        return redirect()->route('Product.index');
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Request $request)
    {
        $product = $request->all();
        // $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try {
            $product->update($request->all());
            return redirect()->route('admin.product.index');
        } catch (\Throwable $th) {
            //throw $th
        }
        return redirect()->route('admin.Product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,  Product $product)
    {
        $product->delete();
        return redirect()->route('Product.index');
    }
}
