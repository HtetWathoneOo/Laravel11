<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }
    public function create()
    {
        return view('product.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty'=>'required|numeric',
            'price' => 'required|decimal:0, 2',
            'description' => 'nullable',
        ]);
        Product::create($data);
        return redirect()->route('product.list');
    }
    public function list(Request $request)
    {
        $products = Product::all();
        $search = $request->input('search');
        $products = Product::when($search, function($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->get();
        return view('product.list', compact('products'));
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('status', 'Product deleted!');
    }

    // Show the Edit Form
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    // Handle Update Request
    public function update(Request $request, Product $product)
    {
        /*
        Request $request, Formကနေရရှိတဲ့ input data (name, qty, price...)တွေကိုယူထားတာ။
        Product $product, URL ထဲက product ID ကိုအတိအကျဖမ်းယူပေးပြီး database ထဲက ပြင်မယ့် product ကို automatic ယူပေးတာ။
        */

        // Validate input
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'nullable'
        ]);

        // Update product
        $product->update($data);

        // Redirect back to list with message
        return redirect()->route('product.list');
    }
}
