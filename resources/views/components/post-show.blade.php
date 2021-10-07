<div>
    <div class="card" style="width: 18rem;">
        @if($ss->image)
        <img src="{{'/storage/images/'.$ss->image}}"
             class="card-img-top" alt="my post image">
        @else
            <span>첨부 이미지 없음</span>
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $ss->title }}</h5>
            <p class="card-text">{{$ss->content}}</p>
        </div>
            <div>
                <like-button/>
            </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">등록일 : {{$ss->created_at->diffForHumans()}}</li>
            <li class="list-group-item">수정일 : {{$ss->updated_at->diffForHumans()}}</li>
            <li class="list-group-item">작성자 : {{$ss->userPost->name}}</li>
        </ul>
        <div class="card-body flex">
            <a href="{{ route('posts.edit', ['post'=>$ss->id]) }}" class="card-link">수정하기</a>

            <form id="form" class="ml-4" method="post"
                onsubmit="event.preventDefault(); confirmDelete(event)"
                action="{{route('posts.destroy', ['post'=>$ss->id])}}">
                @csrf
                @method('delete')
{{--                <input type="hidden" name="_method" value="delete">--}}
                <button type="submit">삭제하기</button>
            </form>
        </div>
    </div>

    <script>
        function confirmDelete(e){
            myform = document.getElementById('form');
             //form이 서버로 전달되는 것을 막아준다.
            flag = confirm('정말 삭제하시겠습니까?');

            if (flag){
                myform.submit();
            }
        }
    </script>

{{--

POST
DELETE
PATCH
PUT
:서버 자원을 변경하고자 할 때
보안 때문에 라라벨은 추가로 csrf 토큰을 요구


--}}
</div>
