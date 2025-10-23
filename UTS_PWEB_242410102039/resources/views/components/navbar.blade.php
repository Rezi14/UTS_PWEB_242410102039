@props(['username' => $username])

<aside id="sidebar"
       class="bg-gray-800 text-white w-64 h-screen fixed inset-y-0 left-0 z-30
              flex flex-col
              transform -translate-x-full md:translate-x-0
              transition-transform duration-300 ease-in-out">

    <div class="shrink-0 p-4 border-b border-gray-700">
        <h1 class="text-2xl font-bold text-teal-400">
            NginapKuy
        </h1>
    </div>

    <nav class="mt-4 flex-1 overflow-y-auto">
        <a href="{{ route('dashboard', ['username' => $username]) }}"
           class="{{ request()->routeIs('dashboard') ? 'bg-teal-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}
                  block px-4 py-3 rounded-md text-sm font-medium mx-2 my-1 transition-colors duration-150">
            Dashboard
        </a>
        <a href="{{ route('pengelolaan', ['username' => $username]) }}"
           class="{{ request()->routeIs('pengelolaan') ? 'bg-teal-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}
                  block px-4 py-3 rounded-md text-sm font-medium mx-2 my-1 transition-colors duration-150">
            Pengelolaan
        </a>
        <a href="{{ route('profile', ['username' => $username]) }}"
           class="{{ request()->routeIs('profile') ? 'bg-teal-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}
                  block px-4 py-3 rounded-md text-sm font-medium mx-2 my-1 transition-colors duration-150">
            Profile
        </a>
    </nav>
    <div class="shrink-0 p-4 border-t border-gray-700">
        <a href="{{ route('logout') }}"
           class="block w-full text-center bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md text-sm font-medium transition-colors duration-150">
            Logout
        </a>
    </div>
</aside>
