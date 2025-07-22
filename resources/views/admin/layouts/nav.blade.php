<nav class="bg-yellow-900 shadow-md">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!-- Logo & Title -->
        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3">
            <svg class="w-8 h-8 mb-1" fill="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 3H6C3.8 3 2 4.8 2 7V16C2 17.1 2.9 18 4 18V20C4 20.6 4.4 21 5 21H7C7.6 21 8 20.6 8 20V18H16V20C16 20.6 16.4 21 17 21H19C19.6 21 20 20.6 20 20V18C21.1 18 22 17.1 22 16V7C22 4.8 20.2 3 18 3ZM6 5H18C19.1 5 20 5.9 20 7V8H4V7C4 5.9 4.9 5 6 5ZM18 14H6C5.4 14 5 13.6 5 13V10H19V13C19 13.6 18.6 14 18 14Z"></path>
            </svg>
            <span class="text-2xl font-semibold text-white">Admin | BusTrack</span>
        </a>

        <!-- Hamburger -->
        <button data-collapse-toggle="admin-nav" type="button"
            class="inline-flex items-center p-2 w-10 h-10 text-sm text-white rounded-lg md:hidden hover:bg-yellow-800 focus:outline-none focus:ring-2 focus:ring-yellow-600"
            aria-controls="admin-nav" aria-expanded="false">
            <span class="sr-only">Open menu</span>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Navigation Links -->
        <div class="hidden w-full md:flex md:w-auto" id="admin-nav">
            <ul class="font-medium flex flex-col md:flex-row items-center mt-4 md:mt-0 md:space-x-8 text-white">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="block py-2 px-4 hover:text-yellow-200 font-bold">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('stop.index') }}"
                        class="block py-2 px-4 hover:text-yellow-200 font-bold">Liste des bus</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-4 hover:text-yellow-200 font-bold">Ajouter un bus</a>
                </li>
                <li>
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="flex items-center gap-2 py-2 px-4 bg-red-600 text-white hover:bg-red-700 rounded font-bold transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 002 2h3a2 2 0 002-2V7a2 2 0 00-2-2h-3a2 2 0 00-2 2v1" />
                            </svg>
                            Déconnexion
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>