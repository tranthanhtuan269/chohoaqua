@extends('layouts.app')

@section('content')

<div class="panel panel-primary main-content">
  	<div class="panel-heading">{{ $categories->name }}</div>
  	<div class="panel-body">            
            <div class="row">
            	@foreach($products as $product)
        		<?php $product_images = explode(";",$product->images); ?>
                <div class="col-lg-4 sp-container">
                  <div class="img-prd"><img class="banner-image" src="<?php echo URL::to('/') . '/images/' . $product_images[0]; ?>"></div>
                  <div class="title-prd">{{$product->name}}</div>
                  <div class="price-prd">{{$product->price}}<span class="price-i">VNĐ/kg</span></div>
                  <div class="btn btn-primary pull-right"><a class="order-btn" href="<?php echo URL::to('/product/') . '/' . $product->id; ?>">Đặt hàng</a></div>
                </div>
                @endforeach
            </div>
  	</div>
</div>

<p>{{ link_to_route('category.index', 'Danh sách danh mục') }} | {{ link_to_route('category.create', 'Tạo danh mục') }}</p>

@stop