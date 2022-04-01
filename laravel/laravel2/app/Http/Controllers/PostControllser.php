<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PostControllser extends Controller
{


    public function index(){
//        select * from posts order by created_at desc
//        $posts = Post::all();

        $posts = Post::latest()->paginate(4);

        return view('bbs.index', ['posts'=>$posts]);
    }



    public function create(){
        return view('bbs.create');
    }



    public function store(Request $request){
//        조건을 충족시켜 주지 못 하면 원래 자리로 백함.. 그리고 에러 메세지를 생성해줌
        $this->validate($request, ["title"=>'required', "content"=>'required | min:3']);

        $fileName = null;
//         $request에 image라는 이름의 파일이 보이면
        if($request->hasFile('image')){
            $fileName = time().'_'.$request->file('image')->getClientOriginalName(); //  public에 있는 애랑 링크가 걸림
            $request->file('image')->storeAs('public/images',$fileName);
        }

//        array_merge - 내가 만든 배열이랑 request배열이랑 합쳐라
        $input = array_merge($request->all(),
            ["user_id"=>Auth::user()->id]);

//      이미지가 있으면 $input에 image에 항목 추가
        if($fileName){
            $input = array_merge($input, [$input, 'image' => $fileName]);
        }
//        mass assignment
//        Eloquent model이 white list인 $fillable에 기술해야함
        Post::create($input);

        return redirect()->route('posts.index')->with('success',1);
    }


    public function show($id){
//        $id에 해당하는 post를 데이터베이스에서 인출하고 그를 View헬퍼 함수를 이용해서 post-list에 값 넣기
//        with 즉시로딩 / 호출 될 때 한번에 연관된 모델들을 가져온다.
        $post = Post::with('likes')->findOrFail($id);
//        with('likes') => 즉시 로딩 ...?

//        dd($post->image);
        return view('bbs.show', ['post'=>$post]);
    }

//    Type hinting
//  DI, 의존성 주입
    public function destroy(Request $request, $id){

        $post = Post::find($id);

        if($post->image){
        Storage::delete('public/images'.$post->image);
        }

        $post->delete();

        return redirect()->route('posts.index');
    }

    public function deleteImage($id)
    {
        $post = Post::find($id);
        Storage::delete('public/images', $post->image);

        $post->image = null;
        $post->save();

        return redirect()->route('posts.edit', ['post' => $post->id]);
    }


    public function edit($id)
    {
//        $id에 해당하는 포스트를 수정할 수 있느 페이지 반환
        $post = Post::find($id);

        return view('bbs.edit', ['post' => $post]);
    }



    public function update(Request $request, $id){

//        dd("여기는 update");

//dd($request);

        $this->validate($request, ["title"=>'required',
            "contentss"=>'required | min:3']);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->contentss;

//        dd($post);
//        dd($request);

        if($request->image){
//            이미지를 이 게시글의 이미지로 파일 시스템에 저장하고, DB반영하기 전에 기존 이미지가 있다면
//            그 이미지를 파일 시스템에서 삭제해줘야 한다
            if($post->image){
                Storage::delete('public/images/'.$post->image);
            }
            $fileName = time().'_'.$request->file('image')->getClientOriginalName();
            $post->image = $fileName;
            $request->image->storeAs('public/images/'.$fileName);
        }

//        dd($post);

        $post->save();

        return redirect()->route('posts.show',['post'=>$post->id]);
    }

}
