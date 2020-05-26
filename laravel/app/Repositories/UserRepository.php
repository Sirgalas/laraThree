<?php


namespace App\Repositories;


use App\Exceptions\NotSaveException;
use App\Models\Post;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    public function one(int $id):User
    {
        return User::find($id);
    }

    /**
     * @return Collection
     */
    public function all():Collection
    {
        return User::all();
    }

    public function create(User $user):User
    {
        if(!$user->save())
        {
            throw new NotSaveException('not save',500);
        }
        return $user;
    }

    public function remove(int $id):void
    {
        $user=$this->one($id);
        $user->delete();
    }


    public function count($where=[]):int
    {
        $post=DB::table(User::tableName());
        if(!empty($where)){
            $post->where($where);
        }
        return $post->count();
    }
}
