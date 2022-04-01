<x-app-layout>
    @if(\Illuminate\Support\Facades\Auth::user()->id)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('car') }}
        </h2>
        <button onclick= location.href="{{ route('car.create') }}" type="button" class="btn btn-info hover:bg-blue-700 font-blod text-white">
            글쓰기 </button>
    </x-slot>
    @endif
    <x-car-list :cars="$cars" />
</x-app-layout>
