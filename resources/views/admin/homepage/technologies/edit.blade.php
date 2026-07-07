@extends('admin.homepage.layout')

@section('homepage_title', 'Edit Technology')

@section('homepage_content')
<div class="mb-6">
    <a href="{{ route('admin.homepage.technologies.index') }}" class="text-sm text-blue-600 hover:underline">&larr; Back to Technologies</a>
    <h2 class="text-2xl font-bold text-gray-800 mt-2">Edit Technology: {{ $technology->name }}</h2>
</div>

<form action="{{ route('admin.homepage.technologies.update', $technology) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="space-y-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Name (e.g. PHP, LARAVEL, REACT JS)</label>
            <input type="text" name="name" value="{{ $technology->name }}" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Icon Class (Devicon class, e.g. devicon-php-plain colored, devicon-laravel-plain colored)</label>
            <input type="text" name="icon_class" value="{{ $technology->icon_class }}" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
            <span class="text-xs text-gray-400 mt-1 block">Find icon classes at <a href="https://devicon.dev" target="_blank" class="text-blue-600 hover:underline">devicon.dev</a></span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Marquee Row (Top or Bottom)</label>
                <select name="direction" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="left" {{ $technology->direction === 'left' ? 'selected' : '' }}>Top Row (Moves Left)</option>
                    <option value="right" {{ $technology->direction === 'right' ? 'selected' : '' }}>Bottom Row (Moves Right)</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Sort Order</label>
                <input type="number" name="sort_order" value="{{ $technology->sort_order }}" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>
        </div>
    </div>

    <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end">
        <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded shadow-md transition">
            Update Technology
        </button>
    </div>
</form>
@endsection
