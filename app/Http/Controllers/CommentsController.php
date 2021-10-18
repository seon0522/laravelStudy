<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{


/*    function index(Post $postId) 로 만들 수도 있음.
        {
select * from comments where post_id = $post_id;

return $post->comments;

Post엘러먼트comment에 comments라는 function을 구현해야 사용 가능
(Post 클래스에 comments 함수 구현)
}//        postid의 객체를 자동생성 할 수 있음

*/
    function index($postId){
        /* select * from comments where post_id = ?
        order by created_at desc;  ( latest()가 붙으면 )
        */
        $comment = Comment::Where('post_id', $postId)->latest();
    }

    function update(){

    }

    function destroy(){

    }

    function store(){

    }
}
