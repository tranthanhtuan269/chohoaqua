@extends('layouts.app')

@section('content')
	<div class="panel panel-green">
        <div class="panel-heading">
          <h3 class="panel-title">Giỏ hàng</h3>
        </div>
        <table class="table table-bordered" id="order-detail">
          <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th></th>
          </tr>
          
        </table>
    </div>

    <script type="text/javascript">
     	$(document).ready(function(){
     		var order = localStorage.getItem("order");
     		var res = order.split(";");
     		var html = "";
     		var totalPrice = 0;
     		for(var i = 0; i < res.length; i++){
				datain = JSON.parse(res[i]);
				html += "<tr class='data-order' data-id='"+ (datain.id) +"' data-name='"+ (datain.name) +"' data-numb='"+ (datain.numb) +"' data-price='"+ (datain.price) +"'>";
                html += "<td>"+ datain.name +"</td>";
                html += "<td>"+ datain.numb +"</td>";
                html += "<td>"+ datain.price +"</td>";
                html += "<td><div class='btn btn-danger btn-action-sp'>Xóa</div></td>";
              	html += "</tr>";
              	totalPrice += datain.numb*datain.price;
     		}
 			html += "<tr>";
            html += "<td colspan='2'>Tổng</td>";
            html += "<td id='total-price'>"+ totalPrice +"</td>";
            html += "<td><div class='btn btn-success btn-submit'>Thanh toán</div></td>";
          	html += "</tr>";
     		$("#order-detail").append(html);

     		$('.btn-action-sp').click(function(){
     			$newPrice = 0;
     			$(this).parent().parent().remove()
     			$('.data-order').each(function( index ) {
  					$newPrice += parseInt($( this ).attr("data-price"));
				});
				$('#total-price').html($newPrice);
     		});

     		$('.btn-submit').click(function(){
                var dataout = new Array();
                $('.data-order').each(function( index ) {
                    var order_obj = {
                        'id' : $(this).attr('data-id'),
                        'name' : $(this).attr('data-name'),
                        'numb' : $(this).attr('data-numb'),
                        'price' : $(this).attr('data-price'),
                    };
                    dataout.push(order_obj);
                });
     			var request = $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
				    url: "<?php echo URL::to('/process'); ?>",
				    method: "POST",
				    data: { order : JSON.stringify(dataout) },
				    dataType: "json"
				});
				 
				request.done(function( msg ) {
				  $( "#log" ).html( msg );
				});
				 
				request.fail(function( jqXHR, textStatus ) {
				  alert( "Request failed: " + textStatus );
				});
     		});
     	});
    </script>
@stop