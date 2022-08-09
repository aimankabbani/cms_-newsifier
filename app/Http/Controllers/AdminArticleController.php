<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

use App\Services\ArticleService;
use App\Models\Article;

class AdminArticleController extends Controller
{
  public function index(){
    return view('admin.article.list');
  }

  public function data(Request $request){
    $filter = $request->input('filter');
    $user = Auth::user();
    return ArticleService::load($filter,$user);
  }

  public function createPage(){
    $article = new Article();
    return view('admin.article.create',compact('article'));
  }

  public function createPost(Request $request){
    $article = $request->all();
    dd($article);
    $rules = [
        'title_ar' => 'required|string|min:4',
        'title_en' => 'required|string|min:4',
        'content_ar' => 'required|string|min:50',
        'content_en' => 'required|string|min:50',
        'user_id' => 'required',
    ];

    $validator = Validator::make($article, $rules);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator);
    }

    ArticleService::saveUpdate($article);

    return redirect()->route('admin.article.view');
  }

  public function editPage(Request $request,$id){
    $article =  ArticleService::loadById($id);
    return view('admin.article.create',compact('article'));
  }

  public function delete(Request $request,$id){
    return ArticleService::delete($id);
  }
}
