<?php


namespace App\Repositories\Interfaces;
use App\Models\Name;
use Illuminate\Database\Eloquent\Collection;

interface NameRepositoryInterface
{
    public function one(int $id):Name;

    public function all():Collection;

    public function save (Name $name):Name;

    public function remove(int $id):void;

}
