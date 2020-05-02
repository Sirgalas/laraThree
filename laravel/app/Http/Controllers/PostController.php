<?php

namespace App\Http\Controllers;

use App\Model\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts',[
            'tops'=>Post::top()->get(),
            'posts'=>Post::bottom()->get(),
            'headers'=>Post::header()->get()
        ]);
    }

    public function one($id)
    {
        return view('post',['post'=>Post::find($id)]);
    }

}
