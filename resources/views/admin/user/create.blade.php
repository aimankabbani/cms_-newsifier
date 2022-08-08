@extends('adminmaster')

@section('title')
    Edit-Create User
@endsection


@section('breadcrumb')
    <li class="active">Edit-Create User</li>
@endsection


@section('content')

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit-Create User</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                {!! Form::open( array('route' => array('admin.user.create'))) !!}
                <div class="row">
                  <div class="col-md-12">
                    @if ($errors->any())
                      {!! implode('', $errors->all('<div style=color:red><b>:message</b></div>')) !!}
                    @endif
                  </div>
                </div>
                <div class="box-body">
                      {!! Form::input('id','id', $user->id ? $user->id :0 , ['class' => 'form-control','class'=>'hidden']) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', $user->name , ['class' => 'form-control','placeholder'=>'Name','maxlength'=>20]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'Email Address') !!}
                        {!! Form::email('email', $user->email , ['class' => 'form-control','placeholder'=>'Email']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('user_group_id', 'Group') !!}
                        {!! Form::select('user_group_id', $groups ,$user->user_group_id,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password', 'Password') !!}
                        {!! Form::input('password','password', $user->password , ['class' => 'form-control','placeholder'=>'Password']) !!}
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <div class="box-footer">
                      <button id="save" type="submit" class="btn btn-primary final-save">Save</button>
                  </div>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.box -->

        </div>
    </div>

@endsection

@section('scripts')

@endsection
