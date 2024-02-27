<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {

        return view('products.index', ['products' => Product::all()]);

    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $image);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $image;
        $product->save();

        return back()->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        if ($request->hasFile('image')) {
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $image);
            $product->image = $image;
        }
        $product->save();

        return back()->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('success', 'Product deleted successfully.');
    }
    
}
