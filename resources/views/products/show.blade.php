@extends('layouts.app')

@section('content')

<div class="panel panel-green">
    <div class="panel-heading">
      <h3 class="panel-title">Thông tin sản phẩm</h3>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-lg-4 sp-img">
        	<?php 
        		$product_images = explode(";",$product->images);
        	?>
          	<img class="banner-image" src="<?php echo URL::to('/') . '/images/' . $product_images[0]; ?>">
        </div>
        <div class="col-lg-8 sp-info">
          <input type="hidden" id="product_id" value="{{$product->id}}">
          <h1 class="sp-name">{{$product->name}}</h1>
          <div class="sp-row">
            <span class="sp-lbl">Giá: </span>
            <span class="sp-val">{{ $product->price }} </span><span class="price-i">VNĐ/kg</span>
          </div>
          <div class="sp-row">
            <div class="sp-desc">
              	<?php echo $product->description; ?>
            </div>
          </div>
          <div class="sp-row">
            <span class="sp-lbl">
              <input type="text" value="0" style="text-align: right;" id="numb-sp"> Kg
            </span>
          </div>
          <button id="add-order" class="btn btn-primary">Đặt hàng</button>
      </div>
    </div>
</div>

<p>{{ link_to_route('product.index', 'Danh sách nông sản') }} | {{ link_to_route('product.create', 'Thêm nông sản') }}</p>

<script type="text/javascript">
$(document).ready(function(){
  $("#add-order").click(function(){
    
    if (typeof(Storage) !== "undefined") {
      var order = localStorage.getItem("order");
      console.log(JSON.parse('[' + order + ']'));
      var product = {
                      id: $('#product_id').val(), 
                      name:$('.sp-name').text(), 
                      price:$('.sp-val').text(), 
                      numb:$('#numb-sp').val()
                    };
      if(order == null){
        localStorage.setItem("order", JSON.stringify(product));
      }else{
        var $array_data = JSON.parse('[' + order + ']');
        var $flag = false;
        for(var i = 0; i < $array_data.length; i++){
          if($array_data[i].id == product.id){
            $array_data[i].numb += product.numb;
            $flag == true;
          }
        }
        if($flag){
          localStorage.setItem("order", JSON.stringify(order));
        }else{
          localStorage.setItem("order", order + ',' + JSON.stringify(order));
        }
        
      }
      // window.location.replace("<?php echo URL::to('/order/'); ?>");
    } else {
      // Sorry! No Web Storage support..
      alert('Trình duyệt của bạn không hộ trợ mua hàng trực tuyến.<br /> Xin hãy liên hệ qua số điện thoại ghi bên trái màn hình để được hỗ trợ! <br /> Xin cảm ơn!');
    }
  });
});
</script>

@stop