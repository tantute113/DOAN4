<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use Illuminate\Support\Facades\View;

use DB;
use App\Models\Vnpay;
use App\Exports\exportbill;
use App\Exports\exportvnpay;
use Excel;
use Carbon\Carbon;
class BillController extends Controller
{
    function adminbill(Request $request)
        {
            if ($request->has('search')) {

                if ($request->search != null) {
                    $t =Bill::where('KH_MA', '=', "$request->search")
                        ->paginate(7);
                } else {
    
                    $t = Bill::paginate(7);
                }
    
            } else {
                $t =Bill::paginate(7);
            }
          
            $data=[
    'page'=>'xemhoadon'
            ];
          
            return View::make('admin')->with('bill',$t)->with('data',$data)->with('i',(request()->input('page',1)-1)*7);
        }
        public function export_csv()
        {
            return Excel::download(new exportbill, 'hoadon.xlsx');
        }
        public function export_vnpay()
        {
            return Excel::download(new exportvnpay, 'vnpay.xlsx');
        }
       public function adminvnpay()
       {
        $t= Vnpay::paginate(7);
        $data=[
'page'=>'xemvnpay'
        ];
      
        return View::make('admin')->with('bill',$t)->with('data',$data)->with('i',(request()->input('page',1)-1)*7);
       }
    //
}
