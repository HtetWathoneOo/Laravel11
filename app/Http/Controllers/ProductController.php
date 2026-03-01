<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product');
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

}
