

@if(Session::has('comment_message'))

    <div class="alert bg-success ">{{session('comment_message')}}</div>
@endif