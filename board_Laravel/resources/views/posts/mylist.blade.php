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
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboad</a>
    <h1>나의 게시글 리스트</h1>

    <ul class="list-group mt-3">
{{--        @foreach($userP as $key)--}}
{{--        &&교수님--}}
        @foreach($posts as $key)
            <li class="list-group-item">
                <span><a href="{{route('posts.show',['id'=>$key->id])}}">Title : {{$key->title}}</a></span>
                <span>written on {{$key->created_at}}</span>
            </li>
        @endforeach
    </ul>
    <div class="mt-5" >
        {{$posts->links()}}
    </div>

</div>
</body>
</html>
