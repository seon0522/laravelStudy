<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
        <button onclick= location.href="{{ route('posts.create') }}" type="button" class="btn btn-info hover:bg-blue-700 font-blod text-white">
            글쓰기 </button>
    </x-slot>
    <x-post-list :posts="$posts" />
</x-app-layout>
