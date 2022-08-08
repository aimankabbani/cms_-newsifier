<?php

namespace App\Http\Controllers;
use App\Services\UserService;

use Illuminate\Http\Request;

class UtilsController extends Controller
{
  public function loadUsers(Request $request){
    $name = $request->input("term");
    return UserService::loadUsersGroup($name);
  }
}
