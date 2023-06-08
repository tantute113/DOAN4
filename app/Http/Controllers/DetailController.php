<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Product ;
use App\Models\Rating ;
use Cart ; 
use App\Models\Detailbill;
class DetailController extends Controller
{
    protected $i ="";
    public function index($i,Request $request)
    {  
       
        if(!empty($request->session()->get('sdtkhachhang'))){

     $tttttt=  $request->session()->get('sdtkhachhang');

        }
else
        {
            $tttttt=null ;
        }
     $dadanhgiachua= Rating::where('SP_MA','=',"$i")->where('TK_SDT','=',"$tttttt")->get()->count();
     if($dadanhgiachua>0){
$ketquadanhgia=3;
$t =Product::find($i) ; 
$tt=Rating::where('SP_MA','=',$i)->where('TT_MA','=','1')->get();
        return View::make('productdetail')->with('data',$t)->with('danhgia',$tt)->with('ketquadanhgia',$ketquadanhgia);
     }else{



        $count = Detailbill::
            join('hoadon', 'chitiethoadon.HD_MA', '=', 'hoadon.HD_MA')
            ->where('chitiethoadon.SP_MA', '=', "$i")
            ->where('hoadon.KH_MA', '=', "$tttttt")
            ->count();
    //         dd($count);
    //     $count = Detailbill::join('hoadon', 'chitiethoadon.HD_MA', '=', 'hoadon.HD_MA')
    // ->join('danhgia', function ($join) {
    //     $join->on('danhgia.TK_SDT', '=', 'hoadon.KH_MA')
    //         ->on('danhgia.SP_MA', '=', 'chitiethoadon.SP_MA');
    // })
    // ->where('danhgia.TK_SDT', "$tttttt")
    // ->where('danhgia.SP_MA', "$i")
    // ->count();

    if($count>0)
    {
$danhgiaroi=1;
    }
    else{
$danhgiaroi=0;
    }
    $ketquadanhgia=$danhgiaroi;
   $t =Product::find($i) ; 
   $tt=Rating::where('SP_MA','=',$i)->where('TT_MA','=','1')->get();
 
        return View::make('productdetail')->with('data',$t)->with('danhgia',$tt)->with('ketquadanhgia',$ketquadanhgia);
     }
    }
        public function danhgia(Request $request)
    {
$rating = new Rating ;
$rating->DG_MA=null ;
    $rating->SP_MA =$request->product ; 
    $rating->TK_SDT=$request->khachhang ;
    $rating->DG_COMMENT =$request->id_message;
    $rating->DG_SAO=$request->id_rateyo ;
    $rating->TT_MA='0' ;
    $t=$rating->save() ;
    return redirect()->back();

    }
    function trangthai(Request $request){
$id=$request->id;
             $tt=Rating::find($id);
          if($tt->TT_MA==0)
          {
            $t='1' ;
          }else
          {
            $t= '0' ;
          }
          $tt->TT_MA=$t;

    $tt->save();
    return redirect()->route("admin.binhluan.adminbinhluan");

    }
}
