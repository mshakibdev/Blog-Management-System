@extends('layouts.admin')




@section('content')
    @if(Session::has('deleted_user'))
        <p class="bg-danger">{{Session('deleted_user')}}</p>

        @endif
    <h1>User</h1>
    <table class="table">
      <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Role</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
      </thead>

        @if($users)
            @foreach($users as $user)

              <tbody>
                <tr>
                    <td>{{$user->id}}</td>
                    <td><img height="60px" src="{{$user->photo ? asset($user->photo->file) : 'http://placehold.it/400x400'}}" alt=""></td>
                    <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->is_active==1?'Active':'Not active'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>

                </tr>
              </tbody>
            @endforeach

        @endif
    </table>



@stop