<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('extension')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });

        Schema::table('posts',function (Blueprint $table){
            $table->integer('file_id')->nullable();
            $table->index('file_id','idx_post_file_id');
            $table->foreign('file_id','fk_post_to_file')->references('id')->on('files');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
        Schema::table('posts',function (Blueprint $table){
            $table->dropIndex('idx_post_file_id');
            $table->dropForeign('fk_post_to_file');
            $table->dropColumn('file_id');
        });
    }
}
