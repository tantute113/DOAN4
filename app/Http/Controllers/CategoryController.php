<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB ;
use Illuminate\Support\Facades\View;
class CategoryController extends Controller
{
    function admincaterogy()
    {

        $t= DB::select('select * from danhmuc');
        $data=[
'page'=>'xemdanhmuc',
'data'=>$t
        ];
      
        return View::make('admin')->with('data',$data);
        
    }
    function add()
    {
     
        $data=[
'page'=>'addcategory'
        ];
      
        return View::make('admin')->with('data',$data);
    }
    function edit()
    {
     
        $data=[
'page'=>'editcategory',
        ];
      
        return View::make('admin')->with('data',$data);
    }
}
