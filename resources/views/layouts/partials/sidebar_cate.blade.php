<li class="panel panel-default custom-dropdown">
    <a href="{!! url("forum") !!}"><b>Forums </b></a>
    <div id="class_layer" class="panel-collapse collapse in">
        <div class="panel-body">
            <ul class="nav navbar-nav">
                @foreach(\App\Models\OtherLayer\Category::all() as $category)
                    <li>
                        <a href="{!! url("forum/{$category->id}-".str_slug($category->title)) !!}">{!! $category->title !!}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</li>