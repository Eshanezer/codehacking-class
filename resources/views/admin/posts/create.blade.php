@extends('layouts.admin')


@section('content')
    <h1>Create Post</h1>

    {!! Form::open(['route' => 'admin.posts.store', 'method' => 'post','files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('title', 'Select Category', ['class' => 'control-label']) !!}
        {!! Form::select('category_id',$categories,null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('file', 'Image', ['class' => 'control-label']) !!}
        {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Description', ['class' => 'control-label']) !!}
        {!! Form::textArea('body', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    @include('includes.form-error')

@stop