<?php


namespace App\Services;


use App\Http\Requests\PostRequest;
use App\Models\File;
use App\Models\Post;
use App\Repositories\Interfaces\FileRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\PostSearchRequest;

class PostService
{

    public $repository;
    public $fileRepository;

    public static $key=[
        'id',
        'title',
        'created_at'=>[
        'datepicker']];

    public function __construct(PostRepositoryInterface $repository, FileRepositoryInterface $fileRepository)
    {
        $this->repository=$repository;
        $this->fileRepository=$fileRepository;
    }

    public function create(PostRequest $request)
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

    public function search(PostSearchRequest $request)
    {
        $query = Post::orderBy('created_at','DESC');

        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }

        if (!empty($value = $request->get('title'))) {
            $query->where('title', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('created_at_to'))) {
            $query->where('created_at','=<', $value);
        }

        if (!empty($value = $request->get('created_at_from'))) {
            $query->where('created_at','>=', $value);
        }
        return $query->paginate(20);
    }
}
