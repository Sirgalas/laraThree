<?php

namespace App\Http\Controllers\Frontend;

use App\Exceptions\NotSaveException;
use App\Helpers\Arr;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\PostService;

class PostController extends Controller
{
    public $service;
    public function __construct(PostService $service)
    {
        $this->service=$service;
    }

    public function index(PostRepositoryInterface $repository)
    {
        return view('frontend.posts',[
            'tops'=>$repository->top(),
            'posts'=>$repository->bottom(),
            'headers'=>$repository->header()
        ]);
    }

    public function one($id)
    {
        return view('frontend.post',[
            'post'=>$this->service->repository->one($id),
        ]);
    }

    public function create(PostRequest $request)
    {
        dd($request);
        if($request->isMethod('post')){
            try {
                $postId= $this->service->create($request);
                return redirect(url('/posts/one',$postId));
            }catch (NotSaveException $e){
                dd($e);
            }
        }
        return redirect(url('/posts/form'));
    }

    public function form(UserRepositoryInterface $repository)
    {

        return view('frontend.form',[
            'post'=>new Post(),
            'users'=>Arr::map($repository->all(),'id','fullName')]
        );
    }

}
