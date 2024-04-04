<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Marketplace') }}
        </h2>
    </x-slot>

    <div class="flex justify-center">
        <form action="{{ route('createCourse') }}" method="GET">
            <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded mt-4 ml-4">
                Añadir nuevo curso
            </button>
        </form>
    </div>

    <div class="flex flex-wrap">
        @foreach ($temas as $tema)
            <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-4">
                <h2 class="text-left my-4 ml-4 font-bold text-3xl text-indigo-600 ms-10">{{ $tema->name }}</h2>

                <div id="animation-carousel-{{ $tema->id }}" class="relative w-auto mx-4 mt-5 mb-5"
                    data-carousel="static">
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        @foreach ($courses->where('courses_categories_id', $tema->id) as $course)
                            <div class="hidden duration-200 ease-linear" data-carousel-item
                                data-tema-id="{{ $tema->id }}">
                                @if ($course->getMedia('courses_images')->count() > 0)
                                    <img src="{{ $course->getMedia('courses_images')->last()->getUrl() }}"
                                        class="absolute block w-50 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                @else
                                    <img src="https://i.postimg.cc/cHwRxVfC/logo.jpg"
                                        class="absolute block w-50 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                @endif
                                <div class="absolute block w-50 -translate-x-1/2 -translate-y-1/2 bottom-5 left-1/2 bg-black">
                                    <h2 class="text-2xl font-bold text-white">{{ $course->name }}</h2>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Controles del carrusel -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <!-- Icono para retroceder -->
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <!-- Icono para avanzar -->
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function createCarousel(carouselId) {
            const carouselElement = document.getElementById(carouselId);
            const carouselItems = carouselElement.querySelectorAll('[data-carousel-item]');
            const prevButton = carouselElement.querySelector('[data-carousel-prev]');
            const nextButton = carouselElement.querySelector('[data-carousel-next]');
            let currentIndex = 0;

            const showItem = (index) => {
                carouselItems.forEach((item, i) => {
                    item.classList.toggle('hidden', i !== index);
                });
            };

            const showNextItem = () => {
                currentIndex = (currentIndex + 1) % carouselItems.length;
                showItem(currentIndex);
            };

            const showPrevItem = () => {
                currentIndex = (currentIndex - 1 + carouselItems.length) % carouselItems.length;
                showItem(currentIndex);
            };

            prevButton.addEventListener('click', showPrevItem);
            nextButton.addEventListener('click', showNextItem);

            showItem(currentIndex);
        }

        // Inicializar carruseles para cada tema
        @foreach ($temas as $tema)
            createCarousel('animation-carousel-' + {{ $tema->id }});
        @endforeach
    </script>
</x-app-layout>
