@extends('layouts.app')

@section('content')

<div class="panel panel-primary main-content">
  	<div class="panel-heading">{{ $news->title }}</div>
  	<div class="panel-body">            
            <div class="row">
                <div class="col-xs-12 col-md-12 show-detail"><?php echo $news->description; ?></div>
            </div>
  	</div>
</div>

<p>{{ link_to_route('news.index', 'Danh sách tin') }} | {{ link_to_route('news.create', 'Viết bài mới') }}</p>

@stop