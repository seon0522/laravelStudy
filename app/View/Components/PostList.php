<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
//    컴포넌트의 데이터 초기화
//    controller의 값을 컴포넌트에 연결!
//     컴포넌트 파일에서 자유롭게 변수 사용 가능

    public $name = "홍길동";
    public $posts;

    public function __construct($posts)
    {
        //posts
        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post-list');
    }
}
