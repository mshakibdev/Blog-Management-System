@extends('layouts.admin')

@section('content')

    <h1>Edit User</h1>

    <div class="col-sm-3">
        <img src="{{$user->photo ?asset($user->photo->file) : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
    
    </div>

    <div class="col-sm-9">
        {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('role_id','Role:') !!}
            {!! Form::select('role_id',[''=>'Choose Option']+$roles,null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email','Email:') !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('is_active','Status:') !!}
            {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id','Image:') !!}
            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password','Password:') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit(' Save Update',['class'=>'btn btn-success ']) !!}
        </div>
        {!! Form::close() !!}



        {!! Form::model($user,['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id],'files'=>true]) !!}

            <div class="form-group">
                 {!! Form::submit('DELETE USER',['class'=>'btn btn-danger ']) !!}
            </div>

                {{csrf_field()}}

        {!! Form::close() !!}

    </div>







    @include('includes.form_error')



@stop
