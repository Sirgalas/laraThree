<?php

use App\Model\Post;
use Illuminate\Database\Seeder;

class PostTableSeeders extends Seeder
{
    public function run(){
        return factory(Post::class,50)->create();
    }
}
