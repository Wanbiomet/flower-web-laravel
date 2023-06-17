
@extends('layouts.main')
@section('title','home')

@section('content')

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
            <div class="box">
                <span class="discount">-10%</span>
                <div class="image">
                    <img src="{{asset('fronted/images/img-1.jpg')}}" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">Thêm vào giỏ hàng</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Chậu hoa</h3>
                    <div class="price"> $12.99 <span>$15.9</span></div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-15%</span>
                <div class="image">
                    <img src="{{asset('fronted/images/img-2.jpg')}}" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">Thêm vào giỏ hàng</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Chậu hoa</h3>
                    <div class="price"> $12.99 <span>$15.9</span></div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-5%</span>
                <div class="image">
                    <img src="{{asset('fronted/images/img-3.jpg')}}" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">Thêm vào giỏ hàng</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Chậu hoa</h3>
                    <div class="price"> $12.99 <span>$15.9</span></div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-20%</span>
                <div class="image">
                    <img src="{{asset('fronted/images/img-4.jpg')}}" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">Thêm vào giỏ hàng</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Chậu hoa</h3>
                    <div class="price"> $12.99 <span>$15.9</span></div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-25%</span>
                <div class="image">
                    <img src="{{asset('fronted/images/img-5.jpg')}}" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">Thêm vào giỏ hàng</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Chậu hoa</h3>
                    <div class="price"> $12.99 <span>$15.9</span></div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-3%</span>
                <div class="image">
                    <img src="{{asset('fronted/images/img-6.jpg')}}" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">Thêm vào giỏ hàng</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Chậu hoa</h3>
                    <div class="price"> $12.99 <span>$15.9</span></div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-7%</span>
                <div class="image">
                    <img src="{{asset('fronted/images/img-7.jpg')}}" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">Thêm vào giỏ hàng</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Chậu hoa</h3>
                    <div class="price"> $12.99 <span>$15.9</span></div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-8%</span>
                <div class="image">
                    <img src="{{asset('fronted/images/img-8.jpg')}}" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">Thêm vào giỏ hàng</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>Chậu hoa</h3>
                    <div class="price"> $12.99 <span>$15.9</span></div>
                </div>
            </div>
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
                        <h3>Quang Nguyen</h3>
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
                        <h3>Quang Nguyen</h3>
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
                    <img src="{{asset('fronted//images/pic-3.png')}}"  alt="">
                    <div class="user-info">
                        <h3>Quang Nguyen</h3>
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
@endsection
