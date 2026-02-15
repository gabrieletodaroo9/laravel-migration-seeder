<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        $trains = Train::where('orario_partenza', '>=', date('Y-m-d'))->orderBy('orario_partenza')->get();
        return view("home",compact("trains"));
    }
}
