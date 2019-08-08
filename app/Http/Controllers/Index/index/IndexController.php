<?php

namespace App\Http\Controllers\Index\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class IndexController extends Controller
{
    /**
     * 前台首页
     */
    public function index()
    {
        $slideshow=DB::table('slideshow')->where('show',1)->get();
        return view('index.index.index',compact('slideshow'));
    }
}
