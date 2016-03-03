<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use View;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    
//    
//    public function __construct()
//    {
////        $this->middleware($middleware);
//    }
    
    
    
    public function home()
    {
        return View::make('admin.home');
    }
   
}
