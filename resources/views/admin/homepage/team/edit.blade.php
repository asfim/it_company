@extends('admin.homepage.layout')

@section('homepage_title', 'Edit Team Member')

@section('homepage_content')
<div class="mb-6">
    <a href="{{ route('admin.homepage.team.index') }}" class="text-sm text-blue-600 hover:underline">&larr; Back to Team</a>
    <h2 class="text-2xl font-bold text-gray-800 mt-2">Edit Team Member: {{ $member->name }}</h2>
</div>

<form action="{{ route('admin.homepage.team.update', $member) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Name</label>
                <input type="text" name="name" value="{{ $member->name }}" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Designation (e.g. CEO & Founder, Lead Developer)</label>
                <input type="text" name="designation" value="{{ $member->designation }}" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500">{{ $member->description }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Profile Photo</label>
                <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 mb-2" />
                @if($member->image_url)
                    <div class="mt-2">
                        <span class="text-xs text-gray-400 block mb-1">Current Photo:</span>
                        <img src="{{ $member->image_url }}" class="h-20 w-20 object-cover rounded-full border" />
                    </div>
                @endif
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Sort Order</label>
                <input type="number" name="sort_order" value="{{ $member->sort_order }}" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
            </div>
        </div>
    </div>

    <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end">
        <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded shadow-md transition">
            Update Team Member
        </button>
    </div>
</form>
@endsection
