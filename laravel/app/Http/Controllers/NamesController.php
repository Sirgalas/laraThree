<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Name;

class NamesController extends Controller
{
    public function index()
    {
        return view('names',['names'=>Name::all()]);
    }

    public function fullName()
    {
        $names=Name::all();
        foreach ($names as $name){
            dump($name->full_name);
        }
    }
}
