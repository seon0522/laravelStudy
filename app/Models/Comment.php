<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /*
     * User - Comment (1 : N )*
     * */

    public function user(){
        //comment 입장에서 연결된 User를 찾았을 때
        //belongsTo 관계 메서드를 통해서
        //연결 시켜 주면 된다.

//        관례를 따르지 않을 시, class 뒤에 'user_id', 'id','users'라고 명시해 줘야 함
        return $this->belongsTo(User::class);
        /*
         * 내부적 select *
         * FROM USERS
         * WHERE id = $this->user_id
         * */

    }
}
