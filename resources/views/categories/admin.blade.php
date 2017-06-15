@extends('layouts.app')

@section('content')

<div class="panel panel-default main-content">
    <div class="panel-heading">
        <h3 class="panel-title">Danh sách danh mục</h3>
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
        @if ($categories->count())
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="10%">Id</th>
                        <th width="66%">Tên</th>
                        <th width="8%">Xem</th>
                        <th width="8%">Sửa</th>
                        <th width="8%">Xóa</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{ $category->id }}
                            </td>
                            <td>
                                {{ $category->name }}
                            </td>
                            <td>
                                <a class="btn btn-primary btn-xed" href="{{URL::to('/')}}/category/{{ $category->id }}">Xem</a>
                            </td>
                            <td>
                                {{ link_to_route('category.edit', 'Sửa', array($category->id), array('class' => 'btn btn-info btn-xed')) }}
                            </td>
                            <td>
                                {{ Form::open(array('method' => 'DELETE', 'route' => array('category.destroy', $category->id), 'class'=>'delete_btn'))}}                       
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
                {{ $categories->links() }}
            </div>
        @else
            Chưa có danh mục sản phẩm nào!
        @endif
        </div>
        <div class="btn pull-right">{{ link_to_route('category.create', 'Thêm danh mục') }}</div>
    </div>
</div>
@stop