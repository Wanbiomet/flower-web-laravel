
@extends('layouts.main')
@section('title','home')

@section('content')

<section class="home" id="home">
        <div class="content">
            <h3>Fresh flowers</h3>
            <span>natural & beautiful flowers</span>
            <p>Buy cheap flowers online and Fast delivery </p>
            <a href="#" class="btn">buy now</a>
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
        <h1 class="heading"> <span> about </span> us </h1>

        <div class="row">
            <div class="video-container">
                <video src="{{asset('fronted/images/about-vid.mp4')}}" loop autoplay muted></video>
                <h3>best flower sellers</h3>
            </div>

            <div class="content">
                <h3>Why choose us?</h3>
                <p>
                    Hoathuongyeu thanks customers for trusting and accompanying us during the past time. Hoathuongyeu
                    received and sent flowers nationwide. You can order on the web or chat with us, me via zalo or chat
                    box on the right corner of the website for more specific advice.
                </p>
                <a href="#" class="btn">Learn more</a>
            </div>
        </div>
    </section>
    <!-- End about us-->

    <!-- icons section -->
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
    <!-- icons section end -->

    <!-- products section -->
    <section class="products" id="product">
        <h1 class="heading"> latest <span>products</span></h1>

        <div class="box-container">
            <div class="box">
                <span class="discount">-10%</span>
                <div class="image">
                    <img src="{{asset('fronted/images/img-1.jpg')}}" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">add to cart</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>flower pot</h3>
                    <div class="price"> $12.99 <span>$15.9</span></div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-15%</span>
                <div class="image">
                    <img src="{{asset('fronted/images/img-2.jpg')}}" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">add to cart</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>flower pot</h3>
                    <div class="price"> $12.99 <span>$15.9</span></div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-5%</span>
                <div class="image">
                    <img src="{{asset('fronted/images/img-3.jpg')}}" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">add to cart</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>flower pot</h3>
                    <div class="price"> $12.99 <span>$15.9</span></div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-20%</span>
                <div class="image">
                    <img src="{{asset('fronted/images/img-4.jpg')}}" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">add to cart</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>flower pot</h3>
                    <div class="price"> $12.99 <span>$15.9</span></div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-25%</span>
                <div class="image">
                    <img src="{{asset('fronted/images/img-5.jpg')}}" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">add to cart</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>flower pot</h3>
                    <div class="price"> $12.99 <span>$15.9</span></div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-3%</span>
                <div class="image">
                    <img src="{{asset('fronted/images/img-6.jpg')}}" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">add to cart</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>flower pot</h3>
                    <div class="price"> $12.99 <span>$15.9</span></div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-7%</span>
                <div class="image">
                    <img src="{{asset('fronted/images/img-7.jpg')}}" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">add to cart</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>flower pot</h3>
                    <div class="price"> $12.99 <span>$15.9</span></div>
                </div>
            </div>
            <div class="box">
                <span class="discount">-8%</span>
                <div class="image">
                    <img src="{{asset('fronted/images/img-8.jpg')}}" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">add to cart</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>flower pot</h3>
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
                <input type="submit" value="Send message" class="btn">
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
