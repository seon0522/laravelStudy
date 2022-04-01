<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('글쓰기 폼') }}
            </h2>
        </div>
    </x-slot>
    <div class="m-4 p-4">  <!--margin, padding-->
        <form class="row g-3"
              action="{{ route('car.store') }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="col-12 m-2">
                <label for="title" class="form-label">자동차명</label>
                <input name="carname" type="text" class="form-control" id="title" placeholder="자동차명"
                       value="{{old('carname')}}">
            </div>

            @error('carname')
            <div class="text-red-800">
                <span>{{$message}}</span>
            </div>
            @enderror

            <div class="col-12 m-2">
                <label for="title" class="form-label">제조회사</label>
                <input name="manufacturer" type="text" class="form-control" id="title" placeholder="제조회사"
                       value="{{old('manufacturer')}}">
            </div>

            @error('manufacturer')
            <div class="text-red-800">
                <span>{{$message}}</span>
            </div>
            @enderror

            <div class="col-12 m-2">
                <label for="title" class="form-label">제조년도</label>
                <input name="caryear" type="text" class="form-control" id="title" placeholder="제조년도 - 숫자로"
                       value="{{old('caryear')}}">
            </div>

            @error('caryear')
            <div class="text-red-800">
                <span>{{$message}}</span>
            </div>
            @enderror

            <div class="col-12 m-2">
                <label for="title" class="form-label">가격</label>
                <input name="price" type="text" class="form-control" id="title" placeholder="가격 - 숫자로"
                       value="{{old('price')}}">
            </div>

            @error('price')
            <div class="text-red-800">
                <span>{{$message}}</span>
            </div>
            @enderror

            <div class="col-12 m-2">
                <label for="title" class="form-label">차종</label>
                <input name="carmodel" type="text" class="form-control" id="title" placeholder="차종"
                       value="{{old('carmodel')}}">
            </div>

            @error('carmodel')
            <div class="text-red-800">
                <span>{{$message}}</span>
            </div>
            @enderror

            <div class="col-12 m-2">
                <label for="title" class="form-label">외형</label>
                <input name="appearance" type="text" class="form-control" id="title" placeholder="외형"
                       value="{{old('carmodel')}}">
            </div>

            @error('carmodel')
            <div class="text-red-800">
                <span>{{$message}}</span>
            </div>
            @enderror


            <div class="col-12 m-2">
                <label for="image" class="form-label">첨부 이미지</label>
                <input name="image" type="file" class="form-control" id="file">
            </div>

            <div class="col-12 m-2">
                <button type="submit" class="btn btn-primary">작성</button>
            </div>
        </form>
    </div>
</x-app-layout>
