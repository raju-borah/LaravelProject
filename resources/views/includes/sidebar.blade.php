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