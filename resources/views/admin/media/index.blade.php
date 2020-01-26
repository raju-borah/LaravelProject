@extends('layouts.admin')

@section('content')
    <h1>Media</h1>
    @if($photos)
        <form action="/delete/media" method="post" class="form-inline">
            {{csrf_field()}}
            {{method_field('delete')}}
            <div class="form-group">
                <select name="checkBoxArray" id="" class="form-control">
                    <option value=""  >Delete</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Apply" name="delete_all" class="btn btn-primary">
            </div>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th><input type="checkbox" name="" id="options"></th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>
                @foreach($photos as $photo)
                    <tr>
                        <th><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="{{$photo->id}}"></th>
                        <td>{{$photo->id}}</td>
                        <td><img width="100" height="60" src="{{$photo->file}}" alt=""></td>
                        <td>{{$photo->created_at?$photo->created_at->diffForHumans():'No Date'}}</td>
{{--                        <td>  <input type="hidden" name="photo_id" value="{{$photo->id}}">--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="submit" value="Delete" name="delete_single" class="btn btn-danger">--}}
{{--                            </div>--}}
{{--                        </td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </form>
    @endif

@stop
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#options').click(function () {
                if (this.checked){
                    $('.checkBoxes').each(function () {
                        this.checked=true;
                    })
                }else {
                    $('.checkBoxes').each(function () {
                        this.checked=false;
                    })
                }
            })
        });
    </script>
@stop