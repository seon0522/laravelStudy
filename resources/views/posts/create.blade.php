<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>글등록</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
</head>
<body>
    <div class="container">
        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{old('title')}}">
                @error('title')
                    <div>{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">content</label>
                <textarea class="form-control" id="contentT" name="contentT" rows="15">{{old('contentT')}}</textarea>
                @error('contentT')
                <div>{{$message}}</div>
                @enderror
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

    <script>
        ClassicEditor
            .create( document.querySelector( '#contentT' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html>
