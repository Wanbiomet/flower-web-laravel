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
@extends('layouts.main')
@section('title','detail')

@section('content')
<section class="content_detail">
    <div class="main_content">
        <form class="add-to-cart" id="add-cart-form">
            @csrf
            <input type="hidden" value="{{$data->product_id}}" name="proId">
            <div class="left_content">
                <div class="img_detail">
                    <img src="{{$data['product_img']}}" alt="">
                </div>
            </div>
            <div class="right_content">
                <h2>{{$data['product_name']}}</h2>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <p>Customer Rating</p>
                </div>
                <div class="price">{{currency_format($data['product_price'])}}<span>{{currency_format(900000)}}</span></div>
                <div class="desp-product">
                    Lấy cảm hứng từ bộ phim tình cảm , mẫu hoa cùng tên mang đến thông điệp ý nghĩa về sức
                    mạnh của tình yêu và cách mà tình yêu làm thay đổi mỗi người. Tặng bó hoa “Me before you’ cho một
                    người nghĩa là ta rất thương yêu, quý trọng và đề cao họ.
                </div>
                <div id="buttons_added">
                    <button class="minus" type="button" onclick="handleMinus(event)"><i style="pointer-events: none;" class='bx bx-minus'></i></button>
                    <input type="text" name="amount" id="amount" value="1">
                    <button class="plus" type="button" onclick="handlePlus(event)"><i style="pointer-events: none;" class='bx bx-plus'></i></button>
                </div>
                <div class="area_order">

                    <button type="submit" class="add-cart">Add to cart</button>

                    <a class="buy-now" href="">
                        <div class="buy-now_text">Buy now</div>
                    </a>
                </div>
            </div>
        </form>
    </div>
</section>
<section class="icons-container">
    <div class="icons">
        <img src="{{asset('fronted/images/icon-1.png')}}" alt="">
        <div class="info">
            <h3>free delivery</h3>
            <span>on all orders</span>
        </div>
    </div>
    <div class="icons">
        <img src="{{asset('fronted/images/icon-2.png')}}" alt="">
        <div class="info">
            <h3>10 days returns</h3>
            <span>moneyback guarantee</span>
        </div>
    </div>
    <div class="icons">
        <img src="{{asset('fronted/images/icon-3.png')}}" alt="">
        <div class="info">
            <h3>offer & gifts</h3>
            <span>on all orders</span>
        </div>
    </div>
    <div class="icons">
        <img src="{{asset('fronted/images/icon-4.png')}}" alt="">
        <div class="info">
            <h3>secure payment</h3>
            <span>protected by paypal</span>
        </div>
    </div>
</section>
@endsection

@section('script')

<script>
    $(function() {
        $("#add-cart-form").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{route("addCart")}}',
                type: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(res) {
                    if (res.status == 403) {
                        window.location.href = "/login"
                    }
                    if (res.status == 200) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: res.msg,
                            showConfirmButton: true,
                            timer: 1500,
                            confirmButtonText: 'OK'
                        })
                        loadCartCount()
                    }
                }
            })
        })
    });
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