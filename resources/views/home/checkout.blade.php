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

@section('title','checkout')

@section('content')
<section class="checkout_container">
    <form action="{{route('placeOn')}}" method="POST" id="checkoutForm">
        @csrf
        <div class="leftside">
            <div class="sendTo">
                <h2>Recipient info</h2>
                <div class="form-group">
                    <label class="lb_text"><span>*</span> Recipient name</label>
                    <input type="text" placeholder="Enter Your Username" name="fullname" id="fullname" rules="required" class="form-input" autocomplete="off">
                    <span class="validate fullname_error"></span>
                </div>
                <div class="form-group">
                    <label class="lb_text"><span>*</span> Recipient Phone</label>
                    <input type="text" placeholder="Enter Your Phone" name="phone" id="phone" rules="required" class="form-input" autocomplete="off">
                    <span class="validate phone_error"></span>
                </div>
                <div class="form-group">
                    <label class="lb_text"><span>*</span> Email</label>
                    <input type="text" placeholder="Enter Your Email" name="email" id="email" rules="required" class="form-input" autocomplete="off">
                    <span class="validate email_error"></span>
                </div>
                <div class="form-group">
                    <label class="lb_text"><span>*</span> Address</label>
                    <input type="text" placeholder="Enter Your Address" name="address" id="address" rules="required" class="form-input" autocomplete="off">
                    <span class="validate address_error"></span>
                </div>
            </div>
            <div class="dateRecipient">
                <h2>Delivery time</h2>
                <div class="form-group">
                    <input type="text" style="margin-top: 0 !important;" class="form-input" id="datepicker" autocomplete="off" name="placeon">
                    <span class="validate placeon_error"></span>
                </div>
            </div>
            <h2 style="font-size: 20px;
    margin-bottom: 10px;
    color: var(--color-primary);
    font-weight: 600;">Select payment method</h2>
            <div class="payment_method">
                <label class="payment_choose">
                    <input type="radio" name="payments" value="1"><span>COD – Cash on delivery</span>
                </label>
                <div class="payment_choose"><input type="radio" name="payments" value="2"><div style="display: flex;align-items: center;"><span>Pay with vnpay</span><img style="width:30px;height:30px;border-radius: 5px;margin-left: 10px;" src="{{asset('fronted/images/download-logo-vector-vnpay-mien-phi.jpg')}}" alt=""></div></div>
            </div>
            <button type="submit" class="btn_checkout">Check Out</button>
           
        </div>
        <div class="rightside">
            @php $total = 0 @endphp
            @php $total_qty = 0 @endphp
            @foreach($carts as $item)
            <div class="itemCart">
                <img src="{{$item->products->product_img}}" alt="">
                <span>{{$item->products->product_name}}</span>
                <p>{{$item->cart_qty}}*{{currency_format($item->products->product_price)}}</p>
            </div>
            @php $total += ($item->products->product_price * $item->cart_qty) @endphp
            @php $total_qty += $item->cart_qty @endphp
            @endforeach
            <input type="hidden" value="{{$total}}" id="total" name="total">
            <input type="hidden" value="{{$total_qty}}" id="total_qty" name="total_qty">
            <div class="total_itemCart">
                <table>
                    <tr>
                        <td>Subtotal</td>
                        <td>{{currency_format($total,'đ')}}</td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>0VND</td>
                    </tr>
                    <tr>
                        <td style="font-size: 14px;text-transform:uppercase;font-weight: 600;">Total</td>
                        <td style="font-size: 14px;text-transform:uppercase;font-weight: 600;">{{currency_format($total,'đ')}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</section>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#datepicker').datepicker({
            dateFormat: "dd-mm-yy",
            duration: "fast"
        })
    })
    $(function() {
        // $("#checkoutForm").submit(function(e) {
        //     e.preventDefault();
        //     $.ajax({
        //         url: '{{route("placeOn")}}',
        //         method: 'post',
        //         data: $(this).serialize(),
        //         dataType: 'json',
        //         beforeSend: function() {
        //             $(document).find('span.validate').text('');
        //         },
        //         success: function(res) {
        //             if (res.status == 400) {
        //                 $.each(res.msg, function(prefix, val) {
        //                     $('span.' + prefix + '_error').text(val[0]);
        //                 });
        //             }
        //             if (res.status == 200) {
        //                 Swal.fire({
        //                     position: 'center',
        //                     icon: 'success',
        //                     title: res.msg,
        //                     showConfirmButton: true,
        //                     timer: 1500,
        //                     confirmButtonText: 'OK'
        //                 })
        //                 window.location.reload()
        //             }
        //             if (res.status == 201) {
        //                 console.log(res.msg)
        //                 window.location.href = "/vnpay";
        //             }
        //         }
        //     })
        // })


    });
</script>
@endsection