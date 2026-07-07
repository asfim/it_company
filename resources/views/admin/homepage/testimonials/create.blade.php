@extends('admin.homepage.layout')

@section('homepage_title', 'Create Testimonial')

@section('homepage_content')
<div class="mb-6">
    <a href="{{ route('admin.homepage.testimonials.index') }}" class="text-sm text-blue-600 hover:underline">&larr; Back to Testimonials</a>
    <h2 class="text-2xl font-bold text-gray-800 mt-2">Add New Testimonial</h2>
</div>

<form action="{{ route('admin.homepage.testimonials.store') }}" method="POST">
    @csrf
    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Client Name</label>
                <input type="text" name="name" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Designation / Role (e.g. Social Media Manager)</label>
                <input type="text" name="designation" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Stars (1-5)</label>
                <select name="stars" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="5">5 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="2">2 Stars</option>
                    <option value="1">1 Star</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Marquee Row</label>
                <select name="row" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="1">Row 1 (Top)</option>
                    <option value="2">Row 2 (Bottom)</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Avatar Background Color (e.g. #3b82f6)</label>
                <input type="text" name="avatar_bg" value="#3b82f6" placeholder="#3b82f6" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Sort Order</label>
                <input type="number" name="sort_order" value="0" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Review Content</label>
            <textarea name="review" rows="4" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>
    </div>

    <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end">
        <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded shadow-md transition">
            Create Testimonial
        </button>
    </div>
</form>
@endsection
