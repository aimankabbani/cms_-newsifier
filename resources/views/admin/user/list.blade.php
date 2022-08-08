@extends('adminmaster')

@section('title')
  Manage Users
@endsection


@section('breadcrumb')
  <li class="active">Manage User</li>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12 pills-height">
      <div id="user-grid"></div>
    </div>
  </div>
  <div class="row">
    <div class='col-md-12 footer'>
      <a href="{{url('/admin/user/create')}}" class="btn btn-primary btn-new">New User</a>
    </div>
  </div>
@endsection


@section('scripts')
  <script type="text/javascript" src={{ URL::asset('/js/admin/users.js') }}></script>
@endsection
