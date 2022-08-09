<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArticleService;

class HomeController extends Controller
{
    public function index(Request $request,$page = 0){
      $articls = ArticleService::lazyLoad($page);
      return view('home',compact('articls'));
    }
}
