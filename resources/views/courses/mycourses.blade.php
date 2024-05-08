<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/mycourses.css') }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cursos') }}
        </h2>
    </x-slot>

    <div class="bg-white p-8 rounded-md w-full">
        <div class="flex flex-col items-center justify-center pb-6 sm:flex-row sm:justify-between">
            <div class="mb-4 sm:mb-0">
                <h2 class="text-gray-600 font-semibold">CURSOS CREADOS</h2>
            </div>
            <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-8">
                {{-- <div class="flex items-center p-2 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                    <input class="bg-gray-50 outline-none ml-1 block " type="text" name="" id=""
                        placeholder="Buscar...">
                </div> --}}
                <div class="mt-4 sm:mt-0 space-y-4 sm:space-y-0 sm:ml-10">
                    <button onclick="abrirComprados()"
                        class="button bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">Cursos
                        comprados</button>
                    <button onclick="abrirCreados()"
                        class="button bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">Cursos
                        creados</button>
                </div>
            </div>
        </div>
        <div id="cursos-creados">
            <div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Nombre
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Pequeña descripción
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Descripción
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Idioma
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Fecha creación
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        OPCIONES
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    @if ($course->getMedia('courses_images')->count() > 0)
                                                        <img class="w-full h-full rounded-full"
                                                            src="{{ $course->getMedia('courses_images')->last()->getUrl() }}"
                                                            alt="" />
                                                    @else
                                                        <img class="w-full h-full rounded-full"
                                                            src="https://i.postimg.cc/HkL86Lc1/sinfoto.png"
                                                            alt="" />
                                                    @endif
                                                </div>
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $course->name }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $course->short_description }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $course->description }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $course->language }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $course->created_at }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            @if ($course->deleted_at == null)
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-green-400 opacity-50 rounded-full"></span>
                                                    <span class="relative">ACTIVO</span>
                                                </span>
                                            @else
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-red-400 opacity-50 rounded-full"></span>
                                                    <span class="relative">INACTIVO</span>
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-0 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex">
                                                <div class="items-center">
                                                    <form action="{{route('mycourses.editCourse', $course->id)}}" method="GET" class="inline">
                                                        @csrf
                                                        @method('GET')
                                                        <button type="submit"
                                                            class="text-red-500 hover:text-red-700 flex items-center">
                                                            <img src="https://i.postimg.cc/1zjSN2zD/editar-Image.png"
                                                                class="w-8 h-8 mr-2" />
                                                        </button>
                                                    </form>
                                                </div>

                                                @if ($course->deleted_at == null)
                                                    <div class="flex items-center">
                                                        <form action="{{ route('mycourses.destroy', $course) }}"
                                                            method="POST" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="text-red-500 hover:text-red-700 flex items-center">
                                                                <img src="https://i.postimg.cc/dVc5QDHc/desactivar.png"
                                                                    class="w-8 h-8 mr-2" />
                                                            </button>
                                                        </form>
                                                    </div>
                                                @else
                                                    <div class="flex items-center">
                                                        <form action="{{ route('mycourses.activate', $course->id) }}"
                                                            method="POST" class="inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="text-red-500 hover:text-red-700 flex items-center">
                                                                <img src="https://i.postimg.cc/y8F3B855/done.png"
                                                                    class="w-8 h-8 mr-2" />
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                {{ $courses->links() }}
            </div>
        </div>

        <div id="cursos-comprados" onclick="abrirComprados()" class="grid grid-cols-2 gap-4">
            <div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Nombre
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Pequeña descripción
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Idioma
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        OPCIONES
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usersCourses as $userCourse)
                                    @foreach ($coursesUsers as $courseUser)
                                        @if ($userCourse->courses_id == $courseUser->id)
                                            <tr>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 w-10 h-10">
                                                            @if ($courseUser->getMedia('courses_images')->count() > 0)
                                                                <img class="w-full h-full rounded-full"
                                                                    src="{{ $courseUser->getMedia('courses_images')->last()->getUrl() }}"
                                                                    alt="" />
                                                            @else
                                                                <img class="w-full h-full rounded-full"
                                                                    src="https://i.postimg.cc/HkL86Lc1/sinfoto.png"
                                                                    alt="" />
                                                            @endif
                                                        </div>
                                                        <div class="ml-3">
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                {{ $courseUser->name }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $courseUser->short_description }}
                                                    </p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $courseUser->language }}
                                                    </p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    {{ $status->where('id', $userCourse->users_courses_statuses_id)->first()->name }}
                                                </td>
                                                <td class="px-0 py-5 border-b border-gray-200 bg-white text-sm">
                                                    @if ($status->where('id', $userCourse->users_courses_statuses_id)->first()->name == '¡Estréname!')
                                                        <form
                                                            action="{{ route('mycourses.createPlay', $courseUser->id) }}"
                                                            method="GET">
                                                            @method('GET')
                                                            @csrf
                                                            <button
                                                                class="group relative h-8 w-32 overflow-hidden rounded-2xl bg-green-500 text-sm font-bold text-white"
                                                                type="submit">
                                                                EMPEZAR
                                                                <div
                                                                    class="absolute inset-0 h-full w-full scale-0 rounded-2xl transition-all duration-300 group-hover:scale-100 group-hover:bg-white/30">
                                                                </div>
                                                            </button>
                                                        </form>
                                                    @elseif ($status->where('id', $userCourse->users_courses_statuses_id)->first()->name == 'En progreso')
                                                        <form
                                                            action="{{ route('mycourses.createPlay', $courseUser->id) }}"
                                                            method="GET">
                                                            @method('GET')
                                                            @csrf
                                                            <button
                                                                class="group relative h-8 w-32 overflow-hidden rounded-2xl bg-green-500 text-sm font-bold text-white">
                                                                CONTINUAR
                                                                <div
                                                                    class="absolute inset-0 h-full w-full scale-0 rounded-2xl transition-all duration-300 group-hover:scale-100 group-hover:bg-white/30">
                                                                </div>
                                                            </button>
                                                        </form>
                                                    @elseif ($status->where('id', $userCourse->users_courses_statuses_id)->first()->name == 'Completado')
                                                        <form
                                                            action="{{ route('mycourses.createPlay', $courseUser->id) }}"
                                                            method="GET">
                                                            @method('GET')
                                                            @csrf
                                                            <button
                                                                class="group relative h-12 w-32 overflow-hidden rounded-2xl bg-green-500 text-sm font-bold text-white">
                                                                EMPEZAR DE NUEVO
                                                                <div
                                                                    class="absolute inset-0 h-full w-full scale-0 rounded-2xl transition-all duration-300 group-hover:scale-100 group-hover:bg-white/30">
                                                                </div>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                {{ $courses->links() }}
            </div>
        </div>

    </div>

    <script>
        const cursosCreados = document.getElementById('cursos-creados');
        const cursosComprados = document.getElementById('cursos-comprados');

        cursosCreados.style.display = 'none';
        cursosComprados.style.display = 'none';

        function abrirCreados() {
            cursosCreados.style.display = 'block';
            cursosComprados.style.display = 'none';
        }

        function abrirComprados() {
            cursosCreados.style.display = 'none';
            cursosComprados.style.display = 'block';
        }
    </script>
</x-app-layout>
