@extends('layouts.app')

@section('content')

<div class="panel panel-default main-content">
    <div class="panel-heading">
        <h3 class="panel-title">Tin tức</h3>
    </div>
    <div class="panel-body">
        <div class="row">
        <?php $i = 0; ?>
        @foreach($news as $new)
            <?php $i++; ?>
            <div class="col-md-4">
                <div class="image-news">
                    <a href="{{URL::to('/')}}/news/{{ $new->id }}"><img class="img-thumbnail" src="{{ URL::to('/') }}/images/{{ $new->image }}"/></a>
                </div>
                <div class="title-news"><a href="{{URL::to('/')}}/news/{{ $new->id }}">{{ $new->title }}</a></div>
            </div>
            @if($i%3 == 0)
            <div class="clearfix"></div>
            @endif

        @endforeach
        </div>
        <div class="text-center">
            {{ $news->links() }}
        </div>
        </div>
    </div>
</div>
@stop