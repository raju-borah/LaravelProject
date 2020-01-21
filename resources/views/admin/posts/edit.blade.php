@extends("layouts.admin")
@section('content')
    <h1>Edit Posts</h1>
    <div class="col-sm-3">
        <img class="img-responsive" src="{{$post->photo?$post->photo->file:'https://via.placeholder.com/300'}}" alt="">
    </div>
    <div class="col-sm-6">

        {!! Form::model($post,(['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true]) )!!}
        <div class="form-group">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id','Category:') !!}
            {!! Form::select('category_id',[''=>'Option']+$categories,null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id','Photo :') !!}
            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('body','Body :') !!}
            {!! Form::textarea('body',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Edit Post',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete Post',['class'=>'btn btn-danger ']) !!}
            </div>
        {!! Form::close() !!}

        @include('includes.form_error')
    </div>
@stop