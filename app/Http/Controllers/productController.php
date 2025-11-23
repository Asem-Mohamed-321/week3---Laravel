<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('product.index',["products"=>Product::all()]);
    }

    public function create(){
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'category'=> ['required'],
            'name'=>['required','alpha-dash'],
            'price'=>['required']
        ]);

        Product::create([
            'category'=> request('category'),
            'name'=> request('name'),
            'price'=> request('price'),
        ]);
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // dd(Product::find($id));
        return view('product.show',[
            'product' => Product::find($id)
        ]);
    }

    public function edit($id){
        return view('product.edit',['product'=>Product::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        request()->validate([
            'category'=> ['required'],
            'name'=>['required','alpha-dash'],
            'price'=>['required']
        ]);

        
        Product::findOrFail($id)->update([
            'category' => request('category'),
            'name' => request('name'),
            'price' => request('price')
        ]);

        return redirect("/products/$id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Product::findOrFail($id)->delete();
        return redirect('/products');
    }
}
