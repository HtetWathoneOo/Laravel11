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

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

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
    }
}
