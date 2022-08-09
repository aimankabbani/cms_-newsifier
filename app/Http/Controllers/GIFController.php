<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GIFService;

class GIFController extends Controller
{
    public function load(Request $request,$term = ''){
      return GIFService::load($term);
    }
}
