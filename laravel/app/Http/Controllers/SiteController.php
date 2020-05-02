<?php

namespace App\Http\Controllers;

use App\Model\Post;

class SiteController extends Controller
{
    public function index()
    {
        return view('index',[
            'tops'=>Post::top()->get(),
            'bottoms'=>Post::bottom(3)->get(),
            'headers'=>Post::header()->get()
        ]);
    }
}
