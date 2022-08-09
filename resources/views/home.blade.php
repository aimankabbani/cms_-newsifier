@extends('master')
@section('content')
<div class="container">
  @foreach ($articls as $article)
    <div class="card">
      <div class="card__header">
        <img src="https://source.unsplash.com/600x400/?computer" alt="card__image" class="card__image" width="600">
      </div>
      <div class="card__body">
        <span class="tag tag-blue">{{$article->title_en}}</span>
        <p>{{$article->content_en}}</p>
      </div>
      <div class="card__footer">
        <div class="user">
          <img src="https://i.pravatar.cc/40?img=1" alt="user__image" class="user__image">
          <div class="user__info">
            <h5>{{$article->user->name}}</h5>
            <small>{{$article->created_at}}</small>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection
