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

<div class="page-cat">
    <div class="data_items">
        @foreach($products as $item)
        <form class="add-to-cart" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$item->product_id}}" name="proId">
            <input type="hidden" value="1" name="amount">
            <div class="data_item">
                <span class="discount">-10%</span>
                <div class="image">
                    <img src="{{$item->product_img}}" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <button type="submit" class="cart-btn">Add to cart</button>
                        <a href="{{route('detail',$item->product_id)}}" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>{{$item->product_name}}</h3>
                    <div class="price"> {{currency_format($item->product_price)}} <span>{{currency_format(15.9,'$')}}</span></div>
                </div>
            </div>
        </form>
        @endforeach
    </div>
</div>