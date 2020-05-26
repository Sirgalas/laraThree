<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\NotFindException;
use App\Exceptions\NotSaveException;
use App\Helpers\Arr;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostSearchRequest;
use App\Models\Post;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\PostService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public $service;
    public $userService;
    public function __construct(PostService $service,UserService $userService)
    {
        $this->service=$service;
        $this->userService=$userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostSearchRequest $request)
    {
        return view('admin.post.posts',[
            'model'=>$this->service->search($request),
            'keys'=>PostService::$key
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(UserRepositoryInterface $repository)
    {
        return view('admin.post.create',[
                'post'=>new Post(),
                'users'=>Arr::map($repository->all(),'id','fullName')]
        );
    }

    /**
     * @param PostRequest $request
     */
    public function store(PostRequest $request)
    {
        try {
            $postId= $this->service->create($request);
            return redirect(route('post_show',$postId));
        }catch (NotSaveException $e){
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            return view('admin.post.show',[
                'model'=>$this->service->repository->one($id)
            ]);
        }catch (NotFindException $e){
            dd($e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=$this->service->repository->one($id);
        $src=null;
        $config=[];
        if(is_object($post->file)) {
            $src='<img src="'.$post->file->url.'" />';
            $config=[
                'caption'=>$post->file->name,
            ];
        }
        return view('admin.post.edit',[
            'post'=>$post,
            'users'=>Arr::map($this->userService->repository->all(),'id','fullName'),
            'file'=>$src,
            'config'=>json_encode($config)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        try {
        $postId= $this->service->edit($request);
        return redirect(route('post_show',$postId));
        }catch (NotSaveException $e){
            dd($e);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
