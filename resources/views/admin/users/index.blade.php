@extends('layouts.admin')

@section('content')
   <h1>Users</h1>

   @if ($users)
       <table class="table">
           <thead>
           <tr>
               <th scope="col">Id</th>
               <th scope="col">Photo</th>
               <th scope="col">Name</th>
               <th scope="col">Email</th>
               <th scope="col">Role</th>
               <th scope="col">Active</th>
               <th scope="col">Created</th>
               <th scope="col">Updated</th>
           </tr>
           </thead>
           <tbody>

           @foreach($users as $user)
               <tr>
                   <th scope="row">{{$user->id}}</th>
                   <td>
                       <img src="{{$user->photo ? $user->photo->file :'https://i2.wp.com/sclondon.ca/wp-content/uploads/2019/10/female-placeholder.jpg?ssl=1'}}" alt="" width="100" height="100">
                   </td>
                   <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>
                   <td>{{$user->email}}</td>
                   <td>{{$user->role->name}}</td>
                   <td>{{$user->is_active==1?'Active':'Deactive'}}</td>
                   <td>{{$user->created_at->diffForHumans()}}</td>
                   <td>{{$user->updated_at->diffForHumans()}}</td>
               </tr>
           @endforeach
           </tbody>
       </table>
   @endif
@endsection
