
<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">제목</th>
            <th scope="col">작성자</th>
            <th scope="col">작성일</th>
            <th scope="col">좋아요 수</th>
        </tr>
        </thead>
        <tbody>
            @foreach($posts as $a)
                <tr>
                    <td><a href="{{route('posts.show',['post'=> $a->id])}}">{{$a->title}}</a></td>
                    <td>{{$a->userPost->name}}</td>
                    <td>{{$a->created_at->diffForHumans()}}</td>
                    <td>{{$a->likes->count()}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links()  }}
</div>
