@extends('layouts.admin')


@section('content')
    <h1>All Media</h1>

    <table class="table">

        <thead>
        <tr>

            <th scope="col">Image</th>
            <th scope="col">Path</th>
            <th scope="col">Created</th>
        </tr>
        </thead>
        @if($photos)
            @foreach($photos as $photo)
                <tbody>
                <tr>
                    {{--id--}}

                    <td><img height="60" width="60" src="{{asset($photo->file)}}" alt=""></td>
                    <td>{{ $photo->file}}</td>
                    <td>{{ $photo->created_at ? $photo->created_at->diffForHumans() : 'No date' }}</td>
                    <td>{{ $photo->email}}</td>
                </tr>
                </tbody>
            @endforeach

        @endif
    </table>
@stop