<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class postsController extends Controller
{

    public function __construct(){
        $this->middleware(['auth'])->except(['index','show']);
//        except의 반대 - // only : 이것만 지정해라
    }

//    수정
    public function edit(Request $request, Post $id ){
//        수정 폼 생성
//        return view('posts.edit')->with('post', $id);
        return view('posts.edit', ['post'=> $id, 'page'=>$request->page]);
    }


//    수정 - 저장
    public function update(Request $request, $id ){
//  이지미 파일 수정, 파일시스템에서
//  게시글을 데이터 베이스에서 수정
        $request->validate([
            'title' => 'required | min : 3',
            'contentTest' => 'required',
            'imageFile' => 'image|max:2000'
        ]);

        $post = Post::find($id);

        //authorzion, 수정 권한이 있는지 검사
        if(auth()->user()->id != $post->user_id ){
            abort(403);
        }

//        현재 로그인 한 사용자가 update 못 한다면
        if ($request->user()->cannot('update',$post)){
            abort(403);
        }

//         db의 title, content 에다가 얻은 값을 넣기
        $post->title= $request->title;
        $post->content= $request->contentTest;

        if($request->file('imageFile')){
            $imagePath = 'public/images/'.$post->image;
            Storage::delete($imagePath);

            $post->image = $this->uploadPostImage($request);
        }
        $post->save();


        return redirect()->route('posts.show', ['id'=>$id, 'page' => $request->page]);
    }

//    내 글을 조회한 user가 누군지 조회
    public function viewer(){
//        $this->belongsToMany(User::class)
    }


//    삭제
    public function destory(Request $request , $id){
//        db에서 삭제되기 전 이미지 파일에서 삭제
//        게시글을 데이터 베이스에서 삭제
        $post = Post::findOrFail($id);   //없으면 null이 리턴되는데 not fined exception났으면 좋겠음.  // 404가 나옴.

        //authorzion, 수정 권한이 있는지 검사
        if(auth()->user()->id != $post->user_id ){
            abort(403);
        }

//        현재 로그인 한 사용자가 delete못 한다면
        if ($request->user()->cannot('delete',$post)){
            abort(403);
        }

        if($post->image != null){
            $imagePath = 'public/images/'.$post->image;
            Storage::delete($imagePath);
        }

//        이미지 파일이 있으면 삭제하는 게 좋겠다.
        $post->delete();

        return redirect()->route('posts.index', ['page' => $request ->page]);
    }


//    등록
    public function create(){
//        dd('ok');
        return view('posts.create');
    }


//    등록 - 저장
    public function store(Request $request){
//        Request - 요청정보가 객체안에 담겨서 줌. // 라라벨에 서비스 컨테이너가 있어서 객체를 주입.즉 인젝션 시켜줌
//        typehint - 유형힌트주기 // php는 원래 유형이 없기 때문에 그 유형이라는 것을 명시해서 알려줌.

//          -----------1
//        $request->input('title');
//        $request->input('content');
//
//        -----------2
        $title = $request->input('title');
        $content = $request->input('contentT');
//        $fileName = $request->input('imageFile');

//        dd($content);

//          -----------3
//        $title = $request->title;
//        $content = $request->Content;

        $request->validate([
            'title' => 'required | min:3',
            'contentT'=>'required',
            'imageFile'=>'image | max: 2000'
        ]);


//        dd($request);

        //DB에 저장
        $post = new Post;
        $post->title = $title;
        $post->content = $content;
//      다른 컬럼의 user_id 를 가지고 오는 법
//        1. 인증의 user값 을 들고옴
        $post->user_id = Auth::user()->id;


//        File처리가 되어야함. 내가 원하는 파일시스템 위치에 원하는 이름으로 파일을 저장하고
//        $post->image = $fileName;


        if ($request->image){
        $post->image = $this->uploadPostImage($request);
        }

        $post->save();

//       결과 뷰를 리턴
        return redirect('/posts/index');
    }


//    상세보기
    public function show(Request $request, $id){

        $page = $request->page;
        $post = Post::find($id);
        $post->count++;

        $post->save();

        return view('posts.show',compact('post', 'page'));
    }


//    리스트
    public function index(){
//        $posts = Post::orderBy('created_at','desc')->get();
//        $posts = Post::latest()->get();
//
        $posts = Post::latest()->paginate(4);

        return view('posts.index',['posts' => $posts]);



//        변수일 경우, 문자열로 표현 // array같은 배열일 경우, 변수자체를 넣어주기
//        return view('posts.index',compact('posts'));
    }


//    내가 쓴 글만 확인 가능한 곳
    public function mylist(){
        //현재 사용자의 id추출

//        &&교수님 코드
//        $posts = auth()->user()->posts()->orderby('title','asc')->orderby('created_at', 'desc')->paginate(3);
        $posts = auth()->user()->posts()->latest()->paginate(3);

//        auth() - 전역함수, 내장함수


//        dd($posts);
//        $currUser = Auth::user()->id;
//
//        $user = User::find($currUser);
//
//        $userP = $user->posts;

//        return view('posts.mylist', ['userP' => $userP]);

//      &&교수님
        return view('posts.mylist', compact('posts'));
    }




    protected  function uploadPostImage($request){
//        파일이름
        $name = $request->file('imageFile')->getClientOriginalName();

//        $request->file('imageFile')->sotreAs('images',$fileName);
//        확장자 종류
        $extension = $request->file('imageFile')->extension();

        $nameWithoutExtension = Str::of($name)->basename('.'.$extension);

        $fileName = $nameWithoutExtension.'_'.time().'.'.$extension;

        $request->file('imageFile')->storeAs('public/images',$fileName);

        return $fileName;
    }
}
