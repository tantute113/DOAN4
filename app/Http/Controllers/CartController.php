<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use DB;
use Carbon\Carbon;
use App\Models\Bill;
use App\Models\Detailbill;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use App\Models\Cartsave;

class CartController extends Controller
{
    public function index(Request $request)
    {

        if ($request->has('magiamgia')) {
            if ($request->magiamgia == null) {
                $t = Cart::content();
                $tt = Cart::subtotal();
                $tt = intval(str_replace(',', '', $tt));

                $ttt = Cart::count();
                //    foreach($t as $tv)
                //    {

                //     print_r($tv->options->img) ;
                //    }
                //    Cart::get('11212ec83d223f5af27a60540752ea30');

                $data = [
                    'cart' => $t,
                    'total' => $tt,
                    'qty' => $ttt
                ];
                return View::make('cart')->with('data', $data);
            } else {
                $t = DB::table('magiamgia')->where('MGG_MA', '=', $request->magiamgia)->where("TT_MA",'=','1')->get();
                $check = $t->count();
                if ($check > 0) {

                    foreach ($t as $t)
                        
                    $phantram = $t->MGG_PHANTRAM;
                    $tongtien = Cart::subtotal();
                    $tongtien = intval(str_replace(',', '', $tongtien));
                    $del=$tongtien ;
                    $tongtien = $tongtien - ($phantram * $tongtien / 100);
                    $tt = $tongtien;
                    $t = Cart::content();
                    $ttt = Cart::count();
                    //    foreach($t as $tv)
                    //    {

                    //     print_r($tv->options->img) ;
                    //    }
                    //    Cart::get('11212ec83d223f5af27a60540752ea30');
                    $data = [
                        'cart' => $t,
                        'total' => $tt,
                        'qty' => $ttt,
                        'phantramgiamgia' => $phantram
                    ];
                    return View::make('cart')->with('data', $data)->with("del",$del);
                } else {
                    $request->ten = '';
                    $validator = Validator::make($request->all(), [
                        'ten' => 'required'
                    ], [
                            'ten.required' => 'Mã giảm giá không tồn tại'
                        ]);
                    if ($validator->fails()) {
                        return redirect()->route('cart')
                            ->withErrors($validator)
                            ->withInput();
                    }
                }
            }
        } else {

            $name = $request->input('masp');
            $test = DB::select("SELECT * FROM `sanpham` WHERE sanpham.SP_MA='$name';");
            foreach ($test as $t) {
                Cart::add(['id' => $t->SP_MA, 'name' => $t->SP_TEN, 'qty' => 1, 'price' => $t->SP_GIA, 'weight' => 550, 'options' => ['img' => $t->SP_ANH]]);
            }
            $t = Cart::content();
            $tt = Cart::subtotal();
            $tt = intval(str_replace(',', '', $tt));
            $request->session()->put('tongtienvnpay', $tt);

            $ttt = Cart::count();
            //    foreach($t as $tv)
            //    {     
            //     print_r($tv->options->img) ;
            //    }
            //    Cart::get('11212ec83d223f5af27a60540752ea30');
            $data = [
                'cart' => $t,
                'total' => $tt,
                'qty' => $ttt
            ];
            return View::make('cart')->with('data', $data);

        }

    }

    public function add($id = "")
    {
        $t = Cart::get($id);
        $tt = $t->qty;
        $ttt = $tt + 1;

        Cart::update($id, $ttt);
        return redirect()->route('cart');

    }
    function reduce($id = "")
    {

        $t = Cart::get($id);
        $tt = $t->qty;
        if ($tt == 1) {
            $ttt = $tt;
        } else {
            $ttt = $tt - 1;
        }
        Cart::update($id, $ttt);
        return redirect()->route('cart');

    }
    function move($id = '')
    {
        Cart::remove($id);
        return redirect()->route('cart');
    }
    
    function thanhtoan(Request $request)
    {
if(!empty($request->session()->get('sdtkhachhang'))){
    if($request->session()->get('tongtienvnpay')==null &&$request->session()->get('tongtienvnpay')==0)
    {
        return redirect()->back()->withErrors(['error' => 'Chưa có sản phẩm'])->withInput();
        
    }else{
$bill=new Bill;
$bill->HD_MA=null;
$bill->HD_THANHTIEN=$request->session()->get('tongtienvnpay');
$bill->HD_NGLAP=Carbon::now();
$bill->KH_MA=$request->session()->get('sdtkhachhang');
$bill->TT_MA='0';
$bill->HD_GHICHU='thanh toán hóa đơn';
        $bill->save();
$maxbill=Bill::max('HD_MA') ;

$cart=Cart::content() ;
foreach($cart as $cart){
    $detailbill= new Detailbill ;
    $detailbill->CTHD_MA=null ;
    $detailbill->HD_MA=$maxbill;
    $detailbill->SP_MA=$cart->id;
    $num = intval($cart->price);
    $detailbill->CTHD_DONGIA=$num;
    $detailbill->CTHD_SOLG=$cart->qty;
    $detailbill->save();
}

return redirect()->back()->withErrors(['error' => 'Đặt hàng thành công'])->withInput();
    }
}else
{
    return redirect()->back()->withErrors(['error' => 'Chưa đăng nhập'])->withInput();
}
    }
    function luugiohang(Request $request)
    {
        $t = Cart::content();
        $checklogin = $request->session()->get('sdtkhachhang');
        $sdt = $checklogin;
        if (!empty($sdt)) {
            foreach ($t as $t) {

                $check = Cartsave::where('SP_MA', '=', $t->id)->where('TK_SDT', '=', $sdt)->count();

                if ($check > 0) {
                    $checktontai = Cartsave::where('SP_MA', '=', $t->id)->where('TK_SDT', '=', $sdt)->get();
                    foreach ($checktontai as $checktontai)

                        $MA_GH = $checktontai->GH_MA;
                    $giohang = Cartsave::find($MA_GH);
                    $giohang->GH_SOLUONG = $t->qty;
                    $giohang->save();
                   

                } else {
                    $cartsave = new Cartsave;
                    $cartsave->GH_MA = null;
                    $cartsave->SP_MA = $t->id;
                    $cartsave->GH_SOLUONG = $t->qty;
                    $cartsave->TK_SDT = $sdt;
                    $cartsave->save();
                  
                }



            }
        } else {
            return redirect()->back()->withErrors(['error' => 'Chưa đăng nhập'])->withInput();
        }
    }






}