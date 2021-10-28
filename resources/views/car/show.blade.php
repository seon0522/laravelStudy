<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('상세보기') }}
        </h2>

    </x-slot>

    <x-car-show :cars="$cars" />

</x-app-layout>
