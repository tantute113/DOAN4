<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use DB ;
use App\Models\User;
use App\Models\Product;
use App\Models\Bill;
use App\Models\Rating;
use Auth; //use thư viện auth
class AdminController extends Controller
{
    public function index()
    {
        $results = DB::table('sanpham')
        ->join('danhmuc', 'sanpham.DM_MA', '=', 'danhmuc.DM_MA')
        ->select('danhmuc.DM_MA', 'DM_TEN', DB::raw('COUNT(sanpham.DM_MA) as so_danhmuc'))
        ->groupBy('sanpham.DM_MA')->get();
        $mang=null ;
        $mangten=null;
        foreach($results as $result)
{
  $mang.= "$result->so_danhmuc,";
  $mangten.='"'.$result->DM_TEN.'",';
}

        $sanpham=Product::all()->count();  
        $taikhoan=User::all()->count();  
        $hoadon=Bill::all()->count();  
        $binhluan=Rating::all()->count();  
       $taikhoan= User::all()->count();
        $data=[
'page'=>'chart'        ];
      
        return View::make('admin')->with('data',$data)->with('mang',$mang)->with('mangten',$mangten)->with('sanpham',$sanpham)->with('taikhoan',$taikhoan)->with('hoadon',$hoadon)->with('binhluan',$binhluan);

    }
    public function adminbinhluan(Request $request)
    
    {
        if ($request->has('search')) {

                if ($request->search != null) {
                    $t =Rating::where('DG_COMMENT', '=', "$request->search")
                        ->paginate(7);
                } else {
                    $t = Rating::paginate(7);
                }
    
            } else {
              
                $t =Rating::paginate(7);
            }
           

      
            $data=[
    'page'=>'xembinhluan'
            ];
          
            return View::make('admin')->with('binhluan',$t)->with('data',$data)->with('i',(request()->input('page',1)-1)*7);
    }
}
