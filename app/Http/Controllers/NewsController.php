<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\News;
use Illuminate\Support\Facades\Validator;
use App\Models\Coupon;
class NewsController extends Controller
{
    public function index()
    {
        return View::make('news');

        
    }
    function adminnews()
    {

        $t= News::all();
        $data=[
'page'=>'xemtintuc',
'data'=>$t
        ];
      
        return View::make('admin')->with('data',$data);
    }
    function add()
    {
        $mgg=Coupon::all();
        $t= News::all();
        $data=[
'page'=>'addnews',
'data'=>$t
        ];
      
        return View::make('admin')->with('data',$data)->with('mgg',$mgg);
    }
    function addpost(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'ten' => 'required|string',
           
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mota' => 'required|string',
            
        ], [
                'ten.required' => 'Tên sản phẩm bắt buộc nhập',
                'img.required' => 'Ảnh sản phẩm bắt buộc nhập',
                'img.image' => 'Ảnh phải là định dạng ảnh',
                'img.mimes' => 'Ảnh phải là định dạng jpeg, png ,jpg,gif,svg',
                'mota.required' => 'Mô tả sản phẩm bắt buộc nhập'
            ]);

        if ($validator->fails()) {



            return redirect()->route('admin.news.add')
                ->withErrors($validator)
                ->withInput();
        } else {
            $imagePath = $request->file('img')->store('public/img');
            $imagePath = str_replace('public/img/', '', $imagePath);
            $luu = new News;
            $luu->TT_MA = null;
            $luu->TT_TEN = $request->ten;
            $luu->TT_HINHANH = $imagePath;
            $luu->TT_NOIDUNG = $request->mota;
            $luu->MGG_MA=$request->mgg;
            $luu->save();
            return redirect()->route('admin.news.adminnews');

        }


    }
    function delete($i=null)
    {
        $t=News::find($i);
       $t->delete();
return redirect()->back() ;

    }
    
}
