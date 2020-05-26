<?php


namespace App\Repositories\Interfaces;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function one(int $id):User;

    public function all():Collection;

    public function create(User $user):User;

    public function remove(int $id):void;

}
