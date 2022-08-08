<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserService
{
  public static function load($filter)
    {
      $index = $filter ? $filter['pageIndex'] : 1;
      $pageSize = $filter ? $filter['pageSize'] : 10;

      $users = User::select(['id', 'name', 'email','created_at']);

      if($filter['email']){
        $users->where('email','like','%'.$filter['email'].'%');
      }

      if($filter['name']){
        $users->where('name','like','%'.$filter['name'].'%');
      }

      $users->orderBy('id', 'desc');
      $result['total'] = $users->count();

      $skip = $index == 1 ? 0 : (($index -1) * 10);
      $result['data'] = $users->take($pageSize)->skip($skip)->get();

      return $result;
    }

    public static function loadById($id){
      return User::find($id);
    }

    public static function saveUpdate($user){
      $hashed = '';
      if (!empty($user['password']) && Hash::needsRehash($user['password'])) {
          $hashed = Hash::make($user['password']);
      }else{
        $hashed = User::where('id', '=', $user['id'])->get()->first()->password;
      }

      return User::updateOrCreate(
        ['id'=>$user['id']],
        ['id'=>$user['id'],'email'=> $user['email'],
        'user_group_id' => $user['user_group_id'],
        'name'=> !empty($user['name']) ? $user['name'] : ''
        ,'password'=> $hashed ]);
    }

    public static function delete($id){
      return User::where('id','=',$id)->delete();
    }

    public static function loadGroups(){
      return [1 => 'Admin',2 => 'User'];
    }

    public static function loadUsersGroup($name = ''){
      $users= User::where('user_group_id', '=', User::GROUP_ADMIN)
      ->select('email', 'id');
      if(!empty($name)){
        $users->where('email','like','%'.$name.'%');
      }

      return $users->limit(10)->get();
    }
}
