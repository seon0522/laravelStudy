<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
//    mygrantion 실행
    public function up()
    {
//        테이블 이름, 칼럼을 정의하는 function
        Schema::create('posts', function (Blueprint $table) {
//          관례 biginteger타입의 primaykey
            $table->id();
            $table->string('title');
            $table->mediumText('content');
            $table->string('image')->nullable();

//            $table->foreign('user_id')->references('id')->on(users);
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
//           타임스탬프타입의 2개의 컬럼
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

//    rollback 할 때 실행
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
