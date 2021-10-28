<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('글 수정 폼') }}
            </h2>
            <button onclick=location.href="{{ route('car.show',['car'=>$cars->id]) }}">
                상세보기
            </button>
        </div>
    </x-slot>
    <div class="m-4 p-4">
        <form class="row g-3"
              action="{{ route('car.update', ['car'=>$cars->id])}}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PATCH')

{{--                자동차명--}}
                <div class="col-12 m-2">
                    <label for="title" class="form-label">자동차명 : </label>
                    <input name="carname" type="text" class="form-control" id="title"
                           value="{{$cars->carname}}">
                </div>
                @error('carname')
                <div class="text-red-800">
                    <span>{{$message}}</span>
                </div>
                @enderror

{{--                제조회사--}}
                <div class="col-12 m-2">
                    <label for="title" class="form-label">제조회사 : </label>
                    <input name="manufacturer" type="text" class="form-control" id="title"
                           value="{{$cars->manufacturer}}">
                </div>

                @error('manufacturer')
                <div class="text-red-800">
                    <span>{{$message}}</span>
                </div>
                @enderror

{{--                제조년도--}}
                <div class="col-12 m-2">
                    <label for="title" class="form-label">제조년도 : </label>
                    <input name="caryeare" type="text" class="form-control" id="title"
                           value="{{$cars->caryeare}}">
                </div>
                @error('caryeare')
                <div class="text-red-800">
                    <span>{{$message}}</span>
                </div>
                @enderror

{{-- 차 가격--}}
                <div class="col-12 m-2">
                    <label for="title" class="form-label">차 가격 : </label>
                    <input name="price" type="text" class="form-control" id="title"
                           value="{{$cars->price}}">
                </div>

                @error('price')
                <div class="text-red-800">
                    <span>{{$message}}</span>
                </div>
                @enderror

                {{-- 차 종--}}
                <div class="col-12 m-2">
                    <label for="title" class="form-label">차 종  : </label>
                    <input name="carmodel" type="text" class="form-control" id="title"
                           value="{{$cars->carmodel}}">
                </div>
                @error('carmodel')
                <div class="text-red-800">
                    <span>{{$message}}</span>
                </div>
                @enderror

{{--차 외형   --}}
                <div class="col-12 m-2">
                    <label for="title" class="form-label">차 외형 : </label>
                    <input name="appearance" type="text" class="form-control" id="title"
                           value="{{$cars->appearance}}">
                </div>

                @error('appearance')
                <div class="text-red-800">
                    <span>{{$message}}</span>
                </div>
                @enderror


                <div class="col-12 m-2">
                    @if($cars->image)
                        <div class="flex items-center">
                            <img class="w-20 h-20 rounded-full" src="{{'/storage/images/'.$cars->image}}"
                                 class="card-img-top" alt="my post image">
                            <button onClick="return deleteImage({{ $cars->id }})" class="btn btn-danger h-10 mx-2 my-2">이미지 삭제</button>
                        </div>

                    @else
                        <span>첨부 이미지 없음</span>
                    @endif
                </div>

            <div class="col-12 m-2">
                <button type="submit" class="btn btn-primary">작성</button>
            </div>
        </form>
    </div>



    <div>

    </div>


</x-app-layout>
