<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')
                            ->orderBy('title')->paginate(10);
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
       return view('products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1- valider le formulaire
        $validated = $request->validate([
            // 'title' => ['required','min:3','max:255'],
            'title' => 'required|min:3|max:255',
            'price' => 'required|numeric|min:0|max:1000000',
            'stock' => 'required|integer|min:0|max:999999',
            'date_expiration' => 'nullable|date',
            'category_id' => 'nullable|exists:categories,id'
        ]);
        // 2- inserer le produit
        $validated['is_published'] = $request->has('is_published');

        Product::create($validated);
        return to_route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::orderBy('name')->get();

        return view('products.edit',compact('product','categories'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

         // 1- valider le formulaire
         $validated = $request->validate([
            // 'title' => ['required','min:3','max:255'],
            'title' => 'required|min:3|max:255',
            'price' => 'required|numeric|min:0|max:1000000',
            'stock' => 'required|integer|min:0|max:999999',
            'date_expiration' => 'nullable|date',
            'category_id' => 'nullable|exists:categories,id'
        ]);
        $validated['is_published'] = $request->has('is_published');

        $product->update($validated);
        
        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return to_route('products.index');
    }
}
