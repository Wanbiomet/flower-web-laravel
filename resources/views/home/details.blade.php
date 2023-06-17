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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="add-rating">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$data->product_id}}">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{$data->product_name}}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="rating-css">
                            <div class="star-icon">
                                <input type="radio" value="1" name="product_rating" checked id="rating1">
                                <label for="rating1" class="fa fa-star"></label>
                                <input type="radio" value="2" name="product_rating" id="rating2">
                                <label for="rating2" class="fa fa-star"></label>
                                <input type="radio" value="3" name="product_rating" id="rating3">
                                <label for="rating3" class="fa fa-star"></label>
                                <input type="radio" value="4" name="product_rating" id="rating4">
                                <label for="rating4" class="fa fa-star"></label>
                                <input type="radio" value="5" name="product_rating" id="rating5">
                                <label for="rating5" class="fa fa-star"></label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                @auth
                <ul class="rating">
                    @if($ratings)
                    @for($count=1; $count<=5; $count++) @php if($count<=$ratings->ratings){
                        $color = "color:#e84393;";
                        }
                        else{
                        $color = "color:#7d8da1;";
                        }

                        @endphp
                        <li style="cursor:pointer; {{$color}} font-size:25px;">
                            &#9733;
                        </li>
                        @endfor
                        @else
                        @for($count=1; $count<=5; $count++) <li style="cursor:pointer; color:#7d8da1; font-size:25px;">
                            &#9733;
                            </li>
                            @endfor
                            @endif
                </ul>
                @endauth

                <div class="price">{{currency_format($data['product_price'])}}<span>{{currency_format(900000)}}</span></div>
                <div class="desp-product">
                    Lấy cảm hứng từ bộ phim tình cảm , mẫu hoa cùng tên mang đến thông điệp ý nghĩa về sức
                    mạnh của tình yêu và cách mà tình yêu làm thay đổi mỗi người. Tặng bó hoa “Me before you’ cho một
                    người nghĩa là ta rất thương yêu, quý trọng và đề cao họ.
                </div>
                <br>
                <div style="margin: 10px 0;">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Đánh Giá Sản Phẩm
                    </button>
                </div>


                <div id="buttons_added">
                    <button class="minus" type="button" onclick="handleMinus(event)"><i style="pointer-events: none;" class='bx bx-minus'></i></button>
                    <input type="text" name="amount" id="amount" value="1">
                    <button class="plus" type="button" onclick="handlePlus(event)"><i style="pointer-events: none;" class='bx bx-plus'></i></button>
                </div>
                <div class="area_order">

                    <button type="submit" class="add-cart">Thêm vào giỏ hàng</button>

                    <a class="buy-now" href="">
                        <div class="buy-now_text">Mua ngay</div>
                    </a>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- icons section -->
<section class="icons-container">
    <div class="icons">
        <img src="{{asset('fronted/images/icon-1.png')}}" alt="">
        <div class="info">
            <h3>Miễn phí vận chuyển</h3>
            <span>cho mọi mặt hàng</span>
        </div>
    </div>
    <div class="icons">
        <img src="{{asset('fronted/images/icon-2.png')}}" alt="">
        <div class="info">
            <h3>10 ngày hoàn trả</h3>
            <span>đảm bảo hoàn lại tiền 100%</span>
        </div>
    </div>
    <div class="icons">
        <img src="{{asset('fronted/images/icon-3.png')}}" alt="">
        <div class="info">
            <h3>Nhiều ưu đãi và quà tặng</h3>
            <span>cho mọi mặt hàng</span>
        </div>
    </div>
    <div class="icons">
        <img src="{{asset('fronted/images/icon-4.png')}}" alt="">
        <div class="info">
            <h3>Thanh toán an toàn</h3>
            <span>được bảo vệ bởi VnPay</span>
        </div>
    </div>
</section>
<!-- icons section end -->
@isset($products_recommend)
<!-- products section -->
<section class="products">
    <h1 class="heading"> Gợi ý sản phẩm <span>Liên Quan</span></h1>
    <div class="page-cat">
        <div class="data_items">
            @foreach($products_recommend as $item)
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
                            <button type="submit" class="cart-btn">Thêm giỏ hàng</button>
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
</section>
@endisset

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

        $("#add-rating").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{route("addRating")}}',
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