@extends('layouts.admin')

@section('title')
    Edit {{ $section->label }} - Admin
@endsection

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Edit {{ $section->label }}</h1>
        <p class="text-gray-600 mt-2">Modify details and update the image for this section of the {{ $serviceName }} page.</p>
    </div>

    @if ($errors->any())
        <div class="mb-6 rounded-lg bg-red-100 border border-red-400 p-4 text-red-700">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-6 max-w-2xl">
        <form method="POST" action="{{ route('admin.services.update', ['service_key' => $serviceKey, 'section' => $section]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="label" class="block text-gray-700 font-medium mb-2">Label</label>
                <input type="text" id="label" name="label" value="{{ old('label', $section->label) }}" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Description / Notes</label>
                <textarea id="description" name="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $section->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="alt_text" class="block text-gray-700 font-medium mb-2">Image Alt Text</label>
                <input type="text" id="alt_text" name="alt_text" value="{{ old('alt_text', $section->alt_text) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div class="mb-4">
                <label for="sort_order" class="block text-gray-700 font-medium mb-2">Sort Order</label>
                <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $section->sort_order) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div class="mb-6">
                <label for="image" class="block text-gray-700 font-medium mb-2">Section Image</label>
                <input type="file" id="image" name="image" accept="image/*" class="w-full text-sm text-gray-600 file:mr-4 file:rounded-full file:border-0 file:bg-blue-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-blue-700 hover:file:bg-blue-100" />
            </div>

            @if($section->image_url)
                <div class="mb-6">
                    <p class="text-sm text-gray-500 mb-2">Current image preview</p>
                    <img src="{{ $section->image_url }}" alt="{{ $section->alt_text ?? $section->label }}" class="h-52 w-full rounded-xl object-cover border border-gray-200" />
                </div>
            @endif

            <div class="flex gap-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">Save Changes</button>
                <a href="{{ route('admin.services.index', $serviceKey) }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-400 transition">Cancel</a>
            </div>
        </form>
    </div>
@endsection
