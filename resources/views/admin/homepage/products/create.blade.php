@extends('admin.homepage.layout')

@section('homepage_title', 'Create Product')

@section('homepage_content')
<div class="mb-6">
    <a href="{{ route('admin.homepage.products.index') }}" class="text-sm text-blue-600 hover:underline">&larr; Back to Products</a>
    <h2 class="text-2xl font-bold text-gray-800 mt-2">Add New Product</h2>
</div>

<form action="{{ route('admin.homepage.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Mock Title (Shown in tab sidebar & screen bar, e.g. E-Commerce)</label>
                <input type="text" name="mock_title" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Main Title (Shown as content heading, e.g. Build And Scale Your Online Store)</label>
                <input type="text" name="title" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="3" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Features (One feature per line)</label>
            <textarea name="features" rows="4" placeholder="Product & Inventory Management&#10;Secure Payment Gateways&#10;Order Tracking & Analytics" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Product Preview Image</label>
                <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Sort Order</label>
                <input type="number" name="sort_order" value="0" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>
        </div>
    </div>

    <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end">
        <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded shadow-md transition">
            Create Product
        </button>
    </div>
</form>
@endsection
