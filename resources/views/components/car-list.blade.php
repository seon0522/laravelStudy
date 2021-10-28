<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">자동차명</th>
            <th scope="col">제조회사</th>
            <th scope="col">제조년도</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cars as $item)
            <tr>
                <td><a href="{{route('car.show',['car'=> $item->id])}}">{{$item->carname}}</a></td>
                <td>{{$item->manufacturer}}</td>
                <td>{{$item->caryear}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $cars->links()  }}
</div>

