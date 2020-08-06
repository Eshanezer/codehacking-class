@extends('layouts.admin')
@section('content')
    <h1>Create User</h1>

    {!! Form::open(['route' => 'admin.users.store', 'method' => 'post','files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
            {!! Form::text('name', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
            {!! Form::text('email', '', ['class' => 'form-control']) !!}
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
            {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}
        </div>
      {!! Form::close() !!}


    @include('includes.form-error')

@endsection
