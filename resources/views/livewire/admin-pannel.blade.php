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
                    <h1 class="text-2xl font-semibold">Dashboard Overview</h1>
                    <div class="flex space-x-4">
                        <button class="p-2 text-gray-600 hover:text-blue-600"><i class="fas fa-search"></i></button>
                        <button class="p-2 text-gray-600 hover:text-blue-600"><i class="fas fa-bell"></i> 15+</button>
                    </div>
                </div>
                <div class="grid grid-cols-2 justify-center items-center w-full gap-5">
                    <div class="grid col-span-1 bg-white rounded-lg p-5 shadow-lg shadow-black/5">
                        <h1 class="text-xl font-bold text-gray-600">User</h1>
                        <p class="text-gray-600">User yang menggunakan web saat ini <span class="font-bold">{{ $user_total }}</span></p>
                    </div>
                    <div class="grid col-span-1 bg-white rounded-lg p-5 shadow-lg shadow-black/5">
                        <h1 class="text-xl font-bold text-blue-600">Blog</h1>
                        <p class="text-gray-600">Blog yang terposting pada web saat ini <span class="font-bold">{{ $blog_total }}</span></p>
                    </div>
                    <div class="grid col-span-2 bg-white rounded-lg p-5 shadow-lg shadow-black/5">
                        <h1 class="text-xl font-bold text-rose-600">Report</h1>
                        <p class="text-gray-600">Laporan yang dilaporkan oleh user saat ini <span class="font-bold">20</span></p>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
