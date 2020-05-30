<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param PostRepositoryInterface $repository
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(PostRepositoryInterface $repository)
    {
        return view('frontend.index',[
            'tops'=>$repository->top(),
            'bottoms'=>$repository->bottom(3),
            'headers'=>$repository->header(),
        ]);
    }
}
