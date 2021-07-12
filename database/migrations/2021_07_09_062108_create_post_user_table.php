<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()->onDelete('cascade');
            $table->foreignId('post_id')
                ->constrained()->onDelete('cascade');
            $table->timestamp('created_at');
            $table->unique(['user_id', 'post_id']);
//            $table->timestamps();  //s를 붙이면 2개 만들어 줌.
            //created_at, updated_at을 만들어 주는 것
            //해당되는 모델 클래스가 없으니까 null이 들어감.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_user');
    }
}
