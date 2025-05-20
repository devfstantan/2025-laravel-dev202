<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function store(ProductStoreRequest $request)
    {
        $validated = $request->validated();

        // 1- stocker le fichier image
        if($request->hasFile('image')){
            $path = $request->file('image')->store('products','public');
            $validated['image'] = $path;
        }
        // 2- inserer le produit
        $validated['is_published'] = $request->has('is_published');

        Product::create($validated);
        return to_route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();

        return view('products.edit',compact('product','categories'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
         $validated = $request->validated();

        // 1- stocker le fichier image
        if($request->hasFile('image')){
            // Supprimer l'ancienne image s'elle existe
            if( 
                $product->image &&
                Storage::disk('public')->exists($product->image)
            ){
                Storage::disk('public')->delete($product->image);
            }
            // stocker le nouveau fichier image
            $path = $request->file('image')->store('products','public');
            $validated['image'] = $path;
        }

        // 2- mettre à jour le prouit
        $validated['is_published'] = $request->has('is_published');

        $product->update($validated);
        
        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('products.index');
    }
}
