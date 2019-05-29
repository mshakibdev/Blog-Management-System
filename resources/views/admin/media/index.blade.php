@extends('layouts.admin')


@section('content')
    <h1>All Media</h1>

    <table class="table">

        <thead>
        <tr>

            <th scope="col">Image</th>
            <th scope="col">Path</th>
            <th scope="col">Created</th>
            <th scope="col"></th>
            <th scope="col">Action</th>
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
                    <td>
                        {!! Form::model($photo,['method'=>'DELETE','action'=>['MediaController@destroy',$photo->id],'files'=>true]) !!}

                        <div class="form-group">
                            {!! Form::submit('DELETE ',['class'=>'btn btn-danger ']) !!}
                        </div>

                        {{csrf_field()}}

                        {!! Form::close() !!}
                    </td>
                </tr>
                </tbody>
            @endforeach

        @endif
    </table>
@stop