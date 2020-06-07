<?php


namespace App\Repositories;


use App\Exceptions\NotSaveException;
use App\Models\Name;
use App\Repositories\Interfaces\NameRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class NameRepository implements NameRepositoryInterface
{

    public function one(int $id):Name
    {
        return Name::find($id);
    }

    public function all():Collection
    {
        return Name::all();
    }

    public function save (Name $name):Name
    {
        if(!$name->save()){
            throw new NotSaveException('not save',500);
        }
        return $name;
    }

    public function remove(int $id):void
    {
        $user=$this->one($id);
        $user->delete();
    }
}
