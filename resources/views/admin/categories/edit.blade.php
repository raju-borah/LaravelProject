@extends('layouts.admin')
<h1>Edit Category</h1>
@section('content')

    @extends('layouts.admin')
@section('content')
    <h1>Categories</h1>
    <div class="col-sm-4">
        {!! Form::model($category,['method'=>'PATCH','action'=>['AdminCategoriesController@Update',$category->id]]) !!}
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Edit Category',['class'=>'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-sm-8">
        {!! Form::open(['method'=>'DELETE','action'=>'AdminCategoriesController@destory']) !!}
            <div class="form-group">
                {!! Form::submit('Delete Category',['class'=>'btn btn-warning']) !!}
            </div>
        {!! Form::close() !!}

    </div>
@stop

