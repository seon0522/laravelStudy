
<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">제목</th>
            <th scope="col">작성자</th>
            <th scope="col">작성일</th>
        </tr>
        </thead>
        <tbody>
            @foreach($posts as $a)
                <tr>
                    <td>{{$a->title}}</td>
                    <td>{{$a->user->name}}</td>
                    <td>{{$a->created_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links()  }}
</div>
