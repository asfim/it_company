<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('homepage_title', 'Homepage Manager') - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Left Sidebar -->
        <aside class="w-64 bg-gray-800 text-white flex flex-col shadow-lg">
            <div class="p-4 border-b border-gray-700">
                <h2 class="text-xl font-bold">Admin Panel</h2>
            </div>
            <nav class="flex-1 p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 rounded-md hover:bg-gray-700 transition">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.homepage.settings.edit') }}" class="flex items-center px-4 py-2 bg-blue-600 rounded-md hover:bg-blue-700 transition font-semibold">
                            Homepage Manager
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.graphics-design.index') }}" class="flex items-center px-4 py-2 rounded-md hover:bg-gray-700 transition">
                            Graphics Design
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="p-4 border-t border-gray-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center w-full px-4 py-2 text-left hover:bg-gray-700 rounded-md transition">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <div class="mb-8 flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Homepage Manager</h1>
                    <p class="text-gray-600 mt-2">Manage images, headings, text blocks, and dynamic sections of the homepage.</p>
                </div>
                <a href="{{ route('home') }}" target="_blank" class="px-4 py-2 bg-gray-200 text-gray-800 font-semibold rounded hover:bg-gray-300 transition text-sm flex items-center gap-1">
                    <span>View Site</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
            </div>

            <!-- Tabs/Navigation -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-8 overflow-x-auto">
                <nav class="flex border-b border-gray-200">
                    @php
                        $route = Route::currentRouteName();
                    @endphp
                    <a href="{{ route('admin.homepage.settings.edit') }}" class="px-6 py-4 border-b-2 text-sm font-medium transition {{ str_contains($route, 'settings') ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                        General Settings
                    </a>
                    <a href="{{ route('admin.homepage.services.index') }}" class="px-6 py-4 border-b-2 text-sm font-medium transition {{ str_contains($route, 'services') ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                        Services (Clock)
                    </a>
                    <a href="{{ route('admin.homepage.wcu.index') }}" class="px-6 py-4 border-b-2 text-sm font-medium transition {{ str_contains($route, 'wcu') ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                        Why Choose Us
                    </a>
                    <a href="{{ route('admin.homepage.process.index') }}" class="px-6 py-4 border-b-2 text-sm font-medium transition {{ str_contains($route, 'process') ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                        Our Process
                    </a>
                    <a href="{{ route('admin.homepage.products.index') }}" class="px-6 py-4 border-b-2 text-sm font-medium transition {{ str_contains($route, 'products') ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                        Products
                    </a>
                    <a href="{{ route('admin.homepage.technologies.index') }}" class="px-6 py-4 border-b-2 text-sm font-medium transition {{ str_contains($route, 'technologies') ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                        Technologies
                    </a>
                    <a href="{{ route('admin.homepage.team.index') }}" class="px-6 py-4 border-b-2 text-sm font-medium transition {{ str_contains($route, 'team') ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                        Team Members
                    </a>
                    <a href="{{ route('admin.homepage.testimonials.index') }}" class="px-6 py-4 border-b-2 text-sm font-medium transition {{ str_contains($route, 'testimonials') ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                        Testimonials
                    </a>
                </nav>
            </div>

            @if(session('success'))
                <div class="mb-6 rounded-lg bg-green-50 border border-green-200 p-4 text-green-700 shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Content Area -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
                @yield('homepage_content')
            </div>
        </main>
    </div>
</body>
</html>
