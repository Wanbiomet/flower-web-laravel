@extends('layouts.main')
@section('title','home')

@section('content')
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
<section class="home" id="home">
    <div class="content">
        <h3>Hoa Tươi</h3>
        <span>Các loài hoa đẹp từ thiên nhiên</span>
        <p>Mua hoa giá rẻ và thời gian vận chuyển nhanh</p>
        <a href="#" class="btn-home">mua ngay</a>
    </div>

    <div class="slide">
        <img src="{{asset('fronted/images/home-bg.j')}}pg" alt="">
    </div>
    <div class="slide">
        <img src="{{asset('fronted/images/slider2.p')}}ng" alt="">
    </div>
    <div class="slide">
        <img src="{{asset('fronted/images/tulip.png')}}" alt="">
    </div>
</section>
<!-- End banner-home -->

<!-- about us -->
<section class="about" id="about">
    <h1 class="heading"> <span> Về </span> chúng tôi!! </h1>

    <div class="row">
        <div class="video-container">
            <video src="{{asset('fronted/images/about-vid.mp4')}}" loop autoplay muted></video>
            <h3>Hoa bán chạy nhất</h3>
        </div>

        <div class="content">
            <h3>Tại sao lại chọn chúng tôi??</h3>
            <p>
                Hoathuongyeu cảm ơn quý khách hàng đã tin tưởng và đồng hành cùng chúng tôi trong suốt thời gian qua. Hoathuongyeu
                nhận và gửi hoa trên toàn quốc. Bạn có thể đặt hàng trên web hoặc chat với chúng tôi qua zalo hoặc chat
                bên góc phải website để được tư vấn cụ thể hơn.
            </p>
            <a href="#" class="btn-home">Tìm hiểu</a>
        </div>
    </div>
</section>
<!-- End about us-->

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

<!-- products section -->
<section class="products" id="product">
    <h1 class="heading"> Sản phẩm <span>Mới nhất</span></h1>

    <div class="box-container">
        @foreach($products as $item)
        <form class="add-to-cart" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$item->product_id}}" name="proId">
            <input type="hidden" value="1" name="amount">
            <div class="box">
                <div class="image">
                    @if (filter_var($item->product_img, FILTER_VALIDATE_URL))
                    <!-- Nếu đây là một đường dẫn URL -->
                    <img src="{{$item->product_img}}">
                    @else
                    <!-- Nếu không, đây là một đường dẫn trong thư mục /images -->
                    <img src="/images/{{$item->product_img}}">
                    @endif
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <button type="submit" class="cart-btn">Add to cart</button>
                        <a href="{{route('detail',$item->product_id)}}" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>{{$item->product_name}}</h3>
                    <div class="price"> {{currency_format($item->product_price)}}</div>
                </div>
            </div>
        </form>
        @endforeach
    </div>
</section>
<!-- products section end -->
<!-- review section -->
<section class="review" id="review">
    <h1 class="heading"> customer's <span>review</span></h1>

    <div class="box-container">
        <div class="box">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Flowers represent the duality of my life: brokenness and pain and consolation and love throughout
                magical moments. Still smiling even in the dark and painful day of life to rise up like a flower.
                Through wars and difficult times, everyone deserves a bouquet of flowers to comfort their souls.</p>
            <div class="user">
                <img src="{{asset('fronted/images/pic-1.png')}}" alt="">
                <div class="user-info">
                    <h3>TIEN Nguyen</h3>
                    <span>handsom customer</span>
                </div>
            </div>
            <span class="fas fa-quote-right"></span>
        </div>
        <div class="box">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Flowers represent the duality of my life: brokenness and pain and consolation and love throughout
                magical moments. Still smiling even in the dark and painful day of life to rise up like a flower.
                Through wars and difficult times, everyone deserves a bouquet of flowers to comfort their souls.</p>
            <div class="user">
                <img src="{{asset('fronted//images/pic-2.png')}}" alt="">
                <div class="user-info">
                    <h3>THANG Nguyen</h3>
                    <span>handsom customer</span>
                </div>
            </div>
            <span class="fas fa-quote-right"></span>
        </div>
        <div class="box">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Flowers represent the duality of my life: brokenness and pain and consolation and love throughout
                magical moments. Still smiling even in the dark and painful day of life to rise up like a flower.
                Through wars and difficult times, everyone deserves a bouquet of flowers to comfort their souls.</p>
            <div class="user">
                <img src="{{asset('fronted//images/pic-3.png')}}" alt="">
                <div class="user-info">
                    <h3>KIET LAM</h3>
                    <span>handsom customer</span>
                </div>
            </div>
            <span class="fas fa-quote-right"></span>
        </div>
    </div>

</section>
<!-- review section end -->
<!-- conact section  -->
<section class="contact" id="contact">
    <h1 class="heading">contact <span>us</span></h1>

    <div class="row">
        <form action="">
            <input type="text" placeholder="name" class="box">
            <input type="email" placeholder="email" class="box">
            <input type="number" placeholder="number" class="box">
            <textarea name="" class="box" placeholder="Message" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="Send message" class="btn-home">
        </form>

        <div class="image">
            <img src="{{asset('fronted/images/contact-img.svg')}}" alt="">
        </div>
    </div>
</section>
<!-- contact secton end -->
@endsection

@section('script')
<script>
    $(function() {
        $(".add-to-cart").submit(function(e) {
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