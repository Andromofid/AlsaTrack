<nav class="bg-white border-gray-200 shadow-md dark:bg-yellow-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!-- Logo & App Name -->
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <!-- <img src="{{ asset('logo.png') }}" class="h-8" alt="BusTrack Marrakech Logo" /> -->
            <svg class="w-8 h-8 mb-1" fill="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 3H6C3.8 3 2 4.8 2 7V16C2 17.1 2.9 18 4 18V20C4 20.6 4.4 21 5 21H7C7.6 21 8 20.6 8 20V18H16V20C16 20.6 16.4 21 17 21H19C19.6 21 20 20.6 20 20V18C21.1 18 22 17.1 22 16V7C22 4.8 20.2 3 18 3ZM6 5H18C19.1 5 20 5.9 20 7V8H4V7C4 5.9 4.9 5 6 5ZM18 14H6C5.4 14 5 13.6 5 13V10H19V13C19 13.6 18.6 14 18 14Z"></path>
            </svg>
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
                BusTrack Marrakech
            </span>
        </a>

        <!-- Mobile Menu Button -->
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        <!-- Navigation Links -->
        <div class="hidden w-full md:flex md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col items-center p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-yellow-100 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-yellow-900">
                <li>
                    <a href="/" class="block py-2 px-4 text-white font-bold rounded md:bg-transparent md:text-white md:p-0 hover:text-white">
                        Accueil
                    </a>
                </li>
                <li>
                    <a onclick="document.getElementById('start').scrollIntoView({ behavior: 'smooth' });"
                        class="block font-bold py-2 px-4 text-black rounded hover:bg-yellow-200 md:hover:bg-transparent hover:text-white md:p-0">
                        Itinéraire
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="block font-bold py-2 px-4 text-black rounded hover:bg-yellow-200 md:hover:bg-transparent hover:text-white md:p-0">
                        Tarifs
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="block font-bold py-2 px-4 text-black rounded hover:bg-yellow-200 md:hover:bg-transparent hover:text-white md:p-0">
                        Contact
                    </a>
                </li>
                <li>
                    <a class="flex items-center   py-2 px-4 text-white bg-green-700 rounded-lg shadow-md hover:bg-green-700 transition md:ml-4"
                        onclick="document.getElementById('start').scrollIntoView({ behavior: 'smooth' });">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C8.1 2 5 5.1 5 9c0 3.9 5.1 10.3 6.4 11.8.3.3.7.5 1.1.5s.8-.2 1.1-.5C13.9 19.3 19 12.9 19 9c0-3.9-3.1-7-7-7zm0 17.3C10.1 17 7 12.9 7 9c0-2.8 2.2-5 5-5s5 2.2 5 5c0 3.9-3.1 8-5 10.3zM12 5C9.8 5 8 6.8 8 9s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4zm0 6c-1.1 0-2-1-2-2s.9-2 2-2 2 1 2 2-.9 2-2 2z"></path>
                        </svg>
                        Commencer
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>