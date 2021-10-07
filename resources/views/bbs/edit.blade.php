<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('글수정 폼') }}
            </h2>
            <button onclick=location.href="{{ route('posts.show',['post'=>$post->id]) }}">
                상세보기
            </button>
        </div>
    </x-slot>
    <div class="m-4 p-4">  <!--margin, padding-->
        <form class="row g-3"
              action="{{ route('posts.update', ['post'=>$post->id]) }}"
              method="POST"
              enctype="multipart/form-data">
            <!--파일을 전송할 시에는 enctpye도 작성해야함-->
            @csrf
            @method('patch')
            <div class="col-12 m-2">
                <label for="title" class="form-label">제목</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="제목 입력"
                       value="{{$post->title}}">

                @error('title')
                <div class="text-red-800">
                    <span>{{$message}}</span>
                </div>
                @enderror
            </div>
            <div class="col-12 m-2">
                <label for="content" class="form-label">글 내용</label>
                <textarea name="contentss" class="form-control"
                          id="contentss" cols="30"
                >{{$post->content}}</textarea>
            </div>

            @error('contents')
            <div class="text-red-800">
                <span>{{$message}}</span>
            </div>
            @enderror


            <div class="col-12 m-2">
                @if($post->image)
                        <div class="flex">
                            <img src="{{'/storage/images/'.$post->image}}"
                             class="card-img-top" alt="my post image">

                        </div>
                    <button onclick="return deleteImage()"
                             class="btn btn-danger align-items-center h-10 mx-2">
                        이미지 삭제</button>
                @else
                    <span>첨부 이미지 없음</span>
                @endif
                <label for="image" class="form-label">첨부이미지</label>
                <input name="image" type="file" class="form-control" id="file">
            </div>

            <div class="col-12 m-2">
                <button type="submit" class="btn btn-primary">글 수정</button>
            </div>
        </form>
        <script>
            function deleteImage(){
                editForm = document.getElementById('editForm');
                // editForm.delete('_method');
                editForm._method.value = 'delete';
                editForm.action = '/posts/{{ $post->id }}/images/';
                editForm.submit();
                return false;
            }
        </script>
    </div>
</x-app-layout>
