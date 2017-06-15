@extends('layouts.app')

@section('content')

<div class="panel panel-default main-content">
    <div class="panel-heading">
        <h3 class="panel-title">Danh sách tin</h3>
    </div>
    <div class="panel-body">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif

        <div class="table-responsive">
        @if ($news->count())
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="10%">Ảnh</th>
                        <th width="66%">Tiêu đề</th>
                        <th width="8%">Xem</th>
                        <th width="8%">Sửa</th>
                        <th width="8%">Xóa</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($news as $new)
                        <tr>
                            <td>
                            <img src="{{ URL::to('/') }}/images/{{ $new->image }}" alt="" width="200px" /></td>
                            <td>
                                <div class="big-field"><h4>{{ $new->title }}</h4></div>

                                <div>
                            </td>
                            <td>
                                <a class="btn btn-primary btn-xed" href="{{URL::to('/')}}/news/{{ $new->id }}">Xem</a>
                            </td>
                            <td>
                                {{ link_to_route('news.edit', 'Sửa', array($new->id), array('class' => 'btn btn-info btn-xed')) }}
                            </td>
                            <td>
                                {{ Form::open(array('method' => 'DELETE', 'route' => array('news.destroy', $new->id), 'class'=>'delete_btn'))}}                       
                                {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-xed')) }}
                                {{ Form::close() }}
                            </td>
                            </div>
                            <div class="clear-fix"></div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>

            <div class="text-center">
                {{ $news->links() }}
            </div>
        @else
            Chưa có tin nào!
        @endif
        </div>
        <div class="btn pull-right">{{ link_to_route('news.create', 'Viết bài mới') }}</div>
    </div>
</div>
@stop