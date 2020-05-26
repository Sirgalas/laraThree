<?php


namespace App\Repositories;


use App\Exceptions\NotSaveException;
use App\Models\Role;
use App\Repositories\Interfaces\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface
{
    public function one(int $id):Role
    {
        return Role::find($id);
    }

    /**
     * @return array
     */
    public function all():array
    {
        return Role::all();
    }

    public function create(Role $role):Role
    {
        if(!$role->save()){
            throw new NotSaveException();
        }
        return $role;
    }

    public function remove(int $id):void
    {
        $role=$this->one($id);
        $role->delete();
    }
}
