@extends('layouts.admin')
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css" rel="stylesheet" />

@stop

@section('content')
    <h1 class="text-center">Upload  Media</h1>
    <hr>
    {!! Form::open(['method'=>'POST','action'=>'MediaController@store' ,'class'=>'dropzone', 'id'=>'my-awesome-dropzone']) !!}



    {!! Form::close() !!}
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
@stop