<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Name;
use Illuminate\Http\Request;

class NamesController extends Controller
{
    public function index(Request $request)
    {
        return view('names',[
            'names'=>Name::all(),
            'request'=>$request
        ]);
    }

    public function fullName()
    {
        $names=Name::all();
        foreach ($names as $name){
            dump($name->full_name);
        }
    }
}
