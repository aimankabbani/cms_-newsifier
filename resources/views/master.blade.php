<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>CMS Management Newsifier</title>
    <link rel="stylesheet" href="{{URL::asset('/css/custom.css')}}">
</head>
<body>
<div class="wrapper">
    <!-- Main Header -->
    <ul>
      <li><a href="{{route('login')}}">Login</a></li>
      <li><a href="{{route('signup')}}">sigup</a></li>
    </ul>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
          @yield('content')
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
</div>
@yield('scripts')

</body>

</html>
