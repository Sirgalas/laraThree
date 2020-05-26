<?php


namespace App\Repositories\Interfaces;


use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

interface PostRepositoryInterface
{
    public function one(int $id):Post;

    public function all():Collection;

    public function allModeration():Collection;

    public function save(Post $post);

    public function remove(int $id);

    public function top();

    public function bottom(int $count=null);

    public function header();

}
