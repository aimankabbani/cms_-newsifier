<!DOCTYPE html>
<html>
 <head>
  <title>Signup</title>
  <script src="{{ URL::asset("bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
  <link href="{{ URL::asset("/bower_components/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="{{ URL::asset("/bower_components/bootstrap/dist/js/bootstrap.min.js")}}"></script>
 </head>
 <body>
   <div class="container">
     <div class="row">
          @include('modules.error')
         <!-- left column -->
         <div class="col-md-12">
             <!-- general form elements -->
             <div class="box box-primary">
                 <!-- /.box-header -->
                 <!-- form start -->

                 {!! Form::open( array('route' => array('signup'))) !!}
                  {!! csrf_field() !!}
                  <div class="email">
                    <label for="email">Email</label>
                    <input id="email" type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email">
                  </div>
                  <div class="password">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                  </div>
                  <div class="confirm-passowrd">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                  </div>
                  <div class="form-group">
                      <div class="row">
                        <div class="col-md-6 float-left">
                            <button class="btn btn-default button-main submit w-100 mb-1" type="submit">
                                Singup
                            </button>
                        </div>
                      </div>
                  </div>
                  {!!Form::close()!!}
             </div>
             <!-- /.box -->
         </div>
   </div>

 </body>
</html>
