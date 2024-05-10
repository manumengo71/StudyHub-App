@props(['disabled' => false])

<select {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full h-10 ps-3']) }}>
    {{ $slot }}
</select>
