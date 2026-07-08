@extends('layouts.admin')

@section('title', 'Graphics Design Sections - Admin')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Graphics Design Page Sections</h1>
        <p class="text-gray-600 mt-2">Upload and manage images for the Graphics Design service page.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-lg bg-green-50 border border-green-200 p-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Section</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Slug</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Preview</th>
                    <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse($sections as $section)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $section->label }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $section->slug }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @if($section->image_url)
                                <img src="{{ $section->image_url }}" alt="{{ $section->alt_text ?? $section->label }}" class="h-16 w-24 rounded object-cover" />
                            @else
                                <span class="text-xs text-gray-400">No image uploaded</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('admin.graphics-design.edit', $section) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-sm text-gray-500">No Graphics Design page sections available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
