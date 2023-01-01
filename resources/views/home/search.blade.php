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
@section('title','home')

@section('content')
<section class="filer_container">
    <input type="checkbox" name="" id="filter">
    <label for="filter" class="filter_menu">Filter</label>
    <ul class="crumbs">
        <li><a href="/">Home</a></li>
        <li><a href="#">Birthday</a></li>
    </ul>
    <label for="filter" class="over_lay"></label>
    <div class="product__seach_body">
        <div class="left_menu">
            <ul class="menu_list">
                <li class="menu_list_item">
                    <div class="menu_list_item_header">
                        <h3>Flowers</h3>
                        <label for="filter" class="left_menu_close"><i class='bx bx-x'></i></label>
                    </div>
                    <ul class="menu_list_item_body">
                        @foreach($flowertypes as $item)
                        <li class="menu_list_item_body_item">
                            <input type="checkbox" class="flowertype-filter" name="obj1" value="{{$item->flowertype_id}}" id="obj1">
                            <label for="obj1">{{$item->flowertype_name}} </label>
                        </li>
                        @endforeach
                    </ul>
                </li>

                <li class="menu_list_item">
                    <div class="menu_list_item_header">
                        <h3>Occasion</h3>
                    </div>
                    <ul class="menu_list_item_body">
                        @foreach($occasions as $item)
                        <li class="menu_list_item_body_item">
                            <input type="checkbox" class="occasions" name="obj1" id="obj1" value="{{$item->occasion_id}}">
                            <label for="obj1">{{$item->occasion_name}}</label>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="menu_list_item">
                    <div class="menu_list_item_header">
                        <h3>Presentation</h3>
                    </div>
                    <ul class="menu_list_item_body">
                        <li class="menu_list_item_body_item">
                            <input type="checkbox" name="obj1" id="obj1">
                            <label for="obj1">Flower Bouquets</label>
                        </li>
                        <li class="menu_list_item_body_item">
                            <input type="checkbox" id="obj2">
                            <label for="obj2">Flower Baskets</label>
                        </li>
                        <li class="menu_list_item_body_item">
                            <input type="checkbox" id="obj3">
                            <label for="obj3">Stands of Flowers</label>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

        <div id="update">
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
        </div>
</section>
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