<?php

namespace App\Services;

use App\Models\Article;
use App\Models\User;
use Giphy;

class GIFService
{
  public static function load($term){
    $giphys =  Giphy::search($term);
    $result = [];
    foreach ($giphys->data as $giphy) {
      $data['id'] = $giphy->id;;
      $data['url'] = $giphy->images->original->url;
      array_push($result,$data);
    }
    return $result;
  }
}
