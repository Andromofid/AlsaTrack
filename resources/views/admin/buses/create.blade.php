<x-admin-app>
    @if(session('success'))
    <p style="color:green" class="m-auto">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('buses.store') }}" class="p-5">
        @csrf

        <div class="text-center py-6">
            <h1 class="text-3xl font-bold text-black-900">
                Add a New Bus 🚌
            </h1>
            <p class="mt-1 text-sm text-gray-600">Entrez le numéro du bus que vous souhaitez ajouter.</p>
        </div>

        <div>
            <label for="n_bus" class="block mb-2 text-sm font-medium text-gray-900">Numéro du Bus</label>
            <input type="text" name="n_bus" id="n_bus" placeholder="ex: 1234" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                value="{{ old('n_bus') }}">
        </div>


        <button type="submit"
            class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-blue-300
           font-medium rounded-lg text-sm px-6 py-2.5 text-center my-4">
            Save Bus
        </button>

    </form>
</x-admin-app>