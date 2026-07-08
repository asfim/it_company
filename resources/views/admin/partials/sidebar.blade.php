<aside id="sidebar-menu" class="w-64 bg-gray-800 text-white flex flex-col shadow-lg h-screen fixed md:sticky top-0 left-0 z-40 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out overflow-y-auto">
    <div class="p-4 border-b border-gray-700 flex items-center justify-between">
        <h2 class="text-xl font-bold">Admin Panel</h2>
        <button onclick="toggleSidebar()" class="md:hidden text-gray-400 hover:text-white p-1 cursor-pointer focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    <nav class="flex-1 p-4">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 rounded-md transition {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white font-semibold hover:bg-blue-700' : 'hover:bg-gray-700 text-gray-300 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.get-started.index') }}" class="flex items-center px-4 py-2 rounded-md transition {{ request()->routeIs('admin.get-started.*') ? 'bg-blue-600 text-white font-semibold hover:bg-blue-700' : 'hover:bg-gray-700 text-gray-300 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Submissions
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-4 py-2 rounded-md transition hover:bg-gray-700 text-gray-300 hover:text-white">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    Users
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-4 py-2 rounded-md transition hover:bg-gray-700 text-gray-300 hover:text-white">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    Reports
                </a>
            </li>
            <li>
                <a href="{{ route('admin.homepage.settings.edit') }}" class="flex items-center px-4 py-2 rounded-md transition {{ request()->routeIs('admin.homepage.*') ? 'bg-blue-600 text-white font-semibold hover:bg-blue-700' : 'hover:bg-gray-700 text-gray-300 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Homepage Manager
                </a>
            </li>
            <li>
                <a href="{{ route('admin.blogs.index') }}" class="flex items-center px-4 py-2 rounded-md transition {{ request()->routeIs('admin.blogs.*') ? 'bg-blue-600 text-white font-semibold hover:bg-blue-700' : 'hover:bg-gray-700 text-gray-300 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 4a2 2 0 00-2-2m2 2v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6a2 2 0 012-2h3m7 11h-1.5M9 8h.01M9 12h5m-5 4h5"></path>
                    </svg>
                    Blogs Manager
                </a>
            </li>
            
            <!-- Services Manager -->
            <li class="px-4 py-2 mt-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                Services
            </li>
            <li>
                <a href="{{ route('admin.services.index', 'web-app') }}" class="flex items-center px-4 py-2 rounded-md transition {{ request()->is('admin/services/web-app*') ? 'bg-blue-600 text-white font-semibold hover:bg-blue-700' : 'hover:bg-gray-700 text-gray-300 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Web Application
                </a>
            </li>
            <li>
                <a href="{{ route('admin.services.index', 'web-dev') }}" class="flex items-center px-4 py-2 rounded-md transition {{ request()->is('admin/services/web-dev*') ? 'bg-blue-600 text-white font-semibold hover:bg-blue-700' : 'hover:bg-gray-700 text-gray-300 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                    </svg>
                    Web Development
                </a>
            </li>
            <li>
                <a href="{{ route('admin.services.index', 'software') }}" class="flex items-center px-4 py-2 rounded-md transition {{ request()->is('admin/services/software*') ? 'bg-blue-600 text-white font-semibold hover:bg-blue-700' : 'hover:bg-gray-700 text-gray-300 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Custom Software
                </a>
            </li>
            <li>
                <a href="{{ route('admin.services.index', 'marketing') }}" class="flex items-center px-4 py-2 rounded-md transition {{ request()->is('admin/services/marketing*') ? 'bg-blue-600 text-white font-semibold hover:bg-blue-700' : 'hover:bg-gray-700 text-gray-300 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                    </svg>
                    Digital Marketing
                </a>
            </li>
            <li>
                <a href="{{ route('admin.graphics-design.index') }}" class="flex items-center px-4 py-2 rounded-md transition {{ request()->routeIs('admin.graphics-design.*') ? 'bg-blue-600 text-white font-semibold hover:bg-blue-700' : 'hover:bg-gray-700 text-gray-300 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Graphics Design
                </a>
            </li>
            <li>
                <a href="{{ route('admin.services.index', 'ui-ux') }}" class="flex items-center px-4 py-2 rounded-md transition {{ request()->is('admin/services/ui-ux*') ? 'bg-blue-600 text-white font-semibold hover:bg-blue-700' : 'hover:bg-gray-700 text-gray-300 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                    UI/UX Design
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-4 py-2 rounded-md transition hover:bg-gray-700 text-gray-300 hover:text-white">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Settings
                </a>
            </li>
        </ul>
    </nav>
    <div class="p-4 border-t border-gray-700">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center w-full px-4 py-2 text-left hover:bg-gray-700 rounded-md transition text-gray-300 hover:text-white">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                Logout
            </button>
        </form>
    </div>
</aside>
