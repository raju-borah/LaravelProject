@extends('layouts.blog-post')

@section('content')
    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo?$post->photo->file:'https://via.placeholder.com/400'}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>
    <hr>
    @if(Session::has('comment_message'))
        <p class="bg-success">{{session('comment_message')}}</p>
    @endif
    <!-- Blog Comments -->
    @if(Auth::check())
        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>
            {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class="form-group">
                {!! Form::label('body','Body:') !!}
                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Submit',['class'=>'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    @endif
    <hr>

    <!-- Posted Comments -->
    @if(count($comments)>0)
        <!-- Comment -->
        @foreach($comments as $comment)
            <div class="media">
                <a class="pull-left" href="#">
                    <img height="60" class="media-object" src="{{Auth::user()->gravatar}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at->diffForHumans()}}</small>
                    </h4>
                    {{$comment->body}}

                </div>
            @if(count($comment->replies)>0)
                @foreach($comment->replies as $reply)
                    @if($reply->is_active )

                        <!-- Nested Comment -->
                            <div id="nested-comment" class="media ">
                                <a class="pull-left" href="#">
                                    <img height="60" class="media-object" src="{{$reply->photo}}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->created_at->diffForHumans()}}</small>
                                    </h4>
                                    <p>{{$reply->body}}</p>
                                </div>

                                <div class="comment-reply-container">
                                    <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                                    <div class="comment-reply col-sm-6">

                                        {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}
                                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                        <div class="form-group">
                                            {!! Form::label('body','Body:') !!}
                                            {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::submit('Reply',['class'=>'btn btn-primary']) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <!-- End Nested Comment -->
                            </div>
                            @endif

                            @endforeach
                        @endif
            </div>
        @endforeach
    @endif

@stop


@section('scripts')
    <script>
        $(".comment-reply-container .toggle-reply").click(function () {
            $(this).next().slideToggle("slow");
        });
    </script>
@stop


@section('sidebar')
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
                @foreach($categories as $category)
                    <li><a href="#">{{$category->name}}</a>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
@stop