<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    // 1. 로그인 된 사용자의 종아요/좋아요 취소 요청 처리

//    m:n 일 경우 toggle 메서드가 있어서 사용 가능함
//     toggle에서 그 객체를 다 불러서 있으면 삭제, 없으면 추가함
//      toggle 있으면 디캐치
//      없으면 캐치
    public function store(Post $post){
        $post->likes()->toggle(auth()->user());
    }

}
