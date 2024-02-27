<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class productController extends Controller
{
    public function index()
    {
        return view('products.index');
    }
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // dd ($request->all());
        $image = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $image);
        // dd($image);
        $product = new product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $image;
        $product->save();
        return back()->with('success', 'Product created successfully.');

    }
}
