@extends('layouts.admin')

@section('title', 'Edit Blog Post - Admin')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Edit Blog Post</h1>
        <p class="text-gray-600 mt-2">Modify details, alter featured status, or upload a new image for this post.</p>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 max-w-4xl">
        @if($errors->any())
            <div class="mb-6 rounded-lg bg-red-50 border border-red-200 p-4 text-red-700">
                <ul class="list-disc space-y-1 pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.blogs.update', $blog) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-4">
                    <div>
                        <label for="title" class="block text-gray-700 font-medium mb-2">Title <span class="text-red-500">*</span></label>
                        <input type="text" id="title" name="title" value="{{ old('title', $blog->title) }}" required placeholder="e.g. Scaling Web Apps in 2026" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <div>
                        <label for="category" class="block text-gray-700 font-medium mb-2">Category <span class="text-red-500">*</span></label>
                        <select id="category" name="category" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="" disabled>Choose a category...</option>
                            <option value="dev" {{ old('category', $blog->category) == 'dev' ? 'selected' : '' }}>Development</option>
                            <option value="design" {{ old('category', $blog->category) == 'design' ? 'selected' : '' }}>Design & UX</option>
                            <option value="publishing" {{ old('category', $blog->category) == 'publishing' ? 'selected' : '' }}>Amazon Publishing</option>
                            <option value="marketing" {{ old('category', $blog->category) == 'marketing' ? 'selected' : '' }}>Growth Marketing</option>
                        </select>
                    </div>

                    <div>
                        <label for="excerpt" class="block text-gray-700 font-medium mb-2">Excerpt <span class="text-red-500">*</span></label>
                        <input type="text" id="excerpt" name="excerpt" value="{{ old('excerpt', $blog->excerpt) }}" required placeholder="A short description for listing grids" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <div class="border-t border-gray-100 pt-4">
                        <label class="block text-gray-700 font-semibold mb-3">Feature Image Options</label>
                        
                        <div class="mb-4">
                            <label for="image" class="block text-gray-600 text-sm font-medium mb-2">Upload New Image</label>
                            <input type="file" id="image" name="image" accept="image/*" class="w-full text-sm text-gray-600 file:mr-4 file:rounded-full file:border-0 file:bg-blue-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-blue-700 hover:file:bg-blue-100" />
                        </div>

                        <div>
                            <label for="image_url" class="block text-gray-600 text-sm font-medium mb-2">OR Image URL (Unsplash or preset path)</label>
                            <input type="text" id="image_url" name="image_url" value="{{ old('image_url', $blog->image_url) }}" placeholder="e.g. images/webapp_side_img.png" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-4">
                    <div>
                        <label for="author_name" class="block text-gray-700 font-medium mb-2">Author Name <span class="text-red-500">*</span></label>
                        <input type="text" id="author_name" name="author_name" value="{{ old('author_name', $blog->author_name) }}" required placeholder="e.g. Mahmud Sabuj" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="author_avatar_text" class="block text-gray-700 font-medium mb-2">Avatar Initials <span class="text-red-500">*</span></label>
                            <input type="text" id="author_avatar_text" name="author_avatar_text" value="{{ old('author_avatar_text', $blog->author_avatar_text) }}" required placeholder="e.g. MS" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                        <div>
                            <label for="read_time" class="block text-gray-700 font-medium mb-2">Read Time <span class="text-red-500">*</span></label>
                            <input type="text" id="read_time" name="read_time" value="{{ old('read_time', $blog->read_time) }}" required placeholder="e.g. 5 min read" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>
                    </div>

                    <div>
                        <label for="author_role" class="block text-gray-700 font-medium mb-2">Author Role / Designation <span class="text-red-500">*</span></label>
                        <input type="text" id="author_role" name="author_role" value="{{ old('author_role', $blog->author_role) }}" required placeholder="e.g. Chief Technology Officer" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>

                    <div class="pt-4 flex items-center">
                        <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $blog->is_featured) ? 'checked' : '' }} class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
                        <label for="is_featured" class="ml-2 block text-gray-700 font-semibold cursor-pointer">Mark as Featured Post (unchecks other featured posts)</label>
                    </div>

                    @if($blog->image_url)
                        <div class="border-t border-gray-150 pt-4">
                            <p class="text-xs text-gray-400 font-medium uppercase mb-2">Current Cover Image Preview</p>
                            <img src="{{ asset($blog->image_url) }}" alt="{{ $blog->title }}" class="h-32 w-full object-cover rounded-lg border border-gray-200 bg-gray-50" />
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-6">
                <label for="content" class="block text-gray-700 font-medium mb-2">Full Content <span class="text-red-500">*</span></label>
                <textarea id="content" name="content" rows="12" required placeholder="Write the full post contents here..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 font-sans">{{ old('content', $blog->content) }}</textarea>
            </div>

            <div class="flex gap-4 mt-6">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2.5 rounded-md hover:bg-blue-700 transition font-semibold cursor-pointer">Save Changes</button>
                <a href="{{ route('admin.blogs.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2.5 rounded-md hover:bg-gray-400 transition font-semibold">Cancel</a>
            </div>
        </form>
    </div>
@endsection
