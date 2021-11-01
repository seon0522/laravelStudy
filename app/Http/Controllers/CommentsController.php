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
    public function store(Request $request, $postId)
    {
        /* 밑에처럼 쓸려면 필러블을 무조건!!!!! 설정
        객체 생성 안 하고 Comment::create([
                    'comment'=>$request->comment,
        'user_id'=>auth()->user()->id;
        'post_id'=>$post_id;
        ]);

        필러블에 값이 없어서 에러 남 -> 필러블을 고침
        */
//        $request->validate(['comment'=>'required: min : 2']);
        $request->validate(['comment' => 'required']);
        $request->validate(['comment' => 'required | email |unique']);
//        $this->validate($request, ['comment'=>'required']);


        $comment = new Comment();

        $comment->user_id = auth()->user()->id;
        $comment->post_id = $postId;
        $comment->comment = $request->comment;

        $comment->save(); //내가 안 준 값은 자동으로 구현되어짐.

        return redirect()->route('comment.show');
    }

    public function index($postId)
    {
        /* select * from comments where post_id = ?
        order by created_at desc;  ( latest()가 붙으면 )
        */
        $comment = Comment::Where('post_id', $postId)->latest()->get();
        return $comment;
    }

    public function update(Request $request, $comment_id)
    {

        $comment = Comment::find($comment_id);

        $comment->comment = $comment;
        $comment->save();

    }

    public function destroy($commentId)
    {
        $comment = Comment::find($commentId);
//        $comment = new Comment();

        $comment->delete($commentId);

        return $comment;
    }



}
