@extends('adminmaster')

@section('title')
  Manage Articles
@endsection


@section('breadcrumb')
  <li class="active">Manage Articles</li>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12 pills-height">
      <div id="article-grid"></div>
    </div>
  </div>
  <div class="row">
    <div class='col-md-12 footer'>
      <a href="{{url('/admin/article/create')}}" class="btn btn-primary btn-new">New Article</a>
    </div>
  </div>
@endsection


@section('scripts')
  <script type="text/javascript" src={{ URL::asset('/js/admin/articles.js') }}></script>
@endsection
