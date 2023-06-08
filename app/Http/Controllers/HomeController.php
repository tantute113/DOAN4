<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use DB;
use App\Models\Product;
use App\Models\News ;
use Cart;
use App\Models\Detailbill;
use App\Models\Bill;


class HomeController extends Controller
{
    public function index(Request $request)
    { 
        
        if ($request->session()->has('tenkhachhang')) {
            $data= $request->session()->get('tenkhachhang');
            $tuixach=Product::where('DM_MA','=','9')->take(4)->get();
        
       
        // dd($fullOuterJoin);
         
            $bestSellingItems = Detailbill::query()
            ->select('SP_MA', DB::raw('SUM(CTHD_SOLG) as totalQuantity'))
            ->groupBy('SP_MA')
            ->orderByDesc('totalQuantity')
            ->take(4)
            ->get();

        $product=[];
     
        if ($bestSellingItems->isNotEmpty()) {
            foreach ($bestSellingItems as $item) {
                $product[]= Product::find($item->SP_MA);
               
                // echo "Sản phẩm bán chạy: " . $product->SP_ANH . ", Số lượng: " . $item->totalQuantity . "<br>";
            }
        } else {
            echo "Không có dữ liệu";
        }
            $news=News::all();
    //         $news = DB::table('tintuc')
    // ->join('magiamgia', 'tintuc.MGG_MA', '=', 'magiamgia.MGG_MA')
    // ->select('tintuc*', 'tintuc.MGG_MA as column_name')
    // ->get();

            return View::make('home')->with('tuixach',$tuixach)->with('news',$news)->with('tenkhachhang',$data)->with('bestsale',$product);
              //
          }else
      
          {
            $bestSellingItems = Detailbill::query()
            ->select('SP_MA', DB::raw('SUM(CTHD_SOLG) as totalQuantity'))
            ->groupBy('SP_MA')
            ->orderByDesc('totalQuantity')
            ->take(4)
            ->get();
        $product=[];
     
        if ($bestSellingItems->isNotEmpty()) {
            foreach ($bestSellingItems as $item) {
                $product[]= Product::find($item->SP_MA);
               
                // echo "Sản phẩm bán chạy: " . $product->SP_ANH . ", Số lượng: " . $item->totalQuantity . "<br>";
            }
        } else {
            echo "Không có dữ liệu";
        }
            // $request->session()->forget('TEN_REGISTER');
            // $request->session()->forget('MATKHAU_REGISTER');
            // $request->session()->forget('DIACHI_REGISTER');
          
             $news = DB::table('tintuc')->get();
    // ->join('magiamgia', 'tintuc.MGG_MA', '=', 'magiamgia.MGG_MA')
    // ->select('tintuc.*', 'magiamgia.MGG_PHANTRAM')
    // ->get();
   
    

$tuixach = Product::where('DM_MA', '=', '9')->take(4)->get();


           
            $t =  DB::select('SELECT  * from  sanpham LIMIT 6;');
            return View::make('home')->with('news',$news)->with('data',$t)->with('tuixach',$tuixach)->with('bestsale',$product);
          }
     
    }
   
}
