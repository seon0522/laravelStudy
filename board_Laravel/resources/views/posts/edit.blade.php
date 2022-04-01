<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>글수정</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="{{ route('posts.update', ['id'=>$post->id, 'page'=>$page ] ) }}"
              method="post"
              enctype="multipart/form-data">
            @csrf
            @method("put")
            {{-- 블레이드 문법으로 위의 골뱅이가 이렇게
            <input type="hidden" name="__method" value="put" >만들어 줌  --}}
{{--            method spoofing - 이게 put이라는 것을 알려줌--}}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control"
                       value="{{old('title') ? old('title'): $post->title }}">
                @error('title')
                    <div>{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">content</label>
                <textarea class="form-control" id="content" name="contentTest" rows="15">{{ old('content') ? old('content') : $post->content  }}</textarea>
                @error('content')
                <div>{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <img src="{{  $post->imagePath()  }}" class="img-thumbnail" width="20%">
            </div>

            <div class="form-group">
                <label for="file">File</label>
                <input type="file" name="imageFile" id="file" class="form-control">

                @error('imageFile')
                <div>{{$message}}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</body>
</html>
