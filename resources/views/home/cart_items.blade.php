<?php
if (!function_exists('currency_format')) {

	function currency_format($number, $suffix = 'VNĐ')
	{
		if (!empty($number)) {
			return number_format($number, 0, ',', '.') . "{$suffix}";
		}
	}
}
?>
<table>
		<tr>
			<th>Sản phẩm</th>
			<th>Số lượng</th>
			<th>Tổng</th>
		</tr>
		
		@php $total = 0 @endphp
		@foreach($cartitem as $item)
		<tr>
			<td>
				<div class="cart-info">
					<img src="{{$item->products->product_img}}" alt="">
					<div class="pro_data">
						<input type="hidden" id="proId" class="proId" value="{{$item->products->product_id}}" name="proId">
						<p>{{$item->products->product_name}}</p>
						<small>{{currency_format($item->products->product_price)}}</small>
						<br>
						<a class="delete-btn" id="delete-btn" >Xóa</a>
					</div>
				</div>
			</td>
			<td>
				<div id="buttons_added">
					<button data-cartid="{{$item->product_id}}" data-qty= "{{$item->cart_qty}}" class="changeQty minus" ><i style="pointer-events: none;" class='bx bx-minus'></i></button>
					<input type="text" class="qtyInput" name="amount" id="amount" value="{{$item->cart_qty}}" data-id="{{$item->product_id}}">
					<button data-cartid="{{$item->product_id}}" data-qty= "{{$item->cart_qty}} "class="changeQty plus" ><i style="pointer-events: none;" class='bx bx-plus'></i></button>
				</div>
			</td>
			<td>{{currency_format($item->products->product_price * $item->cart_qty,'đ')}}</td>
			
		</tr>
			@php $total += ($item->products->product_price * $item->cart_qty) @endphp
		@endforeach
		
	</table>
	<div class="total-price">
		<table>
			<tr>
				<td>Subtotal</td>
				<td>{{currency_format($total,'đ')}}</td>
			</tr>
			<tr>
				<td>Tax</td>
				<td>0đ</td>
			</tr>
			<tr>
				<td>Total</td>
				<td>{{currency_format($total,'đ')}}</td>
			</tr>
		</table>
	</div>
    <div class="btn_checkout_buy">
		<div class="buyContinue"><a href="/search">Tiếp tục mua hàng</a></div>
		<div class="proccesCheckout"><a href="/checkout">Thanh toán</a></div>
	</div>