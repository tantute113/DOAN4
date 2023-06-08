<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
class ContactController extends Controller
{
    //
    function admincontact()
    {

        $t= Contact::all();
        $data=[
'page'=>'xemlienhe',
'data'=>$t
        ];
      
        return View::make('admin')->with('data',$data);
        
    }
    function delete($i=null)
    {
       $t= Contact::find($i);
       $t->delete();
       return redirect()->route('admin.contact.admincontact');

    }

    function add()
    {
        
     
        $data=[
'page'=>'addcontact'
        ];
      
        return View::make('admin')->with('data',$data);
    }
    function edit()
    {
     
        $data=[
'page'=>'editcontact',
        ];
      
        return View::make('admin')->with('data',$data);
    }
    function addpost(Request $request)
    {
    
            $validator = Validator::make($request->all(), [
                'diachi' => 'required',
                'sodt' => 'required',
                'email' => 'required',
                'facebook' => 'required'
            ], [
                    'diachi.required' => 'Địa chỉ bắt buộc nhập',
                    'sodt.required' => 'Số điện thoại bắt buộc nhập',
                    'email.required' => 'Email bắt buộc nhập',
                    'facebook.required' => 'Facebook bắt buộc nhập'
                ]);
    
            if ($validator->fails()) {
    
    
    
                return redirect()->route('admin.contact.add')
                    ->withErrors($validator)
                    ->withInput();
            } else {
             
                $luu = new Contact;
                $luu->LH_MA = null;
                $luu->LH_DIACHI = $request->diachi;
                $luu->LH_SDT = $request->sodt;
                $luu->LH_EMAIL = $request->email;
                $luu->LH_FACE = $request->facebook;
                $luu->save();
                return redirect()->route('admin.news');
    
            }
    
    
        


    }
}
