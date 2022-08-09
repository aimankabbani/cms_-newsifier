<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Services\UserService;
use App\Models\User;


class UserController extends Controller
{
    public function login(){
      return view('auth.login');
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        $request->session()->flush();
        Auth::logout();

        return redirect()->route('home');
    }

    public function loginPost(Request $request){
     $user = UserService::loadByEmail($request->email);
     $data = $request->except(['_token']);
     $rules = [
       'email' => 'required|string|email|regex:/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,10})$/i|max:255|exists:users',
       'password' => ['required',
       function ($attribute, $value, $fail) use ($user) {
         if(empty($user) || !Hash::check($value, $user->password)){
           $fail('Invalid Password');
         }
       }]
     ];

     $validator = Validator::make($data, $rules);

     if ($validator->fails()) {
        return redirect()->back()->withInput()->withErrors($validator);
     }

     if (Auth::attempt($data,false)) {
         return redirect()->route('admin.article.view');
     }

     return redirect()->back()->withInput()->withErrors($validator);
   }

   public function signup(){
     return view('auth.signup');
   }

   public function signupPost(Request $request){
     $validator = Validator::make($request->all(), [
        'email' => 'required|regex:/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,10})$/i|unique:users,email',
        'password' => 'required|min:6',
        'confirm_password' => 'required|min:6|same:password',
    ]);

    if($validator->fails()){
      return redirect()->back()->withInput()->withErrors($validator);
    }
    try {
      $tmp = $request->except(['_token']);
      $data= UserService::singup($tmp['email'],$tmp['password']);
      if($data && Auth::attempt($tmp,false)){
        return redirect()->route('admin.article.view');
      }

    } catch (Exception $ex) {
        return redirect()->back()->withInput()->withErrors($validator);
    }
   }
}
