<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SmSController;
use App\Http\Controllers\CouponController  ;
use App\Http\Controllers\DetailnewsController  ;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\DetailbillController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VnpayController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',
   [HomeController::class,'index']
)->name('home');
Route::get('/product',
   [ProductController::class,'index']
   
)->name('product');

Route::get('/detailnews/{id}',
   [DetailnewsController::class,'index']
)->name('detailnews');
Route::get('/luugiohang',
   [ProductController::class,'luugiohang']
)->name('luugiohang');
Route::get('/luotthich/{x}',
   [ProductController::class,'luotthich']
);
Route::get('/product/search', [ProductController::class,'search'])->name('product.search');
Route::get('/product/timkiem', [ProductController::class,'timkiem'])->name('product.timkiem');
Route::get('/cart',
   [CartController::class,'index']
)->name('cart');
Route::get('/cart/add/{id}',
   [CartController::class,'add']
)->name('cart.add');
Route::get('/cart/reduce/{id}',
   [CartController::class,'reduce']
)->name('cart.reduce');
Route::get('/cart/luugiohang',
   [CartController::class,'luugiohang']
)->name('cart.luugiohang');
Route::post('/cart/thanhtoan',
   [CartController::class,'thanhtoan']
)->name('cart.thanhtoan');
Route::get('/cart/move/{id}',
   [CartController::class,'move']
)->name('cart.reduce');
Route::post('/cart',
   [CartController::class,'index']
)->name('cart');
Route::get('/detail/{id}',
   [DetailController::class,'index']
)->name('product.detail');
Route::post('/danhgia',
   [DetailController::class,'danhgia']
)->name('danhgia');
Route::get('/danhgia/{id}',
   [DetailController::class,'trangthai']
);
Route::get('/admin',
   [AdminController::class,'index']
)->name('admin')->middleware('checklogin');
Route::get('/news',
   [NewsController::class,'index']
);

Route::get('/login',
   [LoginController::class,'index']
)->name('login')->middleware('checktruelogin');
Route::get('/dangxuat',
   [LoginController::class,'dangxuat']
)->name('dangxuat');
Route::post('/login',
   [LoginController::class,'getLogin']
)->name('getLogin');

Route::get('/register',
   [RegisterController::class,'index']
)->name('register')->middleware('checktruelogin');
Route::post('/register',
   [RegisterController::class,'getregister']
)->name('getregister');


Route::get('/sms', 
[FirebaseController::class,'index']
)->name('sms')->middleware('checksms')->middleware('checktruelogin');;

Route::get('/firebase/luu', 
[FirebaseController::class,'luu']
)->name('firebase.luu');
Route::post('/sms', 
[FirebaseController::class,'index']
)->name('sms');

// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
//    // Các tuyến trong nhóm đầu tiên
//    Route::get('/dashboard', 'AdminController@dashboard');
//    Route::get('/users', 'AdminController@users');

//    Route::group(['prefix' => 'settings', 'middleware' => 'settings'], function () {
//        // Các tuyến trong nhóm thứ hai
//        Route::get('/', 'SettingsController@index');
//        Route::get('/profile', 'SettingsController@profile');
//        Route::get('/security', 'SettingsController@security');
//    });
// });

// Route::get('hienthi/{id}', 
//    [HomeController::class,'hienthi']);
// Route::get('/ten/{id}', function ($id ="") {
//     return "đây là trang add"." ".$id  ;
// });
// Route::get('/chuyenhuong', function () {
//     return "chuyển hướng trang";
// })->name('chuyenhuong');

