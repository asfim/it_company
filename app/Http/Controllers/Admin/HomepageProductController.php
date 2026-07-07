<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomepageProductController extends Controller
{
    public function index()
    {
        $products = HomepageProduct::orderBy('sort_order')->get();
        return view('admin.homepage.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.homepage.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'features' => 'nullable|string',
            'mock_title' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:5120',
            'sort_order' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('products', 'public');
        }

        HomepageProduct::create($validated);

        return redirect()->route('admin.homepage.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(HomepageProduct $product)
    {
        return view('admin.homepage.products.edit', compact('product'));
    }

    public function update(Request $request, HomepageProduct $product)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'features' => 'nullable|string',
            'mock_title' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:5120',
            'sort_order' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if it's not a default asset
            if ($product->image_path && !str_starts_with($product->image_path, 'images/') && !str_starts_with($product->image_path, 'assets/')) {
                Storage::disk('public')->delete($product->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('admin.homepage.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(HomepageProduct $product)
    {
        // Delete image if exists
        if ($product->image_path && !str_starts_with($product->image_path, 'images/') && !str_starts_with($product->image_path, 'assets/')) {
            Storage::disk('public')->delete($product->image_path);
        }

        $product->delete();

        return redirect()->route('admin.homepage.products.index')->with('success', 'Product deleted successfully.');
    }
}
