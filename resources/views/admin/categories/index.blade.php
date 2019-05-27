@extends('layouts.admin')



@section('content')



    <div class="col-sm-6">
        <h1>Add Categories</h1>

        {!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store']) !!}

             <div class="form-group">
                {!! Form::label('name','Category Name:') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
             </div>


            <div class="form-group">
                 {!! Form::submit('Create Category',['class'=>'btn btn-primary']) !!}
            </div>

                {{csrf_field()}}

        {!! Form::close() !!}
    </div>


    <div class="col-sm-6">


        @if($categories)


                <table class="table">
                    <h1>All Categories</h1>
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Created</th>
                        <th scope="col">Updated</th>
                    </tr>
                    </thead>

                    @foreach($categories as $category)
                        <tbody>
                        <tr>
                            <td>{{$category->id}}</td>
                            <td><a href="{{route('admin.categories.edit',$category->id)}}">{{$category->name}}</a></td>
                            <td>{{$category->created_at?$category->created_at->diffForHumans():'Date is not enclosed'}}</td>
                            <td>{{$category->updated_at?$category->updated_at->diffForHumans():'Date is not enclosed'}}</td>
                        </tr>
                        @endforeach

                        </tbody>
                </table>

                @endif


    </div>
    @stop