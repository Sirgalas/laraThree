<?php


namespace App\Repositories;


use App\Exceptions\NotFindException;
use App\Exceptions\NotSaveException;
use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class PostRepository implements PostRepositoryInterface
{
    public function one(int  $id):Post
    {
        if(!$post=Post::find($id)){
            throw new NotFindException('not find');
        }
        return Post::find($id);
    }

    public function all():Collection
    {
        return Post::all();
    }


    public function allModeration():Collection
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
        $query= Post::where('is_moderate',true)->where('is_top',false)->where('is_header',false)->paginate(9);
        if($take){
            $query->take($take);
        }
        return $query;
    }

    public function header()
    {
        return Post::where('is_header',true)->where('is_moderate',true)->inRandomOrder()->take(2)->get();
    }

    public function count($where=[]):int
    {
        $post=DB::table(Post::tableName());
        if(!empty($where)){
            $post->where($where);
        }
        return $post->count();
    }
}
