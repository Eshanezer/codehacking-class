@extends('layouts.admin')

@section('content')
    <h2>All Admin Posts</h2>

    @if (count($posts))
      <table class="table">
        <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Photo</th>
          <th scope="col">Title</th>
          <th scope="col">Body</th>
          <th scope="col">Owner</th>
          <th scope="col">Category name</th>
          <th scope="col">Created at</th>
          <th scope="col">Updated at</th>
        </tr>
        </thead>
        <tbody>

        @foreach($posts as $post)
          <tr>
            <th scope="row">{{$post->id}}</th>
            <td><img src="{{$post->photo ? $post->photo->file : "Not Found"}}" alt="" width="120"></td>
            <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a></td>
            <td>{{$post->body}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->category ? $post->category->name : " Uncatogorized"}}</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
            <td><a href="{{route('home.post',$post->id)}}">View Post</a></td>
          </tr>
        @endforeach
        
        </tbody>
      </table>
    @else
      <h4 class="text-center text-danger">No Post Found</h4>
    @endif

@endsection