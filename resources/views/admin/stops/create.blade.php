<x-app>


    @if(session('success'))
    <p style="color:green" class="m-auto">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('stop.store') }}" class="p-5 ">
        @csrf

        <input type="hidden" name="bucs_id" value="{{ $bus->id }}">
        <h1 class="text-center">Add Stop to Bus ID: {{ $bus->n_bus }}</h1>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Stop Name</label>
                <input type="text" name="name" id="name" placeholder="e.g. Bab Ghemat 2" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
            </div>

            <div>
                <label for="stop_order" class="block mb-2 text-sm font-medium text-gray-900">Stop Order</label>
                <input type="number" name="stop_order" id="stop_order" placeholder="e.g. 1"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
            </div>

            <div>
                <label for="latitude" class="block mb-2 text-sm font-medium text-gray-900">Latitude</label>
                <input type="text" name="latitude" id="latitude" placeholder="31.6325"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required/>
            </div>

            <div>
                <label for="longitude" class="block mb-2 text-sm font-medium text-gray-900">Longitude</label>
                <input type="text" value="-" name="longitude" id="longitude" placeholder="-7.9895"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required/>
            </div>
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center">
            Save Stop
        </button>
    </form>


    <div class="relative overflow-x-auto shadow-md rounded-lg p-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-lg">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Order
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Lat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        lon
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($bus->stops->reverse() as $stop)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$stop->name}}
                    </th>
                    <td class="px-6 py-4">
                        {{$stop->stop_order}}

                    </td>
                    <td class="px-6 py-4">
                        {{$stop->latitude}}

                    </td>
                    <td class="px-6 py-4">
                        {{$stop->longitude}}
                        
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{route('stop.destroy',$stop->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button  class="font-medium text-red-600 hover:underline">supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app>