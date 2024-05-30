<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Lecciones') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="flex items-center justify-center p-12">
            <div class="mx-auto w-full">
                <form action="{{ route('storeLesson', $curso->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    {{-- 1 --}}
                    <div class="mb-5">
                        <div class="flex space-x-4">
                            <div class="w-1/2">
                                <label for="title" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Título de la lección
                                </label>
                                <input type="text" name="title" id="title" placeholder="Lección #1"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                @error('title')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-1/2">
                                <label for="subtitle" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Subtítulo
                                </label>
                                <input type="text" name="subtitle" id="subtitle"
                                    placeholder="Programación orientada a objetos"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                @error('subtitle')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- 2 --}}
                    <div class="mb-5">
                        <div class="flex space-x-4">
                            <div class="w-1/3">
                                <label for="content_type" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Tipo de contenido
                                </label>
                                <select name="content_type" class="w-full rounded-md border border-gray-300 py-2 ps-4 pr-7 focus:outline-none focus:border-indigo-500">
                                    <option value="1">PDF</option>
                                    <option value="2">Texto</option>
                                    <option value="3">Video</option>
                                    <option value="4">Imagen</option>
                                </select>

                                @error('content_type')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-2/3">
                                <label for="content" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Contenido de la lección
                                </label>
                                <input type="file" name="content" class="dropify" />
                                @error('content')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- 3 --}}
                    <div class="flex justify-center">
                        <button type="submit"
                            class="hover:shadow-form rounded-md bg-indigo-500 py-3 px-8 text-base font-semibold text-white outline-none">
                            Crear Lección
                        </button>
                    </div>
                </form>
                {{-- si cursos tiene alguna lección creada --}}
                @if ($hasLessons == true)
                <form action="{{ route('mycourses') }}" method="GET" enctype="multipart/form-data">
                    @csrf

                    <div class="flex justify-center mt-3">
                        <button type="submit"
                            class="hover:shadow-form rounded-md bg-indigo-500 py-3 px-8 text-base font-semibold text-white outline-none">
                            Terminar
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </x-slot>

</x-app-layout>
