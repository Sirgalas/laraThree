<?php


namespace App\Repositories;


use App\Repositories\Interfaces\FileRepositoryInterface;
use App\Models\File;
use App\Exceptions\NotSaveException;

class FileRepository implements FileRepositoryInterface
{
    public function one(int $id)
    {
        return File::find($id);
    }

    public function all()
    {
        return File::all();
    }


    public function save(File $file)
    {
        if(!$file->save()){
            throw new NotSaveException('not save',500);
        }
        return $file->id;
    }

    public function remove(int $id)
    {
        $File=$this->one($id);
        $File->delete();
    }
}
