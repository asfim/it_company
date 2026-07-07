@extends('admin.homepage.layout')

@section('homepage_title', 'Our Process')

@section('homepage_content')
<div class="mb-6">
    <h2 class="text-xl font-bold text-gray-800">Our Process Steps</h2>
    <p class="text-sm text-gray-500">Edit the details of the 4 steps of the process timeline.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @foreach($steps as $step)
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 flex flex-col justify-between shadow-sm">
            <div>
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-10 h-10 flex items-center justify-center bg-blue-100 text-blue-600 rounded-full font-bold">
                        {{ $step->step_number }}
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">{{ $step->title }}</h3>
                </div>
                <p class="text-sm text-gray-600 line-clamp-3 mb-4">{{ $step->description }}</p>
                <div class="flex gap-4 text-xs text-gray-400 font-mono">
                    <span>Icon: {{ strlen($step->icon_svg) > 20 ? 'SVG Code' : $step->icon_svg }}</span>
                    <span>Sort Order: {{ $step->sort_order }}</span>
                </div>
            </div>
            <div class="mt-6 flex justify-end border-t pt-4 border-gray-100">
                <a href="{{ route('admin.homepage.process.edit', $step) }}" class="px-4 py-2 bg-blue-50 text-blue-600 rounded font-semibold text-sm hover:bg-blue-100 transition">
                    Edit Step Details
                </a>
            </div>
        </div>
    @endforeach
</div>
@endsection
