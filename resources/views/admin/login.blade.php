<x-app>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
            <div class="flex justify-center items-center mb-8">
                <a href="/" class="flex items-center space-x-3">
                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 3H6C3.8 3 2 4.8 2 7V16C2 17.1 2.9 18 4 18V20C4 20.6 4.4 21 5 21H7C7.6 21 8 20.6 8 20V18H16V20C16 20.6 16.4 21 17 21H19C19.6 21 20 20.6 20 20V18C21.1 18 22 17.1 22 16V7C22 4.8 20.2 3 18 3ZM6 5H18C19.1 5 20 5.9 20 7V8H4V7C4 5.9 4.9 5 6 5ZM18 14H6C5.4 14 5 13.6 5 13V10H19V13C19 13.6 18.6 14 18 14Z"></path>
                    </svg>
                    <span class="text-3xl font-bold text-yellow-700">BusTrack Marrakech</span>
                </a>
            </div>
            <h2 class="text-2xl font-bold text-black-900 text-center mb-6">Connexion Admin</h2>

            @if($errors->any())
            <div class="mb-4">
                <ul class="text-sm text-red-600">
                    @foreach($errors->all() as $error)
                    <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-black-900 font-medium mb-1">Email</label>
                    <input type="email" name="email" class="w-full p-2 border rounded focus:ring-yellow-700 focus:border-yellow-700" required>
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label class="block text-black-900 font-medium mb-1">Mot de passe</label>
                    <input type="password" name="password" class="w-full p-2 border rounded focus:ring-yellow-700 focus:border-yellow-700" required>
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-yellow-700 hover:bg-yellow-900 text-white font-semibold py-2 px-4 rounded transition">
                    Connexion
                </button>
            </form>
        </div>
    </div>
</x-app>