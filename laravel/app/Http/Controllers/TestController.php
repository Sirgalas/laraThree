<?php

namespace App\Http\Controllers;

use Barryvdh\Debugbar\Twig\Extension\Debug;
use Illuminate\Http\Request;
use Debugbar;
class TestController extends Controller
{
    public function user(int $id){
        return $id;
    }
    public function category(string $category){
        Debugbar::info($category);
        return view('category',['category'=>$category]);
    }
}
