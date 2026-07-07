@extends('admin.homepage.layout')

@section('homepage_title', 'Edit Service')

@section('homepage_content')
<div class="mb-6">
    <a href="{{ route('admin.homepage.services.index') }}" class="text-sm text-blue-600 hover:underline">&larr; Back to Services</a>
    <h2 class="text-2xl font-bold text-gray-800 mt-2">Edit Service: {{ $service->title }}</h2>
</div>

<form action="{{ route('admin.homepage.services.update', $service) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="space-y-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Title</label>
            <input type="text" name="title" value="{{ $service->title }}" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="3" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500">{{ $service->description }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Icon (Lucide name, e.g. building-2, smartphone, layout)</label>
                <input type="text" name="icon" value="{{ $service->icon }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Redirect URL/Route (e.g. /services/web-application)</label>
                <input type="text" name="link" value="{{ $service->link }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Sort Order</label>
            <input type="number" name="sort_order" value="{{ $service->sort_order }}" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
        </div>
    </div>

    <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end">
        <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded shadow-md transition">
            Update Service
        </button>
    </div>
</form>
@endsection