Route::prefix('admin')->middleware('checklogin')->name('admin.')->group(function (){
   Route::prefix('product')->name('product.')->group(function (){
      Route::get('/', [ProductController::class ,'adminproduct'])->name('adminproduct');
      Route::get('/add', [ProductController::class,'add'])->name('add');
      Route::post('/addpost', [ProductController::class,'addpost'])->name('addpost');
      Route::post('/editpost', [ProductController::class,'editpost'])->name('editpost');
      Route::get('/delete/{id}', [ProductController::class,'delete'])->name('delete');
      Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');
      
   });
   Route::prefix('thongke')->name('thongke.')->group(function (){
      Route::get('/', [AdminController::class ,'index'])->name('adminthongke');
      
   });
   Route::prefix('binhluan')->name('binhluan.')->group(function (){
      Route::get('/', [AdminController::class ,'adminbinhluan'])->name('adminbinhluan');
      
   });
   Route::prefix('news')->name('news.')->group(function (){
      Route::get('/', [NewsController::class ,'adminnews'])->name('adminnews');
      Route::get('/add', [NewsController::class,'add'])->name('add');
      Route::post('/addpost', [NewsController::class,'addpost'])->name('addpost');
      Route::get('/delete/{id}', [NewsController::class,'delete'])->name('delete');
      Route::get('/edit/{id}',[NewsController::class,'edit'])->name('edit');
      
   });

   Route::prefix('coupon')->name('coupon.')->group(function (){
      Route::get('/', [CouponController::class ,'admincoupon'])->name('admincoupon');
      Route::get('/add', [CouponController::class,'add'])->name('add');
      Route::post('/addpost', [CouponController::class,'addpost'])->name('addpost');
      Route::get('/delete/{id}', [CouponController::class,'delete'])->name('delete');
      Route::get('/edit/{id}',[CouponController::class,'edit'])->name('edit');
      Route::get('/trangthai/{id}',[CouponController::class,'trangthai'])->name('trangthai');
      
   });
   Route::prefix('bill')->name('bill.')->group(function (){
      Route::get('/', [BillController::class ,'adminbill'])->name('adminbill');
      Route::get('/duyet', [BillController::class ,'adminbill'])->name('duyet');
    
     
      
      
   });
   Route::prefix('detailbill')->name('detailbill.')->group(function (){
      Route::get('/', [DetailbillController::class ,'admindetailbill'])->name('admindetailbill');
     
    
     
      
      
   });
   Route::prefix('user')->name('user.')->group(function (){
      Route::get('/', [UserController::class ,'adminuser'])->name('adminuser');
      Route::get('/phanquyen/{id}', [UserController::class ,'phanquyen'])->name('phanquyen');
   });
   Route::prefix('category')->name('category.')->group(function (){
      Route::get('/', [CategoryController::class ,'admincategory'])->name('admincategory');
      Route::get('/add', [CategoryController::class,'add'])->name('add');
      Route::get('/delete/{id}', [CategoryController::class,'delete'])->name('delete');
      Route::get('/edit/{id}',[CategoryController::class,'update'])->name('edit');
      
   });

   Route::prefix('contact')->name('contact.')->group(function (){
      Route::get('/', [ContactController::class ,'admincontact'])->name('admincontact');
      Route::get('/add', [ContactController::class,'add'])->name('add');
      Route::post('/addpost', [ContactController::class,'addpost'])->name('addpost');
      Route::get('/delete/{id}', [ContactController::class,'delete'])->name('delete');
      Route::get('/edit/{id}',[ContactController::class,'update'])->name('edit');
      
   });

   Route::prefix('vnpay')->name('vnpay.')->group(function (){
      Route::get('/', [BillController::class ,'adminvnpay'])->name('adminvnpay');
         
      
   });






  }); 
   



//   Route::prefix('news')->name('news.')->group(function (){
//    Route::get('/', [HomeController::class ,'index'])->name('index');
//    Route::get('/add', [HomeController::class,'add'])->name('add');
//    Route::get('/delete/{id}', [HomeController::class,'delete'])->name('delete');
//    Route::get('/update/{id}',[HomeController::class,'update'])->name('update');
//    Route::get('/addConfirm',[HomeController::class,'handleadd'])->name('handle.add');
// });
// });
Route::post('/export-csv',[ProductController::class,'export_csv'])->name('export_csv');
Route::post('/import-csv',[ProductController::class,'import_csv'])->name('import_csv');
Route::post('/export-taikhoan',[UserController::class,'export_csv'])->name('export_taikhoan');
Route::post('/export-hoadon',[BillController::class,'export_csv'])->name('export_hoadon');
Route::post('/export-vnpay',[BillController::class,'export_vnpay'])->name('export_vnpay');

Route::get('/vnpay',[VnpayController::class,'index'])->name('vnpay');
Route::post('/vnpay',[VnpayController::class,'index'])->name('vnpay');