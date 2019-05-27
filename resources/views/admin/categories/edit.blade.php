@extends('layouts.admin')



@section('content')


    <div class="col-sm-6">
        <h1>Edit Categories</h1>

        {!! Form::model($category,['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category->id]]) !!}

        <div class="form-group">
            {!! Form::label('name','Category Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Update Category',['class'=>'btn btn-success']) !!}
        </div>

        {{csrf_field()}}

        {!! Form::close() !!}

        {!! Form::close() !!}

        {!! Form::model($category,['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id],'files'=>true]) !!}

        <div class="form-group">
            {!! Form::submit('DELETE Category ',['class'=>'btn btn-danger ']) !!}
        </div>

        {{csrf_field()}}

        {!! Form::close() !!}


    </div>

@endsection
