<x-app>
    <!-- Header Section with Background -->
    <section class="relative h-[50vh] bg-cover bg-center flex items-center justify-center text-center px-4"
        style="background-image: url('{{ asset('header3.jpg') }}');">
        <div class="absolute inset-0 bg-black/40"></div>

        <div class="relative z-10 max-w-2xl text-white">
            <h1 class="text-4xl sm:text-5xl font-bold mb-4">Contactez-nous</h1>
            <p class="text-lg sm:text-xl">
                Nous sommes à votre écoute pour toute question ou suggestion concernant l'application BusTrack.
            </p>
        </div>
    </section>
    <div class="max-w-6xl mx-auto mt-20 px-4 md:px-8">
        
        <!-- Content Grid -->
        <div class="grid md:grid-cols-2 gap-10 items-start">
            <!-- Left: Contact Info -->
            <div class="space-y-6 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold mb-4">Contactez-nous</h2>
                <p class="text-gray-600 mb-6">
                    Si vous avez des questions, des suggestions ou des problèmes avec l'application, n'hésitez pas à nous contacter.
                </p>

                <!-- Téléphone -->
                <div class="flex items-start gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7" viewBox="0 0 640 640">
                        <path d="M224.2 89C216.3 70.1 195.7 60.1 176.1 65.4L170.6 66.9C106 84.5 50.8 147.1 66.9 223.3C104 398.3 241.7 536 416.7 573.1C493 589.3 555.5 534 573.1 469.4L574.6 463.9C580 444.2 569.9 423.6 551.1 415.8L453.8 375.3C437.3 368.4 418.2 373.2 406.8 387.1L368.2 434.3C297.9 399.4 241.3 341 208.8 269.3L253 233.3C266.9 222 271.6 202.9 264.8 186.3L224.2 89z" />
                    </svg>
                    <div>
                        <p class="font-semibold text-gray-800">Téléphone :</p>
                        <a href="tel:+212777527159" class="text-gray-600 hover:text-yellow-700">+212 777 527 159</a>
                    </div>
                </div>

                <!-- WhatsApp -->
                <div class="flex items-start gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7" viewBox="0 0 640 640">
                        <path d="M476.9 161.1C435 119.1 379.2 96 319.9 96C197.5 96 97.9 195.6 97.9 318C97.9 357.1 108.1 395.3 127.5 429L96 544L213.7 513.1C246.1 530.8 282.6 540.1 319.8 540.1L319.9 540.1C442.2 540.1 544 440.5 544 318.1C544 258.8 518.8 203.1 476.9 161.1zM319.9 502.7C286.7 502.7 254.2 493.8 225.9 477L219.2 473L149.4 491.3L168 423.2L163.6 416.2C145.1 386.8 135.4 352.9 135.4 318C135.4 216.3 218.2 133.5 320 133.5C369.3 133.5 415.6 152.7 450.4 187.6C485.2 222.5 506.6 268.8 506.5 318.1C506.5 419.9 421.6 502.7 319.9 502.7zM421.1 364.5C415.6 361.7 388.3 348.3 383.2 346.5C378.1 344.6 374.4 343.7 370.7 349.3C367 354.9 356.4 367.3 353.1 371.1C349.9 374.8 346.6 375.3 341.1 372.5C308.5 356.2 287.1 343.4 265.6 306.5C259.9 296.7 271.3 297.4 281.9 276.2C283.7 272.5 282.8 269.3 281.4 266.5C280 263.7 268.9 236.4 264.3 225.3C259.8 214.5 255.2 216 251.8 215.8C248.6 215.6 244.9 215.6 241.2 215.6C237.5 215.6 231.5 217 226.4 222.5C221.3 228.1 207 241.5 207 268.8C207 296.1 226.9 322.5 229.6 326.2C232.4 329.9 268.7 385.9 324.4 410C359.6 425.2 373.4 426.5 391 423.9C401.7 422.3 423.8 410.5 428.4 397.5C433 384.5 433 373.4 431.6 371.1C430.3 368.6 426.6 367.2 421.1 364.5z" />
                    </svg>
                    <div>
                        <p class="font-semibold text-gray-800">WhatsApp :</p>
                        <a href="https://wa.me/212777527159" target="_blank" class="text-gray-600 hover:text-green-600">
                            Envoyer un message
                        </a>
                    </div>
                </div>

                <!-- Email -->
                <div class="flex items-start gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7" viewBox="0 0 640 640">
                        <path d="M320 128C214 128 128 214 128 320C128 426 214 512 320 512C337.7 512 352 526.3 352 544C352 561.7 337.7 576 320 576C178.6 576 64 461.4 64 320C64 178.6 178.6 64 320 64C461.4 64 576 178.6 576 320L576 352C576 405 533 448 480 448C450.7 448 424.4 434.8 406.8 414.1C384 435.1 353.5 448 320 448C249.3 448 192 390.7 192 320C192 249.3 249.3 192 320 192C347.9 192 373.7 200.9 394.7 216.1C400.4 211.1 407.8 208 416 208C433.7 208 448 222.3 448 240L448 352C448 369.7 462.3 384 480 384C497.7 384 512 369.7 512 352L512 320C512 214 426 128 320 128zM384 320C384 284.7 355.3 256 320 256C284.7 256 256 284.7 256 320C256 355.3 284.7 384 320 384C355.3 384 384 355.3 384 320z" />
                    </svg>
                    <div>
                        <p class="font-semibold text-gray-800">Email :</p>
                        <a href="mailto:ymofid18@gamil.com" class="text-gray-600 hover:text-yellow-700">
                            ymofid18@gamil.com
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right: Contact Form -->
            <form action="{{ route('contact.send') }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow-lg">
                @csrf

                <h2 class="text-2xl font-semibold mb-4">Formulaire de Contact</h2>
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" name="name" id="name" required
                        class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-yellow-700 focus:border-yellow-700">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required
                        class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-yellow-700 focus:border-yellow-700">
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                    <textarea name="message" id="message" rows="4" required
                        class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-4 py-2 focus:ring-yellow-700 focus:border-yellow-700"></textarea>
                </div>

                <div class="text-right">
                    <button type="submit"
                        class="bg-yellow-700 hover:bg-yellow-800 text-white font-semibold px-6 py-2 rounded-lg transition">
                        Envoyer
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app>