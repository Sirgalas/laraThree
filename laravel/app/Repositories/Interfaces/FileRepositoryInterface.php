<?php


namespace App\Repositories\Interfaces;


use App\Models\File;

interface FileRepositoryInterface
{

    public function one(int $id);

    public function all();

    public function save(File $file);

    public function remove(int $id);
}
