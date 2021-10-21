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
    function store(Request $request, $post_id){
/* 밑에처럼 쓸려면 필러블을 무조건!!!!! 설정
객체 생성 안 하고 Comment::create([
            'comment'=>$request->comment,
'user_id'=>auth()->user()->id;
'post_id'=>$post_id;
]);

필러블에 값이 없어서 에러 남 -> 필러블을 고침
*/
        $comment = new Comment();

        $comment->user_id = auth()->user()->id;
        $comment->post_id = $post_id;
        $comment->comment = $request->comment;

        $comment->save(); //내가 안 준 값은 자동으로 구현되어짐.

        return redirect()->route('comment.show');
    }

    function index($postId){
        /* select * from comments where post_id = ?
        order by created_at desc;  ( latest()가 붙으면 )
        */
        $comment = Comment::Where('post_id', $postId)->latest();
    }

    function update($comment_id, Request $request){

//        $comment = $request->comment;

        $comment = Comment::find($comment_id);

        $comment->comment = $comment;
        $comment->save();

//        $comment->update(['comment'=>$comment]);
//
//        $comment->update($request->all());
    }

    function destroy(){

    }


}
