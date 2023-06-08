<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RegisterController extends Controller
{
    function index()
    {
        return View::make('register');
    }
}
