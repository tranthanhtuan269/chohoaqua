@extends('layouts.app')

@section('content')
@foreach($categories as $category)
<div class="panel panel-green">
    <div class="panel-heading">
      <h3 class="panel-title">{{$category->name}} <div class="pull-right">Xem tất cả >>> </div></h3>
    </div>
    <div class="panel-body">
      <div class="row">
        @foreach($category->products as $product)
        <?php 
            $product_images = explode(";",$product->images);
          ?>
        <div class="col-lg-4 sp-container">
          <div class="img-prd"><img class="banner-image" src="<?php echo URL::to('/') . '/images/' . $product_images[0]; ?>"></div>
          <div class="title-prd">{{$product->name}}</div>
          <div class="price-prd">{{$product->price}} <span class="price-i">VNĐ/kg</span></div>
          <div class="btn btn-primary pull-right"><a class="order-btn" href="<?php echo URL::to('/product/') . '/' . $product->id; ?>">Đặt hàng</a></div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endforeach
  <div class="panel panel-green">
    <div class="panel-heading">
      <h3 class="panel-title">Tin tức - sự kiện <div class="pull-right">Xem tất cả >>> </div></h3>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-lg-12 tin-container">
          <div class="img-tin"><img class="banner-image" src="images/sp/ca-kho-1.jpg"></div>
          <div class="title-tin">Hướng dẫn làm món cá kho tộ đậm đà</div>
          <div class="desc-tin">Tiết trời Tết lành lạnh, được ăn cơm nóng với món cá kho thì không gì tuyệt bằng. Nhưng làm sao để có món cá kho ngon đậm đà thì không phải bà nội trợ nào cũng biết...</div>
        </div>

        <div class="col-lg-12 tin-container">
          <div class="img-tin"><img class="banner-image" src="images/sp/ca-kho-1.jpg"></div>
          <div class="title-tin">Hướng dẫn làm món cá kho tộ đậm đà</div>
          <div class="desc-tin">Tiết trời Tết lành lạnh, được ăn cơm nóng với món cá kho thì không gì tuyệt bằng. Nhưng làm sao để có món cá kho ngon đậm đà thì không phải bà nội trợ nào cũng biết...</div>
        </div>

        <div class="col-lg-12 tin-container">
          <div class="img-tin"><img class="banner-image" src="images/sp/ca-kho-1.jpg"></div>
          <div class="title-tin">Hướng dẫn làm món cá kho tộ đậm đà</div>
          <div class="desc-tin">Tiết trời Tết lành lạnh, được ăn cơm nóng với món cá kho thì không gì tuyệt bằng. Nhưng làm sao để có món cá kho ngon đậm đà thì không phải bà nội trợ nào cũng biết...</div>
        </div>
      </div>
    </div>
  </div>
@endsection
