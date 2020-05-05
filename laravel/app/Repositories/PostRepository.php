<?php


namespace App\Repositories;


use App\Exceptions\NotSaveException;
use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function one(int  $id)
    {
        return Post::find($id);
    }

    public function all()
    {
        return Post::all();
    }

    public function allModeration()
    {
        return Post::where('is_moderate',true)->get();
    }

    public function save(Post $post)
    {
        if(!$post->save()){
            throw new NotSaveException('not save',500);
        }
        return $post;
    }

    public function remove(int $id)
    {
        $post=$this->one($id);
        $post->delete();
    }

    public function top()
    {
        return Post::where('is_top',true)->where('is_moderate',true)->inRandomOrder()->take(3)->get();
    }

    public function bottom(int $take=null)
    {
        $query= Post::where('is_moderate',true)->where('is_top',false)->where('is_header',false)->inRandomOrder();
        if($take){
            $query->take($take);
        }
        return $query;
    }

    public function header()
    {
        return Post::where('is_header',true)->where('is_moderate',true)->inRandomOrder()->take(2)->get();
    }
}
