@extends('layouts.app')

@section('content')

<div class="panel panel-default main-content">
    <div class="panel-heading">
        <h3 class="panel-title">Danh sách nông sản</h3>
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
        @if ($products->count())
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="10%">Id</th>
                        <th width="36%">Tên</th>
                        <th width="30%">Danh mục</th>
                        <th width="8%">Xem</th>
                        <th width="8%">Sửa</th>
                        <th width="8%">Xóa</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                {{ $product->id }}
                            </td>
                            <td>
                                {{ $product->name }}
                            </td>
                            <td>{{ $product->categoryName }}</td>
                            <td>
                                <a class="btn btn-primary btn-xed" href="{{URL::to('/')}}/product/{{ $product->id }}">Xem</a>
                            </td>
                            <td>
                                {{ link_to_route('product.edit', 'Sửa', array($product->id), array('class' => 'btn btn-info btn-xed')) }}
                            </td>
                            <td>
                                {{ Form::open(array('method' => 'DELETE', 'route' => array('product.destroy', $product->id), 'class'=>'delete_btn'))}}                       
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
                {{ $products->links() }}
            </div>
        @else
            Chưa có nông sản nào!
        @endif
        </div>
        <div class="btn pull-right">{{ link_to_route('product.create', 'Thêm nông sản') }}</div>
    </div>
</div>
@stop