@extends('layouts.admin')

@section('content')

    <h3>All Media Files</h3>


    @if (count($photos))

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($photos as $photo)
                <tr>
                    <th scope="row">{{$photo->id}}</th>
                    <td><img src="{{$photo->file}}" alt="" width="100"></td>
                    <td>{{$photo->created_at ? $photo->created_at : 'no date'}}</td>
                    <td>

                        {!! Form::open(['route' => ['admin.media.destroy',$photo->id], 'method' => 'DELETE']) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    @endif

@stop
