<?php


namespace App\Repositories\Interfaces;


use App\Models\Post;

interface PostRepositoryInterface
{
    public function one(int $id);

    public function all();

    public function allModeration();

    public function save(Post $post);

    public function remove(int $id);

    public function top();

    public function bottom(int $count=null);

    public function header();

}
