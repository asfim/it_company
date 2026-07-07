@extends('admin.homepage.layout')

@section('homepage_title', 'Testimonials List')

@section('homepage_content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-bold text-gray-800">Client Testimonials</h2>
    <a href="{{ route('admin.homepage.testimonials.create') }}" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition text-sm">
        Add New Testimonial
    </a>
</div>

<div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Client</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Designation</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Stars</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Row</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Avatar Background</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Review</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Sort Order</th>
                <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white">
            @forelse($testimonials as $testimonial)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ $testimonial->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $testimonial->designation }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-yellow-500">
                        {{ str_repeat('★', $testimonial->getRawOriginal('stars') ?? 5) }}{{ str_repeat('☆', 5 - ($testimonial->getRawOriginal('stars') ?? 5)) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        Row {{ $testimonial->row }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <span class="inline-block w-6 h-6 rounded-full border" style="background-color: {{ $testimonial->avatar_bg }}"></span>
                        <span class="text-xs font-mono ml-1">{{ $testimonial->avatar_bg }}</span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">{{ $testimonial->review }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $testimonial->sort_order }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('admin.homepage.testimonials.edit', $testimonial) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                            <form action="{{ route('admin.homepage.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this testimonial?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="px-6 py-12 text-center text-sm text-gray-500">No testimonials available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
