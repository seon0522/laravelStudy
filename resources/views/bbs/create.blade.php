<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('글쓰기 폼') }}
            </h2>
            <button onclick=location.href="{{ route('posts.index') }}">
                목록보기
            </button>
        </div>
    </x-slot>
    <div class="m-4 p-4">  <!--margin, padding-->
        <form class="row g-3"
              action="{{ route('posts.store') }}"
              method="POST"
              enctype="multipart/form-data">
            <!--파일을 전송할 시에는 enctpye도 작성해야함-->
            @csrf
            <div class="col-12 m-2">
                <label for="title" class="form-label">제목</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="제목 입력"
                       value="{{old('title')}}">
            </div>

            @error('title')
            <div class="text-red-800">
                <span>{{$message}}</span>
            </div>
            @enderror
            <div class="col-12 m-2">
                <label for="content" class="form-label">글 내용</label>
                <textarea name="content" class="form-control"
                          id="content" cols="30"

                >{{old('content')}}</textarea>
            </div>
            @error('content')
            <div class="text-red-800">
                <span>{{$message}}</span>
            </div>
            @enderror

            <div class="col-12 m-2">
                <label for="image" class="form-label">첨부 이미지</label>
                <input name="image" type="file" class="form-control" id="file">
            </div>

            <div class="col-12 m-2">
                <button type="submit" class="btn btn-primary">작성</button>
            </div>
        </form>
    </div>
</x-app-layout>
