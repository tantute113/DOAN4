<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill ;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Detailbill ;
use App\Models\Vnpay ;
use Illuminate\Support\Facades\Session;
Session::start();
class VnpayController extends Controller
{
    function index(Request $request)
    {
        if(empty($request->session()->get('sdtkhachhang'))){
            return redirect()->back()->withErrors(['error' => 'Chưa đăng nhập'])->withInput();
        }
        $t=Bill::max('HD_MA');
     $t=$t+1 ;
    
        // $matest=Carbon::now() ;
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://127.0.0.1:8000/vnpay";
$vnp_TmnCode = "VS1AHJ6N";//Mã website tại VNPAY 
$vnp_HashSecret = "NONMUHAEYJPYGEYSVFKQWHYIWCVFWTAF";//Chuỗi bí mật
$maxbill=Bill::max('HD_MA') ;
$vnp_TxnRef = $maxbill; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
$vnp_OrderInfo = 'thanh toan hoa don';
$vnp_OrderType ='billpayment';


$vnp_Amount = $request->session()->get('tongtienvnpay')*100;
$vnp_Locale = 'vn';
$vnp_BankCode = 'NCB';
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
//Add Params of 2.0.1 Version
// $vnp_ExpireDate = $_POST['txtexpire'];
// //Billing
$vnp_Bill_Mobile =$request->session()->get('sdtkhachhang');
// $vnp_Bill_Email = $_POST['txt_billing_email'];
// $fullName = trim($_POST['txt_billing_fullname']);
if (isset($fullName) && trim($fullName) != '') {
    $name = explode(' ', $fullName);
    $vnp_Bill_FirstName = array_shift($name);
    $vnp_Bill_LastName = array_pop($name);
}
// $vnp_Bill_Address=$_POST['txt_inv_addr1'];
// $vnp_Bill_City=$_POST['txt_bill_city'];
// $vnp_Bill_Country=$_POST['txt_bill_country'];
// $vnp_Bill_State=$_POST['txt_bill_state'];
// // Invoice
 $vnp_Inv_Phone='0964522634';
// $vnp_Inv_Email=$_POST['txt_inv_email'];
// $vnp_Inv_Customer=$_POST['txt_inv_customer'];
// $vnp_Inv_Address=$_POST['txt_inv_addr1'];
// $vnp_Inv_Company=$_POST['txt_inv_company'];
// $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
// $vnp_Inv_Type=$_POST['cbo_inv_type'];
$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,
    // "vnp_ExpireDate"=>$vnp_ExpireDate,
    "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
    // "vnp_Bill_Email"=>$vnp_Bill_Email,
    // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
    // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
    // "vnp_Bill_Address"=>$vnp_Bill_Address,
    // "vnp_Bill_City"=>$vnp_Bill_City,
    // "vnp_Bill_Country"=>$vnp_Bill_Country,
    // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
    // "vnp_Inv_Email"=>$vnp_Inv_Email,
    // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
    // "vnp_Inv_Address"=>$vnp_Inv_Address,
    // "vnp_Inv_Company"=>$vnp_Inv_Company,
    // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
    // "vnp_Inv_Type"=>$vnp_Inv_Type
);

if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}
if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
    $inputData['vnp_Bill_State'] = $vnp_Bill_State;
}

//var_dump($inputData);
ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}
$returnData = array('code' => '00'
    , 'message' => 'success'
    , 'data' => $vnp_Url);
    if (isset($_POST['redirect'])) {
        header('Location: ' . $vnp_Url);
        die();
    } else {
      
        $test=json_encode($returnData);
       
        parse_str(parse_url($test, PHP_URL_QUERY), $data);

// Hiển thị dữ liệu
$data;

// "vnp_Amount" => "0"
//   "vnp_BankCode" => "NCB"
//   "vnp_Bill_Mobile" => "0964522634"
//   "vnp_Command" => "pay"
//   "vnp_CreateDate" => "20230509142131"
//   "vnp_CurrCode" => "VND"
//   "vnp_IpAddr" => "127.0.0.1"
//   "vnp_Locale" => "vn"
//   "vnp_OrderInfo" => "thanh toan hoa don"
//   "vnp_OrderType" => "billpayment"
//   "vnp_ReturnUrl" => "http://127.0.0.1:8000/vnpay"
//   "vnp_TmnCode" => "VS1AHJ6N"
//   "vnp_TxnRef" => "2023-05-09 14:21:31"
//   "vnp_Version" => "2.1.0"
//   "vnp_SecureHash" => "f7680025cb7bf5b72c1fd1d09d8398e141c5dfaec5e3ff37b8dc7100b62122d2f69c97696cb03596498f206fc0e4bba7434dfe151222a588a3637096e7c0afdb"}"
$bill=new Bill;
$bill->HD_MA=null;
$bill->HD_THANHTIEN=$data['vnp_Amount'];
$bill->HD_NGLAP=$data['vnp_CreateDate'];
$bill->KH_MA=$data['vnp_Bill_Mobile'];
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
$vnpay=new Vnpay;
$vnpay->id_vnpay=null;
$vnpay->vnp_amount=$data['vnp_Amount'];
$vnpay->vnp_bankcode="NCB";
$vnpay->vnp_orderinfo=$data['vnp_OrderInfo'];
        $vnpay->vnp_paydate=$data['vnp_CreateDate'];
        $vnpay->HD_MA=$maxbill;
        $vnpay->save();
    return redirect()->route('cart');
    }
    }

  
}
