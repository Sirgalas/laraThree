<?php

namespace App\Http\Controllers;

use App\Exceptions\NotSaveException;
use App\Models\File;
use App\Models\Post;
use App\Models\User;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public $service;
    public function __construct(PostService $service)
    {
        $this->service=$service;
    }

    public function index(PostRepositoryInterface $repository)
    {
        return view('posts',[
            'tops'=>$repository->top(),
            'posts'=>$repository->bottom(),
            'headers'=>$repository->header()
        ]);
    }

    public function one($id)
    {
        return view('post',[
            'post'=>$this->service->repository->one($id),
        ]);
    }

    public function create(Request $request)
    {
        try {
            $this->service->create($request);
        }catch (NotSaveException $e){
            dd($e);
        }
    }

    public function form()
    {
        return view('form');
    }

}
