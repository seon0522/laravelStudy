{{--ck에디터 붙이는 거 가르쳐 달라해야함.--}}
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>

    <title>Document</title>
</head>
<body>


<div class="container">
    <div class="m-5">
        <a href="{{ route('posts.index', ['page'=>$page]) }}">목록보기</a>
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" readonly name="title" class="form-control" id="title" value="{{$post->title}}">
    </div>


    <div class="form-group">
        <label for="content">content</label>
        <div id="'content" name="content" rows="15" readonly >{!! $post->content !!}</div>
    </div>

    <div class="form-group">
        <label for="imageFile">Post Image</label>
        <div>
{{--        <img src="/storage/images/{{$post->image ?? 'no_ava.png'}}" width="20%" class="img-thumbnail">--}}
            <img src="{{$post->imagePath()}}" width="20%" class="img-thumbnail">
        </div>
    </div>
    <div class="form-group"><label>등록일</label>
        <input type="text" readonly name="created_at" class="form-control" value="{{$post->created_at->diffForHumans() }}">
    </div>

    <div class="form-group"><label>수정일</label>
        <input type="text" readonly name="update_at" class="form-control" value="{{$post->updated_at->diffForHumans() }}">
    </div>

    <div class="form-group"><label>사용자</label>
        <input type="text" readonly name="user_id" class="form-control" value="{{ $post->user->name }}">
{{--        {{ $post->user->SELECT('name', 'email')-> get() }} - 모든 user의 레코드 가지고 옮 이렇게 사용도 간ㅇ model확인바람.. ? 나도 모르겠어. --}}
{{--        {{ $post->user()->SELECT('name', 'email')-> get() }} - 내가 연결된 user의 레코드만 가지고 옮    --}}
    </div>
    @auth
    @can('update', $post)
    <div class="flex">
        <a type="submit" class="btn btn-warning" href="{{route('posts.edit', ['id'=>$post->id, 'page'=> $page])}}">수정</a>
{{--        이런 형식은 무조건 get방식이라고 함.--}}
{{--        <a type="submit" class="btn btn-danger" href="{{route('posts.delete', ['id'=>$post->id])}}">삭제</a>--}}

        <form action="{{ route('posts.delete', ["id" => $post->id, 'page'=>$page]) }}" method="post">
            @csrf
            @method("delete")
            <button type="submit" class="btn btn-danger">삭제</button>
        </form>
    </div>
        @endcan
    @endauth
</div>
</body>
</html>
