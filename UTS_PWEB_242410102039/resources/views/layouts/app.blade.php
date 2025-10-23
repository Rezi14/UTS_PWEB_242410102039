<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Mini Projek Laravel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="relative md:flex">
        @include('components.navbar', ['username' => $username])

        <div id="sidebar-overlay" class="fixed inset-0 bg-black opacity-50 z-20 md:hidden hidden">

        </div>

        <div class="flex-1 flex flex-col h-screen ">
            <header class="bg-white shadow-md md:hidden sticky top-0 z-10">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16">
                        <div class="shrink-0">
                            <h1 class="text-2xl font-bold text-teal-500">NginapKuy</h1>
                        </div>
                        <div>
                            <button id="menu-toggle" class="text-gray-500 hover:text-gray-900 focus:outline-none">
                                <span class="sr-only">Buka menu</span>
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </header>
            <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 md:ml-64">
                @yield('content')
            </main>

            <div class="md:ml-64 mt-auto">
                <x-footer />
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full')
                overlay.classList.toggle('hidden')
            }

            if (menuToggle) {
                menuToggle.addEventListener('click', toggleSidebar);
            }

            if (overlay) {
                overlay.addEventListener('click', toggleSidebar);
            }
        });
    </script>
</body>
</html>
