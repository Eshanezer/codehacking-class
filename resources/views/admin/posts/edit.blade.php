@extends('layouts.admin')


@section('content')

    <div class="col-sm-3">
        <img src="{{$post->photo ? $post->photo->file : "Not Found"}}" alt="" width="100" height="100">
    </div>
    <div class="col-sm-6">
        <h1>Edit Post</h1>

        {!! Form::model($post,['route' => ['admin.posts.update',$post->id], 'method' => 'PATCH','files'=>true]) !!}

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
            {!! Form::submit('Edit Post', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

        @include('includes.form-error')

    </div>
    <div class="col-sm-3">

       {!! Form::open(['route' => ['admin.posts.destroy',$post->id], 'method' => 'DELETE']) !!}
           <div class="form-group">
               {!! Form::submit('Delete Post', ['class' => 'btn btn-danger']) !!}
           </div>
         {!! Form::close() !!}

    </div>




@stop