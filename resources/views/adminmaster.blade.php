<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>CMS Management | Dashboard</title>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{URL::asset('/css/jquery-ui.min.css')}}">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ URL::asset("/bower_components/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ URL::asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ URL::asset("/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css")}}" />

    <link href="{{ URL::asset("/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />

    <link href="{{ URL::asset("/static/select2/select2.min.css")}}" rel="stylesheet" type="text/css" />

    {{--  js grid --}}
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('/bower_components/AdminLTE/plugins/jsgrid/css/jsgrid.min.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('/bower_components/AdminLTE/plugins/jsgrid/css/jsgrid-theme.min.css') }}" />

    {{-- sweetalert --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/static/sweetalert/sweetalert2.min.css') }}">
    @yield('head')
</head>
<body class="skin-blue">
<div class="wrapper">
    <!-- Main Header -->
      <header class='main-header'>
          <!-- Logo -->
            <a href="{{url('/admin')}}" class="logo">Dashboard</a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="hidden-xs">Administrator</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="{{url("/logout")}}" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
      </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left info">
              <p>Administrator</p>
            </div>
        </div>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">

              <li class="header">Menu</li>
              <li class="active"><a href="{{url("/admin")}}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
              @if(Auth()->user()->user_group_id == 1)
                <li class="treeview">
                  <a href="{{url('/admin/users')}}"><span>User Managment</span></a>
                </li>
              @endif
              <li class="treeview">
                <a href="{{url('/admin/articles')}}"><span>Article Managment</span></a>
              </li>
          </ul><!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('title')
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                @yield('breadcrumb')
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          @yield('content')

      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">

        </div>
        <!-- Default to the left -->
        <strong>Copyright © <?php echo date("Y"); ?> <a href="#">CMS Managment System</a>.</strong> All rights reserved.
    </footer>

</div>
<!-- jQuery 2.1.3 -->
  <script src="{{ URL::asset("bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <!-- Bootstrap 3.3.2 JS -->

  <script type="text/javascript" src="{{ URL::asset("/bower_components/moment/min/moment.min.js")}}"></script>
  <script type="text/javascript" src="{{ URL::asset("/bower_components/bootstrap/dist/js/bootstrap.min.js")}}"></script>
  <script type="text/javascript" src="{{ URL::asset("/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js")}}"></script>

  <!-- AdminLTE App -->
  {{-- <script src="{{ URL::asset("/bower_components/AdminLTE/dist/js/app.min.js") }}" ></script> --}}
  <script src="{{ URL::asset("/bower_components/AdminLTE/dist/js/app.min.js") }}" ></script>
  <script src="{{ URL::asset("/static/select2/select2.min.js") }}"></script>

  {{--  Js grid--}}
  <script type="text/javascript" src="{{ URL::asset('/bower_components/AdminLTE/plugins/jsgrid/src/jsgrid.min.js') }}"></script>

  {{-- sweetalert --}}
  <script type="text/javascript" src={{ URL::asset('/static/sweetalert/sweetalert2.all.js') }}></script>
  <script type="text/javascript" src={{ URL::asset('/js/admin/custom.js') }}></script>
  {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
@yield('scripts')

</body>

</html>
