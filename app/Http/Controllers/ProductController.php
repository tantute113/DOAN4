<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use App\Imports\importproduct;

use App\Exports\exportproduct;
use Excel;
use DB;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Like;
use App\Models\Rating;


class ProductController extends Controller
{
    //
    public function index(Request $request)
    {

        //     $left = DB::table('sanpham')
        //     ->leftJoin('luotthich', 'sanpham.SP_MA', '=', 'luotthich.SP_MA')
        //     ->select('sanpham.*', 'luotthich.*');

        // $right = DB::table('sanpham')
        //     ->rightJoin('luotthich', 'sanpham.SP_MA', '=', 'luotthich.SP_MA')
        //     ->select('sanpham.*', 'luotthich.*')
        //     ;
        // $data = $left->union($right)->get();
        $data = Product::all();
      
   
        $data_dm = Category::all();
        // $test=Product::where('DM_MA','=','9')->where('SP_GIA','>','100000')->get(); 
        // foreach($test as $test)
        // {
        //    dd($test->SP_TEN);
        // }
        if ($request->session()->has('sdtkhachhang')) {
            return View::make('product')->with('product', $data)->with('danhmuc', $data_dm)->with('sdtkhachhang', $request->session()->get('sdtkhachhang'));
        } else {
            return View::make('product')->with('product', $data)->with('danhmuc', $data_dm);
        }

    }
    function luotthich(Request $request, $x = null)
    {
        $makh = $request->session()->get('sdtkhachhang');
        $t = Like::where('TK_SDT', '=', $makh)->where('SP_MA', '=', $x)->get();
        $check = $t->count();
        foreach ($t as $t)
            $ma_lt = $t->LT_MA;
        if ($check > 0) {
            $luu = Like::find($ma_lt);
            if ($luu->LT_SOLUONG == '1') {
                $luu->LT_SOLUONG = '0';
                $luu->save();
                return redirect()->route('product');
            } else {
                $luu->LT_SOLUONG = '1';
                $luu->save();
                return redirect()->route('product');
            }
        } else {
            $luu = new Like;
            $luu->LT_MA = null;
            $luu->LT_SOLUONG = '1';
            $luu->SP_MA = $x;
            $luu->TK_SDT = $request->session()->get('sdtkhachhang');
            $luu->save();
            return redirect()->route('product');

        }
    }
    public function timkiem(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->search;
            $token = $request->_token;
            $data = Product::whereRaw("MATCH(SP_TEN,SP_MOTA) AGAINST(? IN NATURAL LANGUAGE MODE)", array($search))
            ->get();
    
   
            $html = view('card', ['data' => $data, 'token' => $token])->render();
            return response()->json(
                $html
            );

        }

    }
    public function search(Request $request)
    {

        if ($request->ajax()) {


            $search = $request->search;
            if ($search == 'danhgia') {
                $token = $request->_token;
                $data = Product::select('sanpham.*', 'danhgia.*', DB::raw('ROUND(AVG(DG_SAO)) as total'), DB::raw('COUNT(DG_SAO) as countdanhgia'))
                ->join('danhgia', function ($join) {
                    $join->on('sanpham.SP_MA', '=', 'danhgia.SP_MA');
                })
                ->groupBy('sanpham.SP_MA')
                ->get();
            
            
           
            
                $html = view('cardrating', ['data' => $data, 'token' => $token])->render();
                return response()->json(
                    $html
                );
            } 
            if ($search == '10') {
                $token = $request->_token;
                $data = Product::orderByDesc('SP_GIA')
                ->get();
            
                $html = view('card', ['data' => $data, 'token' => $token])->render();
                return response()->json(
                    $html
                );
            } else {
                

              

                $t= Product::where('sanpham.DM_MA', 'LIKE', '%' . $search . '%')
                
                ->get();
                $tt=$t->count();
                // $t=Product::where('DM_MA','LIKE','%'.$search.'%')->get();
                // $tt=Product::where('DM_MA','LIKE','%'.$search.'%')->count();
            }
            //   $t=Product::where('DM_MA','LIKE','%'.$search.'%')->get();

            $token = $request->_token;

            if ($tt > 0) {

                $html = view('card', ['data' => $t, 'token' => $token])->render();
                return response()->json(
                    $html
                );

            } else {
                $row = "<h4 style='text-align:center ;'>Không tìm thấy sản phẩm</h4>";
            }
        }
    }

    public function export_csv()
    {
        return Excel::download(new exportproduct, 'sanpham.xlsx');
    }
    public function import_csv(Request $request)
    {
        $path = $request->file('file')->getRealPath();
        Excel::import(new importproduct, $path);
        return back();
    }
    function luugiohang()
    {
        return 0;

    }
    function adminproduct(Request $request)
    {



        if ($request->has('search')) {

            if ($request->search != null) {
                $t = Product::whereRaw("MATCH(SP_TEN,SP_MOTA) AGAINST(? IN NATURAL LANGUAGE MODE)", array($request->search))
                    ->paginate(6);
            } else {

                $t = Product::paginate(6);
            }

        } else {
            $t = Product::paginate(6);
        }
        // $t= Product::all();
        $data = [
            'page' => 'xemsanpham'
        ];

        return View::make('admin')->with('product', $t)->with('data', $data)->with('i', (request()->input('page', 1) - 1) * 6);

    }
    function add(Request $request)
    {$dm=Category::all();
        $t = DB::select('select * from sanpham ');
        $data = [
            'page' => 'addproduct',
            'product' => $t

        ];

        return View::make('admin')->with('data', $data)->with('danhmuc',$dm);
    }
    function addpost(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'ten' => 'required|string',
            'gia' => 'required|numeric',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mota' => 'required|string',
            'danhmuc' => 'required',
        ], [
                'ten.required' => 'Tên sản phẩm bắt buộc nhập',
                'gia.required' => 'Giá sản phẩm bắt buộc nhập',
                'gia.numeric' => 'Giá sản phẩm phải là số',
                'img.required' => 'Ảnh sản phẩm bắt buộc nhập',
                'img.image' => 'Ảnh phải là định dạng ảnh',
                'img.mimes' => 'Ảnh phải là định dạng jpeg, png ,jpg,gif,svg',
                'mota.required' => 'Mô tả sản phẩm bắt buộc nhập',
                'danhmuc.required' => 'Danh mục sản phẩm bắt buộc nhập',
            ]);

        if ($validator->fails()) {



            return redirect()->route('admin.product.add')
                ->withErrors($validator)
                ->withInput();
        } else {
            $imagePath = $request->file('img')->store('public/img');
            $imagePath = str_replace('public/img/', '', $imagePath);
            $luu = new Product;
            $luu->SP_MA = null;
            $luu->SP_TEN = $request->ten;
            $luu->SP_GIA = $request->gia;
            $luu->SP_ANH = $imagePath;
            $luu->SP_MOTA = $request->mota;
            $luu->DM_MA = $request->danhmuc;
            $luu->save();
return redirect()->route('admin.product.adminproduct');
        }


    }

    function editpost(Request $request)
    {
      
        if ($request->hasFile('img')) {
            $validator = Validator::make($request->all(), [
                'ten' => 'required|string',
                'gia' => 'required|numeric',
                'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'mota' => 'required|string',
                'danhmuc' => 'required',
            ], [
                    'ten.required' => 'Tên sản phẩm bắt buộc nhập',
                    'gia.required' => 'Giá sản phẩm bắt buộc nhập',
                    'gia.numeric' => 'Giá sản phẩm phải là số',
                    'img.required' => 'Ảnh sản phẩm bắt buộc nhập',
                    'img.image' => 'Ảnh phải là định dạng ảnh',
                    'img.mimes' => 'Ảnh phải là định dạng jpeg, png ,jpg,gif,svg',
                    'mota.required' => 'Mô tả sản phẩm bắt buộc nhập',
                    'danhmuc.required' => 'Danh mục sản phẩm bắt buộc nhập',
                ]);

            if ($validator->fails()) {
            
                return redirect()->route('admin.product.edit', ['id' =>$request->ma])
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $imagePath = $request->file('img')->store('public/img');
                $imagePath = str_replace('public/img/', '', $imagePath);
                $luu = Product::find($request->ma);
                $luu->SP_TEN = $request->ten;
                $luu->SP_GIA = $request->gia;
                $luu->SP_ANH = $imagePath;
                $luu->SP_MOTA = $request->mota;
                $luu->DM_MA = $request->danhmuc;
                $luu->save();
                return redirect()->route('admin.product.adminproduct');

            }


        } else {

            $validator = Validator::make($request->all(), [
                'ten' => 'required|string',
                'gia' => 'required|numeric',
                'mota' => 'required|string',
                'danhmuc' => 'required',
            ], [
                    'ten.required' => 'Tên sản phẩm bắt buộc nhập',
                    'gia.required' => 'Giá sản phẩm bắt buộc nhập',
                    'gia.numeric' => 'Giá sản phẩm phải là số',
                    'mota.required' => 'Mô tả sản phẩm bắt buộc nhập',
                    'danhmuc.required' => 'Danh mục sản phẩm bắt buộc nhập',
                ]);

            if ($validator->fails()) {
                return redirect()->route('admin.product.edit')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $luu = Product::find($request->ma);
                $luu->SP_TEN = $request->ten;
                $luu->SP_GIA = $request->gia;
                $luu->SP_MOTA = $request->mota;
                $luu->DM_MA = $request->danhmuc;
                $luu->save();
                return redirect()->route('admin.product.adminproduct');
            }

        }



    }

    function edit($i = '')
    {
        $t = Product::select(

            "sanpham.*",
            "danhmuc.*"
        )
            ->join("danhmuc", "danhmuc.DM_MA", "=", "sanpham.DM_MA")
            ->where('sanpham.SP_MA', '=', $i)
            ->get();

        $tt = Category::all();

        $data = [
            'page' => 'editproduct',
            'product' => $t
        ];

        return View::make('admin')->with('data', $data)->with('danhmuc', $tt);
    }
    function delete($i='')
    {
$product=Product::find($i);
$product->delete();
return redirect()->route("admin.product.adminproduct") ;
    }

}
?>