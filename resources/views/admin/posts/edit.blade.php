@extends('layouts.admin')


@section('content')
    <h1>Edit Post</h1>
    <div class="col-sm-3">
        <img src="{{$post->photo ?$post->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">

    </div>
    <div class="col-sm-9">

            {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('title','Title:') !!}
                {!! Form::text('title',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id','Category:') !!}
                {!! Form::select('category_id',[''=>'Choose post category']+$category,null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id','Add a Image:') !!}
                {!! Form::file('photo_id',['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('body','Description:') !!}
                {!! Form::textarea('body',null,['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
            </div>

            {{csrf_field()}}

            {!! Form::close() !!}

                {!! Form::model($post,['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id],'files'=>true]) !!}

                <div class="form-group">
                    {!! Form::submit('DELETE ',['class'=>'btn btn-danger ']) !!}
                </div>

            {{csrf_field()}}

            {!! Form::close() !!}
    </div>
    @include('includes.form_error')

@stop