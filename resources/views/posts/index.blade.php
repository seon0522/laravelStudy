<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>글등록</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
<div class="container mt-5" >
    <a href="{{ url()->previous() }}" class="btn btn-primary">Dashboad</a>
    <h1>게시글 리스트</h1>
{{--    현재 로그인 한 사용자가 있는지 보는 것 --}}
    @auth
        <a href="/posts/create" class="btn btn-primary">게시글 작성</a>
    @endauth

    <ul class="list-group mt-3">
        @foreach($posts as $key)
        <li class="list-group-item">
            <span><a href="{{route('posts.show',['id'=>$key->id, 'page'=>$posts->currentPage() ])}}">Title : {{$key->title}}</a></span>
{{--            <div>--}}
{{--                {{$key->content}}--}}
{{--            </div>--}}
            <span>written on {{$key->created_at}}
            {{$key ->count}}{{$key ->count > 0 ? Str::plural('view', $key->count) : 'view'}}</span>
        </li>
        @endforeach
    </ul>
        <div class="mt-5" >
            {{$posts->links()}}
        </div>

</div>
</body>
</html>
