<?php


namespace App\Repositories;


use App\Exceptions\NotSaveException;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
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

    public function addRoles(User $user,int $roleId=1)
    {
        $role=$this->one($roleId);
        $userRole=new UserRole(['user_id'=>$user->id,'role_id'=>$roleId]);
        $userRole->save();
    }
}
