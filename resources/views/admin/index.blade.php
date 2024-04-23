<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="flex flex-wrap justify-center">
        <a href="/admin/users" class="m-2 mt-6 md:m-10 md:ms-16">
            <button class="w-48 md:w-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Listado de Usuarios
            </button>
        </a>

        <a href="/admin/courses" class="m-2 mt-6 md:m-10 md:ms-16">
            <button class="w-48 md:w-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Listado de Cursos
            </button>
        </a>

        <a href="/admin/categories" class="m-2 mt-6 md:m-10 md:ms-16">
            <button class="w-48 md:w-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Listado de Categorías
            </button>
        </a>

        <a href="/admin/roles" class="m-2 mt-6 md:m-10 md:ms-16">
            <button class="w-48 md:w-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Listado de Roles
            </button>
        </a>
    </div>

    <section>
        @yield('content') {{-- Contenido dinámico --}}
    </section>

</x-app-layout>
