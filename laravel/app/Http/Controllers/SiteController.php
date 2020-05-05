<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Services\PostService;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function index(PostRepositoryInterface $repository)
    {
        return view('index',[
            'tops'=>$repository->top(),
            'bottoms'=>$repository->bottom(3),
            'headers'=>$repository->header(),
        ]);
    }
}
