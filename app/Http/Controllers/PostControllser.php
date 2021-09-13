<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Post as PostAlias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

//        dd($request);

//        조건을 충족시켜 주지 못 하면 원래 자리로 백함.. 그리고 에러 메세지를 생성해줌
        $this->validate($request, ["title"=>'required', "content"=>'required | min:3']);

        $fileName = null;
        if($request->hasFile('image')){
//            dd($request->file('image'));
            $fileName = $request->file('image')->storeAs('public/images', $request->file('image')
                    ->getClientOriginalName()); //  public에 있는 애랑 링크가 걸림
            $path = $request->file('image')->storeAs('public/images',$fileName);
//            dd($path);
        }

//        array_merge - 내가 만든 배열이랑 request배열이랑 합쳐라
        $input = array_merge($request->all(),
            ["user_id"=>Auth::user()->id]);

//      이미지가 있으면 $input에 image에 항목 추가
        if($fileName){
//            $path = substr($path, strrpos($path, '/')+1);
//            $path = time().'_'.$path;

            $input = array_merge($input, [$input, 'image' => $fileName]);
//            dd($input);
        }

//        dd(Auth::user()->id);
        // $request->

//        mass assignment
//        Eloquent model이 white list인 $fillable에 기술해야함
        Post::create($input);

//        input의 내용은 ["title"=>"ddd", "content"=>"ddd", "user)id"=> 1]이 되게네
//        왜...?
//        redirect('bbs.index', ["posts"=>Post::all()]);

        return redirect()->route('posts.index');
    }
}
