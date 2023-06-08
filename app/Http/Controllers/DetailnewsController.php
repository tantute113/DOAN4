<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\News ;
class DetailnewsController extends Controller
{
    //
    function index($i=null)
    {

         $data=News::where("TT_MA",'=',$i)->get();

        return View::make('newsdetail')->with('data',$data);

    }
}
