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

<<<<<<< HEAD
    // Show the Edit Form
=======
>>>>>>> 2b8f57bac853718526ceaa2c5b0b5815ac3f3395
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

<<<<<<< HEAD
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
=======
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable',
        ]);
        $product->update($data);
        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
>>>>>>> 2b8f57bac853718526ceaa2c5b0b5815ac3f3395
    }
}
