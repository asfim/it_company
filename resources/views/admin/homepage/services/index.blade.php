@extends('admin.homepage.layout')

@section('homepage_title', 'Services List')

@section('homepage_content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-bold text-gray-800">Services Clock Items</h2>
    <a href="{{ route('admin.homepage.services.create') }}" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition text-sm">
        Add New Service
    </a>
</div>

<div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Description</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Icon (Lucide)</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Link</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Sort Order</th>
                <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white">
            @forelse($services as $service)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ $service->title }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $service->description }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <span class="inline-flex items-center px-2 py-1 bg-gray-100 rounded text-xs text-gray-600 font-mono">{{ $service->icon }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $service->link }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $service->sort_order }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('admin.homepage.services.edit', $service) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                            <form action="{{ route('admin.homepage.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-sm text-gray-500">No services available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
