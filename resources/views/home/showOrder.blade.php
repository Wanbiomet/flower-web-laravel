@extends('layouts.main')
@section('title','Own Order')
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
@section('content')
<div class="small-container cart-page">
    @if($order->isNotEmpty())
    <h1>Own Order</h1>
    <div id="appendCartItems">
        <table>
            <tr>
                <th>Order Id</th>
                <th>Order Date</th>
                <th>Shipping Date</th>
                <th>Total Product</th>
                <th>Subtotal</th>
            </tr>
            @foreach($order as $item)
            <tbody>
                <tr >
                    <td>{{$item->order_id}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->place_on}}</td>
                    <td>{{$item->total_products}}</td>
                    <td>{{currency_format($item->total_price)}}</td>
                </tr>
            </tbody>
            @endforeach

        </table>

    </div>
    @else
    <h1 style="padding: 20px;
    border: 1px solid;">You don't have any order yet</h1>
    @endif
</div>
@endsection