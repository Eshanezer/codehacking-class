@extends('layouts.admin')
@section('content')
    <div class="col-sm-6">
        {!! Form::model($category,['route' => ['admin.categories.update',$category->id], 'method' => 'PATCH']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Category Name', ['class' => 'control-label']) !!}
            {!! Form::text('name',null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Edit Category', ['class' => 'btn btn-primary']) !!}
        </div>
          {!! Form::close() !!}
    </div>


    <div class="col-sm-6">
        {!! Form::open(['route' => ['admin.categories.destroy',$category->id], 'method' => 'DELETE']) !!}

            <div class="form-group">
                {!! Form::submit('Delete Category', ['class' => 'btn btn-danger']) !!}
            </div>
          {!! Form::close() !!}
    </div>
@stop