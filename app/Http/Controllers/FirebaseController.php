<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use DB;
class FirebaseController extends Controller
{
    
    function index(Request $request)
    {
 
      
      $validator = Validator::make($request->all(), [
        'TK_SDT' => 'required|numeric|digits:10|unique:taikhoan',
        'password' => 'required',
        'ten' => 'required|string',
        'diachi' => 'required|string',
    ], [
      'TK_SDT.required' => 'Số điện thoại bắt buộc nhập',
      'TK_SDT.digits'=>'Số điện thoại phải là :digits chữ số',
      'TK_SDT.unique'=>'Số điện thoại đã được đăng ký',
      'TK_SDT.numeric'=>'Số điện thoại phải nhập là số',
        'password.required' => 'Mật khẩu bắt buộc nhập',
        'ten.required' => 'Tên bắt buộc nhập',
        'diachi.required' => 'Địa chỉ bắt buộc nhập'
    ]);
    
if($validator->fails())
{
return redirect()->route('register')
              ->withErrors($validator)
               ->withInput(); 
}

$request->session()->put('TEN_REGISTER', $request->ten);
$request->session()->put('MATKHAU_REGISTER', $request->password);
$request->session()->put('DIACHI_REGISTER', $request->diachi);
        $chuoi = $request->TK_SDT;
        $request->session()->put('SDT_REGISTER',$chuoi);
        $soDienThoai = preg_replace('/^0/', '+84', $chuoi, 1);
        if($request->input('data')!=null) 
        {
        $data = $request->input('data');
    
        $result = 'Dữ liệu đã được xử lý: ' . $data;
    
      
        }
        return view('firebase')->with('name',$soDienThoai)->with('data',$request);
     
    }
    function luu(Request $request)
    {
      $luu= new User ;
      $luu->TK_TEN = $request->session()->get('TEN_REGISTER');
      $luu->TK_MATKHAU= $request->session()->get('MATKHAU_REGISTER');
      $luu->LOAI_MA='2' ;
      $luu->TK_GMAIL="test@gmail.com";
      $luu->TK_DIAC=$request->session()->get('DIACHI_REGISTER');
      $luu->TK_SDT=$request->session()->get('SDT_REGISTER');
      $luu->save();
      $request->session()->forget('TEN_REGISTER');
      $request->session()->forget('MATKHAU_REGISTER');
      $request->session()->forget('DIACHI_REGISTER');
      $request->session()->forget('SDT_REGISTER');
    }
}
