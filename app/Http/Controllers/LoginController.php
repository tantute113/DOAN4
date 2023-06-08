<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use Redirect;
use DB;
use App\Models\Bill ;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    public function index(REQUEST $request)
    {
   
  $t=Product::all() ;
    
        return View::make('login');
    
    
       
    }
    public function dangxuat(Request $request)
    {
      if($request->session()->has('sdtkhachhang'))
      {
      $request->session()->forget('sdtkhachhang');
      $request->session()->forget('tenkhachhang');
      }
      if($request->session()->has('sdtadmin'))
      {
      $request->session()->forget('sdtadmin');
      $request->session()->forget('tenadmin');
      }
      return redirect()->route('home');
       
    }
    function getLogin(REQUEST $request)
    {
      
      $validator = Validator::make($request->all(), [
        'name' => 'required|numeric|digits:10',
        'password' => 'required'
    ], [
        'name.required' => 'Số điện thoại bắt buộc nhập',
        'name.numeric' => 'Số điện thoại phải nhập là số',
        'name.digits' => 'Số điện thoại phải nhập 10 chữ số',
        'password.required' => 'Mật khẩu bắt buộc nhập',
    ]);
    
if($validator->fails())
{
return redirect()->route('login')
              ->withErrors($validator)
               ->withInput(); 
}


        $t =USER::where('TK_SDT','=',$request->name)->where('TK_MATKHAU','=',$request->password)->count() ;

       $tt = USER::where('TK_SDT', '=',$request->name )->get();
     foreach($tt as $tt)
         if($t>0)
         {
            
           if($tt->LOAI_MA=='1')
             {
                $request->session()->put('sdtadmin',$tt->TK_SDT);
                $request->session()->put('tenadmin',$tt->TK_TEN);
                return redirect()->route('admin');

             }
             else{
                $request->session()->put('sdtkhachhang','0'.$tt->TK_SDT);
                $request->session()->put('tenkhachhang',$tt->TK_TEN);
                return redirect()->route('home');
            }
          
         }else{
           
          return redirect()->route('login')
          ->withErrors($validator)
           ->withInput();     
         }
    }
}
