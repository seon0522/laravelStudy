<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('상세보기') }}
        </h2>
        <button onclick= location.href="{{ route('posts.index') }}" type="button" class="btn btn-info hover:bg-blue-700 font-blod text-white">
            목록보기
        </button>
    </x-slot>

    <x-post-show :ss="$ss"/>

</x-app-layout>
