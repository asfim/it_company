@extends('admin.homepage.layout')

@section('homepage_title', 'Technologies List')

@section('homepage_content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-bold text-gray-800">Technologies Marquee</h2>
    <a href="{{ route('admin.homepage.technologies.create') }}" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition text-sm">
        Add New Technology
    </a>
</div>

<div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Icon Class (Devicon)</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Marquee Row</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Sort Order</th>
                <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white">
            @forelse($technologies as $technology)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ $technology->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-mono">
                        <i class="{{ $technology->icon_class }} mr-2"></i>
                        <span>{{ $technology->icon_class }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        @if($technology->direction === 'left')
                            <span class="inline-flex items-center px-2 py-1 bg-green-100 text-green-800 rounded text-xs">Top (Left)</span>
                        @else
                            <span class="inline-flex items-center px-2 py-1 bg-purple-100 text-purple-800 rounded text-xs">Bottom (Right)</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $technology->sort_order }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('admin.homepage.technologies.edit', $technology) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                            <form action="{{ route('admin.homepage.technologies.destroy', $technology) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this technology?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-sm text-gray-500">No technologies available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
