@extends('layouts.admin')


@section('content')
    <h1>Create Post</h1>

    {!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>true]) !!}

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
             {!! Form::submit('Create a post',['class'=>'btn btn-primary']) !!}
        </div>

            {{csrf_field()}}

    {!! Form::close() !!}
    @include('includes.form_error')

@stop