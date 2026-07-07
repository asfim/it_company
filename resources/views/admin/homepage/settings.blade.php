@extends('admin.homepage.layout')

@section('homepage_title', 'General Settings')

@section('homepage_content')
<form action="{{ route('admin.homepage.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="space-y-8">
        <!-- Hero Section Settings -->
        <div>
            <h2 class="text-xl font-bold text-gray-800 border-b pb-2 mb-4">Hero Section & Stats</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($settings->get('hero', []) as $setting)
                    @if($setting->type === 'image')
                        <div class="col-span-2 md:col-span-1 border border-gray-100 p-4 rounded bg-gray-50">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">{{ $setting->label }}</label>
                            <input type="file" name="{{ $setting->key }}" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 mb-2" />
                            @if(\App\Models\HomepageSetting::getValue($setting->key))
                                <div class="mt-2">
                                    <span class="text-xs text-gray-400 block mb-1">Current Image:</span>
                                    <img src="{{ \App\Models\HomepageSetting::getValue($setting->key) }}" class="h-20 w-32 object-cover rounded border border-gray-200" />
                                </div>
                            @endif
                        </div>
                    @elseif($setting->type === 'textarea')
                        <div class="col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">{{ $setting->label }}</label>
                            <textarea name="{{ $setting->key }}" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500">{{ $setting->value }}</textarea>
                        </div>
                    @else
                        <div class="{{ str_contains($setting->key, 'stat') ? 'col-span-2 md:col-span-1' : 'col-span-2' }}">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">{{ $setting->label }}</label>
                            <input type="text" name="{{ $setting->key }}" value="{{ $setting->value }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Section Headings Settings -->
        @foreach(['services' => 'Services Section Heading', 'wcu' => 'Why Choose Us Heading', 'process' => 'Our Process Heading', 'product' => 'Our Product Heading', 'tech' => 'Technology Section Heading', 'team' => 'Team Section Heading', 'testimonials' => 'Testimonials Section Heading'] as $groupKey => $groupTitle)
            @if($settings->has($groupKey))
                <div class="pt-6 border-t border-gray-200">
                    <h2 class="text-xl font-bold text-gray-800 border-b pb-2 mb-4">{{ $groupTitle }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($settings->get($groupKey) as $setting)
                            @if($setting->type === 'image')
                                <div class="col-span-2 md:col-span-1 border border-gray-100 p-4 rounded bg-gray-50">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">{{ $setting->label }}</label>
                                    <input type="file" name="{{ $setting->key }}" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 mb-2" />
                                    @if(\App\Models\HomepageSetting::getValue($setting->key))
                                        <div class="mt-2">
                                            <span class="text-xs text-gray-400 block mb-1">Current Image:</span>
                                            <img src="{{ \App\Models\HomepageSetting::getValue($setting->key) }}" class="h-20 w-32 object-cover rounded border border-gray-200" />
                                        </div>
                                    @endif
                                </div>
                            @elseif($setting->type === 'textarea')
                                <div class="col-span-2">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">{{ $setting->label }}</label>
                                    <textarea name="{{ $setting->key }}" rows="2" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500">{{ $setting->value }}</textarea>
                                </div>
                            @else
                                <div class="col-span-2 md:col-span-1">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">{{ $setting->label }}</label>
                                    <input type="text" name="{{ $setting->key }}" value="{{ $setting->value }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <!-- Submit Button -->
    <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end">
        <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded shadow-md transition">
            Save All Settings
        </button>
    </div>
</form>
@endsection
