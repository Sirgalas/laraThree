<?php


namespace App\Services;


use App\Models\File;
use App\Models\Post;
use App\Repositories\Interfaces\FileRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostService
{

    public $repository;
    public $fileRepository;

    public function __construct(PostRepositoryInterface $repository, FileRepositoryInterface $fileRepository)
    {
        $this->repository=$repository;
        $this->fileRepository=$fileRepository;
    }

    public function create(Request $request)
    {
        if(!$request->isMethod('post')){
            throw new \Exception('Запрос пустой');
        }

        $upload=$request->file('image');
        $fileId=0;
        if(is_object($upload)){
            $fileId= $this->fileRepository->save(File::added($upload));
        }
        $post=Post::added($request,$fileId);
        $this->repository->save($post);
        $upload->store('post','public');
        return $post;
    }
}
