@extends('layouts.blog-post')

@section('post-body')
    <!-- Blog Post Content Column -->
    <div class="col-lg-8">

        <!-- Blog Post -->

        <!-- Title -->
        <h1>{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">{{$post->user->name->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="{{$post->photo->file}}" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">
            {{$post->body}}
        </p>

        <hr>

        <!-- Blog Comments -->

        @if(Session::has('comments_messege'))
            <div class="alert alert-success">
                {{Session('comments_messege')}}
            </div>
        @endif

        @if (Auth::user())
            <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    {!! Form::open(['route' => 'admin.comments.store', 'method' => 'post']) !!}

                    <input type="hidden" name="post_id"  value="{{$post->id}}">

                        <div class="form-group">
                            {!! Form::label('body', 'Comments here', ['class' => 'control-label','row'=>3]) !!}
                            {!! Form::textarea('body', '', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Comment', ['class' => 'btn btn-primary']) !!}
                        </div>
                      {!! Form::close() !!}
                </div>

                <hr>

        @endif

        @include('includes.form-error')

        <!-- Posted Comments -->

        @if (count($comments) >0)

            @foreach($comments as $comment)

            <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="{{$comment->photo->file}}" alt="" width="64" height="64">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$post->created_at->diffForHumans()}}</small>
                        </h4>
                        {{$comment->body}}
                    </div>
                </div>


            @endforeach
        @endif


    </div>
    @stop
