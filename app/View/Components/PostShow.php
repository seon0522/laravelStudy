<?php

namespace App\View\Components;

use Illuminate\View\Component;



class PostShow extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $post;

    public function __construct($post)
    {
//        dd('construct');
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function render()
    {
//        로컬 변수일 때 넘겨줌.
//        dd($this->post);
        return view('components.post-show');
    }
}
