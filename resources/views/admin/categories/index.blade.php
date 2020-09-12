@extends('layouts.admin')

@section('content')
    <div class="col-sm-3">
        <h3>Create category</h3>

        {!! Form::open(['route' => 'admin.categories.store', 'method' => 'post']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Category Name', ['class' => 'control-label']) !!}
                {!! Form::text('name',null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}
            </div>
          {!! Form::close() !!}
    </div>
    <div class="col-sm-9">
        <h3>All Categories</h3>

        @if (count($categories))
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Created at</th>
                  <th scope="col">Updated at</th>
                </tr>
              </thead>
              <tbody>

              @foreach($categories as $category)
                  <tr>
                      <th scope="row">{{$category->id}}</th>
                      <td><a href="{{route('admin.categories.edit',$category->id)}}">{{$category->name}}</a></td>
                      <td>{{$category->created_at->diffForHumans()}}</td>
                      <td>{{$category->updated_at->diffForHumans()}}</td>
                  </tr>
              @endforeach

              </tbody>
            </table>

        @endif
    </div>

    <div class="col-sm-12">
        @include('includes.form-error')
    </div>
@endsection
