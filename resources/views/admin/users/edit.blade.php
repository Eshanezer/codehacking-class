@extends('layouts.admin')

@section('content')
   <div class="row">
       <div class="col-sm-3">
           <img class="img-responsive img-circle" src="{{$user->photo ? $user->photo->file : 'https://i2.wp.com/sclondon.ca/wp-content/uploads/2019/10/female-placeholder.jpg?ssl=1'}}" alt="">
       </div>
       <div class="col-sm-6">
           <h1>Edit User</h1>

           {!! Form::model($user,['route' => ['admin.users.update',$user->id], 'method' => 'PATCH','files'=>true]) !!}

           <div class="form-group">
               {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
               {!! Form::text('name',null, ['class' => 'form-control']) !!}
           </div>
           <div class="form-group">
               {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
               {!! Form::text('email', null, ['class' => 'form-control']) !!}
           </div>
           <div class="form-group">
               {!! Form::label('role_id', 'Role', ['class' => 'control-label']) !!}
               {!! Form::select('role_id',[''=>'Choose Options']+$roles,null, ['class' => 'form-control']) !!}
           </div>
           <div class="form-group">
               {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
               {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'), 1, ['class' => 'form-control']) !!}
           </div>

           <div class="form-group">
               {!! Form::label('photo', 'Photo', ['class' => 'control-label']) !!}
               {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
           </div>
           <div class="form-group">
               {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
               {!! Form::password('password', ['class' => 'form-control']) !!}
           </div>

           <div class="form-group">
               {!! Form::submit('Edit User', ['class' => 'btn btn-primary']) !!}
           </div>
           {!! Form::close() !!}


           @include('includes.form-error')
       </div>
       <div class="col-sm-3">
            {!! Form::open(['route' => ['admin.users.destroy',$user->id], 'method' => 'DELETE']) !!}

                <div class="form-group">
                    {!! Form::submit('Remove User', ['class' => 'btn btn-danger']) !!}
                </div>

              {!! Form::close() !!}
       </div>
   </div>
@stop