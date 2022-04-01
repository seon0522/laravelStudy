<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <div>
        <div class="card" style="width: 18rem;">
            @if($cars->image)
                <img src="{{'/storage/images/'.$cars->image}}"
                     class="card-img-top" alt="my post image">
            @else
                <span>첨부 이미지 없음</span>
            @endif

            <div class="card-body">
                <h5 class="card-title">자동차명 : {{ $cars->carname }}</h5>
                <p class="card-text">제조회사 : {{$cars->manufacturer}}</p>
                <p class="card-text">제조년도 : {{$cars->caryear}}</p>
                <p class="card-text">차 가격 : {{$cars->price}}</p>
                <p class="card-text">차 종  : {{$cars->carmodel}}</p>
                <p class="card-text">차 외형 : {{$cars->appearance}}</p>
            </div>
            <div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">등록일 : {{$cars->created_at->diffForHumans()}}</li>
                <li class="list-group-item">변경일 : {{$cars->updated_at->diffForHumans()}}</li>
            </ul>

                @if($cars->user_id == \Illuminate\Support\Facades\Auth::user()->id)
            <div class="card-body flex">
                <a href="{{ route('car.edit', ['car'=>$cars->id]) }}" class="card-link">수정하기</a>

{{--                <a href="{{ route('car.destroy', ['car'=>$cars->id]) }}" class="card-link">삭제하기</a>--}}

                <form id="form" class="ml-4" method="post"
                      action="{{route('car.destroy', ['car'=>$cars->id])}}">
                    @csrf
                    @method('delete')
                    <button type="submit">삭제하기</button>
                </form>
            </div>
                    @endif
        </div>
    </div>

</div>
