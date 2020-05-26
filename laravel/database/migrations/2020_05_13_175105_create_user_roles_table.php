<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('key')->nullable();
            $table->timestamps();
        });

        DB::table('roles')->insert(
            [
                ['name'=>'admin','created_at'=>'now()','updated_at'=>'now()'],
                ['name'=>'moderator','created_at'=>'now()','updated_at'=>'now()'],
                ['name'=>'author','created_at'=>'now()','updated_at'=>'now()'],
                ['name'=>'user','created_at'=>'now()','updated_at'=>'now()']
            ]
        );

        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('role_id');
            $table->timestamps();
            $table->index('user_id','idx_user_roles_user_id');
            $table->foreign('user_id','fk_user_roles_to_user')->references('id')->on('users');
            $table->index('role_id','idx_user_role_role_id');
            $table->foreign('role_id','fk_user_roles_to_role')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
        Schema::table('user_role',function (Blueprint $table){
            $table->dropIndex('idx_user_roles_user_id');
            $table->dropForeign('fk_user_roles_to_user');
            $table->dropIndex('idx_user_role_role_id');
            $table->dropForeign('fk_user_roles_to_role');
        });
        Schema::dropIfExists('user_roles');
    }
}
