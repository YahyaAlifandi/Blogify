<div>
    <div class="bg-gray-50">
        <div class="flex min-h-screen">
            <!-- Sidebar -->
            <aside class="w-64 bg-white shadow-lg fixed h-screen overflow-y-auto">
                <div class="p-5">
                    <div class="text-xl font-semibold text-blue-600">Blogify</div>
                </div>
                <div class="p-5">
                    <a href="/admin-panel"
                        class="flex items-center p-3 text-gray-600 hover:bg-gray-100 hover:text-blue-600 rounded-lg transition duration-300">
                        <i class="fas fa-home w-8"></i>
                        Dashboard
                    </a>
                    <a href="/user-panel"
                        class="flex items-center p-3 text-gray-600 hover:bg-gray-100 hover:text-blue-600 rounded-lg transition duration-300">
                        <i class="fas fa-person w-8"></i>
                        User
                    </a>
                    <a href="/blog-panel"
                        class="flex items-center p-3 text-gray-600 hover:bg-gray-100 hover:text-blue-600 rounded-lg transition duration-300">
                        <i class="fas fa-book w-8"></i>
                        Blog
                    </a>
                    <a href="/report-panel"
                        class="flex items-center p-3 text-gray-600 hover:bg-gray-100 hover:text-blue-600 rounded-lg transition duration-300">
                        <i class="fas fa-file-alt w-8"></i>
                        Reporting
                    </a>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 ml-64 p-8">
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-2xl font-semibold">User Overview</h1>
                    <div class="flex space-x-4">
                        <button class="p-2 text-gray-600 hover:text-blue-600"><i class="fas fa-search"></i></button>
                        <button class="p-2 text-gray-600 hover:text-blue-600"><i class="fas fa-bell"></i> 15+</button>
                    </div>
                </div>
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full bg-white ">
                        <thead class="bg-gray-50 ">
                            <tr class="">
                                <th class="py-2 px-4 text-left text-sm font-medium text-gray-500">
                                    Photo
                                </th>
                                <th class="py-2 px-4 text-left text-sm font-medium text-gray-500">
                                    Member name
                                </th>
                                <th class="py-2 px-4 text-left text-sm font-medium text-gray-500">
                                    Email
                                </th>
                                <th class="py-2 px-4 text-left text-sm font-medium text-gray-500">
                                    Operation
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user_data as $item)
                            <tr class="border-b">
                                <td class="py-2 px-4">
                                    <img alt="Profile picture of George Lindelof" class="rounded-full w-10 h-10"
                                        height="40"
                                        src="{{ asset('storage/'. (trim($item->image_profile, '"') ?? 'images/default.jpg')) }}"
                                        width="40" />
                                </td>
                                <td class="py-2 px-4 text-sm text-gray-700">
                                    {{ $item->nama }}
                                </td>
                                <td class="py-2 px-4 text-sm text-gray-700">
                                    {{ $item->email }}
                                </td>
                                <td class="py-2 px-4 text-start">
                                    <div class="flex w-20 justify-center items-center gap-2">
                                        <button wire:click="delete({{ $item->id_users }})">
                                            <i class="fas fa-trash-alt text-rose-600">
                                            </i>
                                        </button>
                                        <button wire:click="view({{ $item->id_users }})">
                                            <i class="fa-solid fa-eye text-blue-600"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</div>

