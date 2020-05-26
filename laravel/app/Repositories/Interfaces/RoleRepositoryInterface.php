<?php


namespace App\Repositories\Interfaces;
use App\Models\Role;
use App\Models\User;

interface RoleRepositoryInterface
{
    public function one(int $id);

    public function all();

    public function create(Role $role);

    public function remove(int $id);
}
