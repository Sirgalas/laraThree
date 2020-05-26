<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PostRepositoryInterface;

class SiteController extends Controller
{

    public function index(PostRepositoryInterface $repository)
    {
        return view('frontend.index',[
            'tops'=>$repository->top(),
            'bottoms'=>$repository->bottom(3),
            'headers'=>$repository->header(),
        ]);
    }
}
