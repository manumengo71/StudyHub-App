<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Rol') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="flex items-center justify-center p-12">
            <div class="mx-auto w-full">
                <form action="{{ route('storeRole') }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Nombre del Rol
                        </label>
                        <input type="text" name="name" id="name" placeholder="Rol #1"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        @error('name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="guard_name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Guard_name
                        </label>
                        <input type="text" name="guard_name" id="guard_name"
                            placeholder="Rol para los usuarios que..."
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        @error('guard_name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-center">
                        <button type="submit"
                            class="hover:shadow-form rounded-md bg-indigo-500 py-3 px-8 text-base font-semibold text-white outline-none">
                            Crear Rol
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>

</x-app-layout>
