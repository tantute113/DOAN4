<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Rating ; 
use App\Models\Detailbill;

use Illuminate\Support\Facades\View;
class DetailbillController extends Controller
{
    function admindetailbill()
        {

            $t= Detailbill::paginate(7);
            $data=[
    'page'=>'xemchitiethoadon'
            ];
          
            return View::make('admin')->with('detailbill',$t)->with('data',$data)->with('i',(request()->input('page',1)-1)*7);
        }
    function save_ratng(Request $request)
    {
        
    }
}
