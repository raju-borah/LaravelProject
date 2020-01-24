@extends("layouts.admin")
@section('content')
    <h1>View Posts</h1>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>User</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="60" width="100" src="{{$post->photo?$post->photo->file:'https://via.placeholder.com/300'}}" alt=""></td>
                    <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->user->name}}</a></td>
                    <td>{{$post->category?$post->category->name:'UnCategoroized'}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{str_limit($post->body,15)}}</td>
                    <td>{{$post->created_at ->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('admin.comments.show',$post->id)}}">View Comments</a></td>
                    <td><a href="{{route('home.post',$post->id)}}">View Post</a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

    <div class="col-sm-6 col-sm-offset-5">
        {{$posts->render()}}
    </div>
@stop