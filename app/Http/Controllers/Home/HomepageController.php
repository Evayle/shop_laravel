<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    /**
     * 用户首页
     */

    public function index(){


        return view('home.homepage.index');


    }





}
