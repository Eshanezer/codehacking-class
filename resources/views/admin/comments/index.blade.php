@extends('layouts.admin')

@section('content')

    <h1>Comments</h1>

    @if(count($comments) > 0)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Author</th>
                <th scope="col">Email</th>
                <th scope="col">Post</th>
                <th scope="col">Comments</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                <th scope="col">View</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <th scope="row">{{$comment->id}}</th>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->post->id .'- '.$comment->post->title}}</td>
                    <td>{{$comment->body}}</td>
                    <td>
                        @if ($comment->is_active==1)

                            {!! Form::open(['route' => ['admin.comments.update',$comment->id], 'method' => 'PATCH']) !!}

                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Un Approve', ['class' => 'btn btn-warning']) !!}
                            </div>
                            {!! Form::close() !!}

                        @else
                            {!! Form::open(['route' => ['admin.comments.update',$comment->id], 'method' => 'PATCH']) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve', ['class' => 'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>

                    <td>
                        {!! Form::open(['route' => ['admin.comments.destroy',$comment->id], 'method' => 'DELETE']) !!}
                        <input type="hidden" name="is_active" value="1">
                        <div class="form-group">
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>

                    <td>
                        <a href="{{route('home.post',$comment->post->id)}}">View Post</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

@stop