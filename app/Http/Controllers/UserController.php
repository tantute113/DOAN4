<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User ;
use Illuminate\Support\Facades\View;
use App\Exports\exportexcel;
use Excel;
class UserController extends Controller
{
    function phanquyen($i=null)
    {
        $i='0'.$i ;
        if($i=='0964522634')
        {
           return redirect()->back() ;
        }else
        {
            $t=User::where("TK_SDT",$i)->get() ;
            foreach($t as $t);
            if($t->LOAI_MA==2)
            {
                $t =User::find($i);
                $t->LOAI_MA='1';
                $t->save();
                return redirect()->back() ;
            }else{
                $t =User::find($i);
                $t->LOAI_MA='2';
                $t->save() ;
                return redirect()->back() ;
            }
           
           
        }
        
      

    }
    function adminuser(Request $request)
    {
        
        if ($request->has('search')) {

            if ($request->search != null) {
                $t =User::where('TK_TEN', '=', "$request->search")
                    ->paginate(7);
            } else {
                $t = User::paginate(7);
            }

        } else {
          
            $t =User::paginate(7);
        }
       
        $data=[
'page'=>'xemtaikhoan',

        ];
      
        return View::make('admin')->with('data',$data)->with('user',$t)->with('i',(request()->input('page',1)-1)*7);;
    }
    public function export_csv()
    {
        return Excel::download(new exportexcel, 'taikhoan.xlsx');
    }
    //
}
