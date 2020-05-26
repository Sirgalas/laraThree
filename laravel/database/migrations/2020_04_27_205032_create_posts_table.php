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
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('desc');
            $table->boolean('is_moderate');
            $table->boolean('is_header')->default(false);
            $table->boolean('is_top')->default(false);
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->index('user_id','idx_post_user_id');
            $table->foreign('user_id','fk_post_to_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
