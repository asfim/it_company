<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageProduct;
use App\Services\ImageOptimizerService;
use Illuminate\Http\Request;

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
            'image' => 'nullable|image|max:10240',
            'sort_order' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $seoHint = $validated['mock_title'] ?: $validated['title'];
            $validated['image_path'] = ImageOptimizerService::uploadAndOptimize(
                $request->file('image'),
                'products',
                $seoHint,
                800
            );
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
            'image' => 'nullable|image|max:10240',
            'sort_order' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            ImageOptimizerService::deleteOldImage($product->image_path);
            $seoHint = $validated['mock_title'] ?: $validated['title'];
            $validated['image_path'] = ImageOptimizerService::uploadAndOptimize(
                $request->file('image'),
                'products',
                $seoHint,
                800
            );
        }

        $product->update($validated);

        return redirect()->route('admin.homepage.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(HomepageProduct $product)
    {
        ImageOptimizerService::deleteOldImage($product->image_path);

        $product->delete();

        return redirect()->route('admin.homepage.products.index')->with('success', 'Product deleted successfully.');
    }
}
