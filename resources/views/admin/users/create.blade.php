@extends('layouts.admin')
@section('content')
    <h1>Create User</h1>

    {!! Form::open(['route' => 'admin.users.store', 'method' => 'post']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
            {!! Form::text('name', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
            {!! Form::text('email', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('role', 'Role', ['class' => 'control-label']) !!}
            {!! Form::text('role', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
            {!! Form::text('status', '', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}
        </div>
      {!! Form::close() !!}

@endsection
