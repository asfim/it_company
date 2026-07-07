@extends('admin.homepage.layout')

@section('homepage_title', 'Why Choose Us')

@section('homepage_content')
<div class="mb-6">
    <h2 class="text-xl font-bold text-gray-800">Why Choose Us Cards</h2>
    <p class="text-sm text-gray-500">Edit the details of the 4 cards shown in the Why Choose Us grid.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @foreach($cards as $card)
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 flex flex-col justify-between shadow-sm">
            <div>
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-green-100 text-green-600 rounded-lg">
                        {!! $card->icon_svg !!}
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">{{ $card->title }}</h3>
                </div>
                <p class="text-sm text-gray-600 line-clamp-3 mb-4">{{ $card->description }}</p>
                <div class="text-xs text-gray-400 font-mono">Sort Order: {{ $card->sort_order }}</div>
            </div>
            <div class="mt-6 flex justify-end border-t pt-4 border-gray-100">
                <a href="{{ route('admin.homepage.wcu.edit', $card) }}" class="px-4 py-2 bg-blue-50 text-blue-600 rounded font-semibold text-sm hover:bg-blue-100 transition">
                    Edit Card Details
                </a>
            </div>
        </div>
    @endforeach
</div>
@endsection
