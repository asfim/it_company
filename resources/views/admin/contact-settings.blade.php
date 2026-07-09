@extends('layouts.admin')

@section('title', 'Contact Settings - Admin')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Contact Settings</h1>
        <p class="text-gray-600 mt-2">Manage the office address, phone number, email address, working hours, and Google Map details.</p>
    </div>
    <a href="{{ route('contact') }}" target="_blank" class="px-4 py-2 bg-gray-200 text-gray-800 font-semibold rounded hover:bg-gray-300 transition text-sm flex items-center gap-1">
        <span>View Contact Page</span>
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

<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
    <form action="{{ route('admin.contact.settings.update') }}" method="POST" enctype="multipart/form-data">
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
                Save Contact Settings
            </button>
        </div>
    </form>
</div>
@endsection
