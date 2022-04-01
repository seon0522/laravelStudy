<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function imagePath(){
//        $path = '/storage/images';
//        환경설정으로 넣고 싶다.
        $path = env('IMAGE_PATH');
        $imageFile = $this->image ?? 'no_ava.png';

        return $path.$imageFile;
    }

//    나랑 연견되는 모델 이름을 쓰면 됨. 소문자로
//      관례를 따르지 않으면 belongsTo.2번째 변수에 넣기
    public function user(){
        return $this->belongsTo(User::class);
    }
}
