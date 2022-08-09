<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GIFService;

class TestController extends Controller
{
    public function testGif(){
      return GIFService::load('cat');
    }
}
