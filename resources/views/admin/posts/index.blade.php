@extends('layouts.admin')


@section('content')
    <h1>All Posts</h1>

    <table class="table">

      <thead>
        <tr>
              <th scope="col">ID</th>
              <th scope="col">PHOTO</th>
              <th scope="col">USER</th>
              <th scope="col">CATEGORY</th>
              <th scope="col">TITLE</th>
              <th scope="col">BODY</th>
              <th scope="col">Created</th>
              <th scope="col">Updated</th>
        </tr>
      </thead>
        @if($posts)
            @foreach($posts as $post)
                  <tbody>
                    <tr>
                        {{--id--}}
                        <td>{{$post->id}}</td>
                        <td><img height="60" src="{{$post->photo ?asset($post->photo->file ): 'http://placehold.it/400x400'}}" alt=""></td>
                        <td>{{ $post->user->name}}</td>
                        <td>{{ $post->category?$post->category->name : 'Uncategoraized'}}</td>
                        <td><a href="{{route('admin.posts.edit',$post->id)}}">{{ $post->title }}</a></td>
                        <td>{{str_limit( $post->body,7) }}</td>
                        <td>{{ $post->created_at->diffForHumans() }}</td>
                        <td>{{ $post->updated_at->diffForHumans() }}</td>
                    </tr>
                  </tbody>
            @endforeach

        @endif
    </table>
    @stop