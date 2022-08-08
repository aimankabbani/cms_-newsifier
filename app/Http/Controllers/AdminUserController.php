<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Services\UserService;
use App\Models\User;


class AdminUserController extends Controller
{
    public function index(){
      return view('admin.user.list');
    }

    public function data(Request $request){
      $filter = $request->input('filter');
      return UserService::load($filter);
    }

    public function createPage(){
      $user = new User();
      $groups = UserService::loadGroups();
      return view('admin.user.create',compact('user','groups'));
    }

    public function createPost(Request $request){
      $user = $request->all();
      $rules = [
          'email' => 'required|regex:/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/i|unique:users,email,'.$user['id'],
          'password' => 'required|string|min:6',
          'name' => 'nullable'
      ];

      $validator = Validator::make($user, $rules);

      if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
      }

      UserService::saveUpdate($user);

      return redirect()->route('admin.user.view');
    }

    public function editPage(Request $request,$id){
      $user =  UserService::loadById($id);
      $groups = UserService::loadGroups();
      return view('admin.user.create',compact('user','groups'));
    }

    public function delete(Request $request,$id){
      return UserService::delete($id);
    }
}
