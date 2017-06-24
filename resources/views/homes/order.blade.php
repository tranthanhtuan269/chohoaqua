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
            <th>Đơn giá</th>
            <th>Thành tiền</th>
            <th></th>
          </tr>
        </table>
    </div>

    <!-- Modal -->
    <div id="custom-info" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thông tin khách hàng</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="custom-name">Họ tên khách hàng</label>
                        <input type="text" class="form-control" id="custom-name" placeholder="Full name">
                    </div>
                    <div class="form-group">
                        <label for="custom-email">Thư điện tử</label>
                        <input type="email" class="form-control" id="custom-email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="custom-phone">Số điện thoại</label>
                        <input type="number" class="form-control" id="custom-phone" placeholder="Phone">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tạm hoãn</button>
                <button type="button" class="btn btn-primary" id="save-btn">Gửi yêu cầu</button>
            </div>
        </div>

      </div>
    </div>

    <script type="text/javascript">
     	$(document).ready(function(){
     		var order = localStorage.getItem("order");
     		var html = "";
            if(order != null){
            var res = order.split(";");
     		var totalPrice = 0;
     		for(var i = 0; i < res.length; i++){
				datain = JSON.parse(res[i]);
				html += "<tr class='data-order' data-id='"+ (datain.id) +"' data-name='"+ (datain.name) +"' data-numb='"+ (datain.numb) +"' data-price='"+ (datain.price) +"'>";
                html += "<td>"+ datain.name +"</td>";
                html += "<td>"+ datain.numb +"</td>";
                html += "<td>"+ datain.price +"</td>";
                html += "<td>"+ (datain.numb * datain.price) +"</td>";
                html += "<td><div class='btn btn-danger btn-action-sp'>Xóa</div></td>";
              	html += "</tr>";
              	totalPrice += datain.numb*datain.price;
     		}
 			html += "<tr>";
            html += "<td colspan='3'>Tổng</td>";
            html += "<td id='total-price'>"+ totalPrice +"</td>";
            html += "<td><div class='btn btn-success btn-submit' data-toggle='modal' data-target='#custom-info'>Đặt hàng </div></td>";
          	html += "</tr>";
            }
     		$("#order-detail").append(html);

     		$('.btn-action-sp').click(function(){
     			$newPrice = 0;
     			$(this).parent().parent().remove()
     			$('.data-order').each(function( index ) {
  					$newPrice += parseInt($( this ).attr("data-price"));
				});
				$('#total-price').html($newPrice);
     		});

            $("#save-btn").click(function(){
                var custom_name     = $("#custom-name").val();
                var custom_email    = $("#custom-email").val();
                var custom_phone    = $("#custom-phone").val();

                // alert(custom_name);

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
                    data: { 
                        'custom_name' : custom_name,
                        'custom_email' : custom_email,
                        'custom_phone' : custom_phone,
                        order : JSON.stringify(dataout) 
                    },
                    dataType: "json"
                });
                 
                request.done(function( msg ) {
                  // $( "#log" ).html( msg );
                  $('#custom-info').modal('toggle');
                });
                 
                request.fail(function( jqXHR, textStatus ) {
                  alert( "Request failed: " + textStatus );
                });
            });
     	});
    </script>
@stop