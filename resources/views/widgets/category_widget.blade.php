@foreach($categories as $category)
	<li role="presentation"><a href="{{ url('/category/').'/'. $category->id }}">{{$category->name}}</a></li>
@endforeach