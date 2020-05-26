<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\PostService;
use App\Services\UserService;

class SiteController extends Controller
{
    public $postService;
    public $userService;

    public function __construct(PostService $postService,UserService $userService)
    {
        $this->postService=$postService;
        $this->userService=$userService;
    }
    public function index()
    {
        return view('admin.index',
            [
                'postCount'=>$this->postService->repository->count(),
                'userCount'=>$this->userService->repository->count()
            ]);
    }
}
