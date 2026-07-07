@extends('admin.homepage.layout')

@section('homepage_title', 'Edit WCU Card')

@section('homepage_content')
<div class="mb-6">
    <a href="{{ route('admin.homepage.wcu.index') }}" class="text-sm text-blue-600 hover:underline">&larr; Back to Why Choose Us</a>
    <h2 class="text-2xl font-bold text-gray-800 mt-2">Edit Card: {{ $card->title }}</h2>
</div>

<form action="{{ route('admin.homepage.wcu.update', $card) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="space-y-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Title</label>
            <input type="text" name="title" value="{{ $card->title }}" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="3" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500">{{ $card->description }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Icon SVG Code</label>
            <textarea name="icon_svg" rows="4" class="w-full border border-gray-300 rounded px-3 py-2 font-mono text-xs focus:ring-blue-500 focus:border-blue-500">{{ $card->icon_svg }}</textarea>
            <span class="text-xs text-gray-400 mt-1 block">Paste direct &lt;svg&gt;...&lt;/svg&gt; tags here.</span>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Sort Order</label>
            <input type="number" name="sort_order" value="{{ $card->sort_order }}" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
        </div>
    </div>

    <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end">
        <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded shadow-md transition">
            Update Card
        </button>
    </div>
</form>
@endsection
