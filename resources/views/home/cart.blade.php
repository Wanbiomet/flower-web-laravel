@extends('layouts.main')
@section('title','Cart')

@section('content')
<div class="small-container cart-page">
	<h1>SHOPPING CART</h1>
	@if($cartitem->isNotEmpty())
	<div id="appendCartItems">
		@include('home.cart_items')

	</div>
	@else
	<h1 style="text-align: center; font-size:20px;color:pink;">Nothing in cart</h1>
	<div class="buyContinue"><a href="/search">Continue to Shopping</a></div>

	@endif
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$('.cart-page').on('click', '.changeQty', function() {

		if ($(this).hasClass('plus')) {
			var quantity = $(this).data('qty')
			new_qty = parseInt(quantity) + 1;
		}
		if ($(this).hasClass('minus')) {
			var quantity = $(this).data('qty')
			if (quantity <= 1) {
				Swal.fire({
					position: 'center',
					icon: 'error',
					title: 'Item quantity must be 1 or greater!',
					showConfirmButton: true,
					timer: 1500,
					confirmButtonText: 'OK'
				})
				return false
			}
			new_qty = parseInt(quantity) - 1;
		}
		var cartid = $(this).data('cartid');
		$.ajax({
			url: '{{route("updateCart")}}',
			type: 'post',
			data: {
				'proId': cartid,
				'qtyInput': new_qty,
			},
			success: function(res) {
				$('#appendCartItems').html(res.view)
			}
		})
	})
	$('.cart-page').on('click', '#delete-btn', function(e) {
		e.preventDefault()
		var proId = $(this).closest(".pro_data").find('.proId').val();
		var trObj = $(this)
		$.ajax({
			url: '{{route("deleteCart")}}',
			type: 'post',
			data: {
				'proId': proId,
			},
			dataType: 'json',
			success: function(res) {
				console.log(res.data);
				if (res.status == 200) {
					Swal.fire({
						position: 'center',
						icon: 'success',
						title: res.msg,
						showConfirmButton: true,
						timer: 1500,
						confirmButtonText: 'OK'
					})
					trObj.parents("tr").remove();
					loadCartCount()
				}
			}
		})
	})
	function loadCartCount() {
        $.ajax({
            url: '{{route("loadCartCount")}}',
            dataType: 'json',
            method: 'get',
            success: function(res) {
                $('#cart_count').html(res.count);
            }
        })
    }
</script>


@endsection