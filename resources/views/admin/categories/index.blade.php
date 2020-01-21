@extends('layouts.admin')
@section('content')
    <h1>Categories</h1>
    <div class="col-sm-4">
    {!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store']) !!}
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Category',['class'=>'btn btn-success']) !!}
        </div>
    {!! Form::close() !!}
    </div>
    <div class="col-sm-8">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td><a href="{{route('admin.categories.edit')}}">{{$category->name}}</a></td>
                    <td>{{$category->created_at?$category->created_at->diffForHumans():"No Date"}}</td>
                    <td>{{$category->updated_at?$category->created_at->diffForHumans():"No Date"}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

    @stop