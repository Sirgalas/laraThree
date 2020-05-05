<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Name;

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
