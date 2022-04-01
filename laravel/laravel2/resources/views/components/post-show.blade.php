<div>
    <div class="card" style="width: 18rem;">
        @if($post->image)
        <img src="{{'/storage/images/'.$post->image}}"
             class="card-img-top" alt="my post image">
        @else
            <span>첨부 이미지 없음</span>
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{$post->content}}</p>
        </div>
            <div>
{{--                vue로 만들어 넣어둠.// $post가 postController에서 with써서 likes  --}}
                <like-button
                    :post="{{$post}}"
                    :loginuser="{{ auth()->user()->id }}"/>
            </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">등록일 : {{$post->created_at->diffForHumans()}}</li>
            <li class="list-group-item">수정일 : {{$post->updated_at->diffForHumans()}}</li>
            <li class="list-group-item">작성자 : {{$post->userPost->name}}</li>
        </ul>
        <div class="card-body flex">
            <a href="{{ route('posts.edit', ['post'=>$post->id]) }}" class="card-link">수정하기</a>

            <form id="form" class="ml-4" method="post"
                onsubmit="event.preventDefault(); confirmDelete(event)"
                action="{{route('posts.destroy', ['post'=>$post->id])}}">
                @csrf
                @method('delete')
                <button type="submit">삭제하기</button>
            </form>
        </div>
    </div>

        <div class="card mt-2 mb-5" style="width: 100%; margin: 10px">
            <comment-list
            :post="{{$post}}"
            :loginuserId="{{ auth()->user()->id }}"
            />
        </div>
{{--

POST
DELETE
PATCH
PUT
:서버 자원을 변경하고자 할 때
보안 때문에 라라벨은 추가로 csrf 토큰을 요구


--}}
</div>
