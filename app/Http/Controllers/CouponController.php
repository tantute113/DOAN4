<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon ;
use DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
class CouponController extends Controller
{
    function admincoupon(){

        $t =Coupon::paginate(7);
      
        
        $data=[
            'page'=>'xemgiamgia'
                    ];
        return View::make('admin')->with('bill',$t)->with('data',$data)->with('i',(request()->input('page',1)-1)*7);
    }
    function add()
    {
     
        $data=[
'page'=>'addcoupon'
        ];
      
        return View::make('admin')->with('data',$data);
    }
    function addpost(Request $request)
    {
    
            $validator = Validator::make($request->all(), [
                'MGG_MA' => 'required|unique:magiamgia',
                'tengg' => 'required',
                'ptgg' => 'required'
            ], [
                    'MGG_MA.required' => 'Mã giảm giá bắt buộc nhập',
                    'MGG_MA.unique' => 'Mã giảm giá tồn tại',
                    'tengg.required' => 'Số điện thoại bắt buộc nhập',
                    'ptgg.required' => 'Phần trăm giảm giá bắt buộc nhập'
                ]);
    
            if ($validator->fails()) {
    
    
    
                return redirect()->route('admin.coupon.add')
                    ->withErrors($validator)
                    ->withInput();
            } else {
             
                $luu = new Coupon;
                $luu->MGG_MA = $request->MGG_MA;
                $luu->MGG_TEN = $request->tengg;
                $luu->MGG_PHANTRAM = $request->ptgg;
                $luu->TT_MA = "0";
               
                $luu->save();
                return redirect()->route('admin.coupon.admincoupon');
    
            }
    
    
        


    }
    function edit()
    {

    }
    function delete($i=null)
    {
       $t= Coupon::where('MGG_MA', $i)->delete();
      return redirect()->back();

    }
    function trangthai($i){
     $get=Coupon::where('MGG_MA',$i)->get();
     foreach($get as $get)
        if($get->TT_MA==0)
        {
          $t='1' ;
        }else
        {
          $t= '0' ;
        }
        Coupon::where('MGG_MA', $i)->update([
            'TT_MA' => $t
        ]);
      
            return redirect()->route("admin.coupon.admincoupon");
        
            }



}
