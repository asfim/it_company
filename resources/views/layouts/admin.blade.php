<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <!-- Favicon -->
    @if(\App\Models\HomepageSetting::getValue('site_favicon'))
        <link rel="icon" type="image/x-icon" href="{{ \App\Models\HomepageSetting::getValue('site_favicon') }}">
    @else
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    @endif
    <script src="https://cdn.tailwindcss.com"></script>
    @stack('styles')
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Left Sidebar -->
        @include('admin.partials.sidebar')

        <!-- Main Content -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>
</html>
