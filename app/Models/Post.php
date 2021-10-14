<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        "title",
        "content",
        "user_id",
        "image",
    ];


    public function userPost(){
//        user <-> post 의 relationship
//        1 : N  //
//        user는 hasmany posts
//        post는 belongs to a user

        return $this->belongsTo(User::class, 'user_id');
    }

/*
    m : n => belongtomany

    post.table


    중간 테이블.


     user.table
*/

//    포스트.php
    public function likes(){
        return $this->belongsToMany(User::class);
    }

}
