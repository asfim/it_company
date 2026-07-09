@extends('layouts.admin')

@section('title', 'Footer & Contact Settings - Admin')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Footer Settings</h1>
        <p class="text-gray-600 mt-2">Manage the footer logo, description, and social media links.</p>
    </div>
    <a href="{{ route('home') }}" target="_blank" class="px-4 py-2 bg-gray-200 text-gray-800 font-semibold rounded hover:bg-gray-300 transition text-sm flex items-center gap-1">
        <span>View Site</span>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
    </a>
</div>

@if(session('success'))
    <div class="mb-6 rounded-lg bg-green-50 border border-green-200 p-4 text-green-700 shadow-sm">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="mb-6 rounded-lg bg-red-50 border border-red-200 p-4 text-red-700 shadow-sm">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Left Column: General Footer & Contact Settings (Form takes 2 cols) -->
    <div class="lg:col-span-2 bg-white rounded-lg shadow-sm border border-gray-200 p-8 h-fit">
        <h2 class="text-xl font-bold text-gray-800 border-b pb-3 mb-6">General Information</h2>
        <form action="{{ route('admin.footer.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                @foreach($settings as $setting)
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">{{ $setting->label }}</label>
                        @if($setting->type === 'textarea')
                            <textarea name="{{ $setting->key }}" rows="4" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500">{{ $setting->value }}</textarea>
                        @elseif($setting->type === 'image')
                            <div class="border border-gray-100 p-4 rounded bg-gray-50">
                                <input type="file" name="{{ $setting->key }}" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 mb-2" />
                                @if($setting->value)
                                    <div class="mt-2">
                                        <span class="text-xs text-gray-400 block mb-1">Current Image:</span>
                                        <img src="{{ \App\Models\HomepageSetting::getValue($setting->key) }}" class="h-20 w-auto object-contain rounded border border-gray-200 bg-white p-1" />
                                    </div>
                                @endif
                            </div>
                        @else
                            <input type="text" name="{{ $setting->key }}" value="{{ $setting->value }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end">
                <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded shadow-md transition">
                    Save Footer Settings
                </button>
            </div>
        </form>
    </div>

    <!-- Right Column: Dynamic Social Media Links (Takes 1 col) -->
    <div class="space-y-8">
        <!-- Social Links List -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h2 class="text-xl font-bold text-gray-800 border-b pb-3 mb-6">Social Media Links</h2>
            
            @if($socialLinks->isEmpty())
                <p class="text-gray-500 text-sm">No social media links added yet.</p>
            @else
                <div class="space-y-4">
                    @foreach($socialLinks as $link)
                        @php
                            $iconClass = match($link->platform) {
                                'facebook' => 'bg-blue-600 text-white',
                                'twitter', 'x' => 'bg-black text-white',
                                'instagram' => 'bg-pink-600 text-white',
                                'linkedin' => 'bg-blue-700 text-white',
                                'youtube' => 'bg-red-600 text-white',
                                'github' => 'bg-gray-800 text-white',
                                'tiktok' => 'bg-black text-white',
                                'pinterest' => 'bg-red-700 text-white',
                                'whatsapp' => 'bg-green-500 text-white',
                                default => 'bg-gray-500 text-white',
                            };
                            $platformLabel = ucwords($link->platform === 'x' ? 'Twitter / X' : $link->platform);
                        @endphp
                        <div class="flex items-center justify-between p-3 border border-gray-100 rounded bg-gray-50">
                            <div class="flex items-center gap-3 overflow-hidden mr-2">
                                <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center rounded-full text-xs font-bold uppercase {{ $iconClass }}">
                                    {{ substr($link->platform, 0, 2) }}
                                </span>
                                <div class="overflow-hidden">
                                    <h4 class="text-sm font-semibold text-gray-800 leading-tight">{{ $platformLabel }}</h4>
                                    <p class="text-xs text-gray-400 truncate max-w-xs" title="{{ $link->url }}">{{ $link->url }}</p>
                                </div>
                            </div>
                            <form action="{{ route('admin.footer.social-links.destroy', $link->id) }}" method="POST" class="flex-shrink-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this link?')" class="text-red-500 hover:text-red-700 p-1.5 rounded-full hover:bg-red-50 transition cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Add Social Link Form -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 border-b pb-3 mb-4">Add New Social Link</h3>
            <form action="{{ route('admin.footer.social-links.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Select Platform</label>
                        <select name="platform" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="facebook">Facebook</option>
                            <option value="x">Twitter / X</option>
                            <option value="instagram">Instagram</option>
                            <option value="linkedin">LinkedIn</option>
                            <option value="youtube">YouTube</option>
                            <option value="github">GitHub</option>
                            <option value="tiktok">TikTok</option>
                            <option value="pinterest">Pinterest</option>
                            <option value="whatsapp">WhatsApp</option>
                            <option value="other">Website / Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Profile / Web URL</label>
                        <input type="url" name="url" placeholder="https://example.com/username" required class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
                    </div>
                    <button type="submit" class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded shadow transition">
                        Add Link
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
