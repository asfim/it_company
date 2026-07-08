<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Started Submissions - Admin</title>
    <!-- Favicon -->
    @if(\App\Models\HomepageSetting::getValue('site_favicon'))
        <link rel="icon" type="image/x-icon" href="{{ \App\Models\HomepageSetting::getValue('site_favicon') }}">
    @else
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    @endif
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        @include('admin.partials.sidebar')

        <main class="flex-1">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Get Started Submissions</h1>
                <p class="text-gray-600 mt-2">View and manage requests submitted from the "Get Started" header popup modal.</p>
            </div>

            @if(session('success'))
                <div class="mb-6 rounded-lg bg-green-50 border border-green-200 p-4 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Phone</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Service</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Message</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Email Notification</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Submitted At</th>
                            <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider text-gray-500">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse($submissions as $submission)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                    {{ $submission->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 font-semibold">
                                    {{ $submission->phone ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    <span class="inline-flex items-center rounded-full bg-blue-50 px-2.5 py-0.5 text-xs font-medium text-blue-700">
                                        {{ $submission->service }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate" title="{{ $submission->message }}">
                                    {{ $submission->message }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    @if($submission->mail_sent)
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">
                                            <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                            Sent
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-100 px-2.5 py-0.5 text-xs font-medium text-amber-800">
                                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                            Not Sent
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ \Carbon\Carbon::parse($submission->created_at)->format('M d, Y h:i A') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-3">
                                        <!-- View Modal Trigger -->
                                        <button onclick="openModal('{{ addslashes($submission->name) }}', '{{ addslashes($submission->phone ?? 'N/A') }}', '{{ addslashes($submission->service) }}', '{{ addslashes(str_replace(["\r", "\n"], ' ', $submission->message)) }}', '{{ \Carbon\Carbon::parse($submission->created_at)->format('M d, Y h:i A') }}')" 
                                            class="text-blue-600 hover:text-blue-900 font-semibold cursor-pointer">
                                            View
                                        </button>
                                        
                                        <form method="POST" action="{{ route('admin.get-started.destroy', $submission->id) }}" 
                                            onsubmit="return confirm('Are you sure you want to delete this submission?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 font-semibold cursor-pointer">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-sm text-gray-500">No submissions found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="mt-6">
                {{ $submissions->links() }}
            </div>
        </main>
    </div>

    <!-- Modal View -->
    <div id="viewModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex min-h-screen items-end justify-center px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeModal()"></div>

            <!-- Modal panel -->
            <span class="hidden sm:inline-block sm:h-screen sm:align-middle" aria-hidden="true">&#8203;</span>
            <div class="relative inline-block transform overflow-hidden rounded-lg bg-white text-left align-middle shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-6 pt-5 pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-left sm:mt-0 sm:ml-4 w-full">
                            <h3 class="text-lg font-bold leading-6 text-gray-900" id="modalName">Submission Details</h3>
                            <div class="mt-4 border-t border-gray-200 pt-4 space-y-3">
                                <div>
                                    <span class="block text-xs font-medium text-gray-400 uppercase">Phone Number</span>
                                    <span class="text-sm font-semibold text-gray-800" id="modalPhone"></span>
                                </div>
                                <div>
                                    <span class="block text-xs font-medium text-gray-400 uppercase">Service Requested</span>
                                    <span class="text-sm font-semibold text-gray-800" id="modalService"></span>
                                </div>
                                <div>
                                    <span class="block text-xs font-medium text-gray-400 uppercase">Submitted On</span>
                                    <span class="text-sm text-gray-600" id="modalDate"></span>
                                </div>
                                <div>
                                    <span class="block text-xs font-medium text-gray-400 uppercase">Message</span>
                                    <p class="text-sm text-gray-700 whitespace-pre-line mt-1 bg-gray-50 p-3 rounded-md border border-gray-150" id="modalMessage"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-6 py-3 sm:flex sm:flex-row-reverse">
                    <button type="button" onclick="closeModal()" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto cursor-pointer">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal(name, phone, service, message, date) {
            document.getElementById('modalName').innerText = name + "'s Submission";
            document.getElementById('modalPhone').innerText = phone;
            document.getElementById('modalService').innerText = service;
            document.getElementById('modalMessage').innerText = message;
            document.getElementById('modalDate').innerText = date;
            
            document.getElementById('viewModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('viewModal').classList.add('hidden');
        }
    </script>
</body>
</html>
