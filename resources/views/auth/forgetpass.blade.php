@extends('layouts.app')
@section('title','forgetpassword')

@section('content')
<section class="auth-form" id="forget">
    <h1>FORGET PASSWORD</h1>
    <form action="" class="form" id="forget-form">
        @csrf
        <h2 style="font-weight: 400;">Please enter your email address. You will receive a link to create a new password</h2>
        <div class="form-group">
            <input type="text" placeholder="Enter Your Email" name="email" rules="required|email" class="form-input" autocomplete="off">
            <span class="validate email_error"></span>
        </div>
        <button type="submit" id="forgetpass_btn">Send Email</button>
    </form>
    <a class="btnToHome" href="/login">Return to Login</a>
</section>
@endsection

@section('script')
<script>
    $(function() {
        $("#forget-form").submit(function(e) {
            e.preventDefault();
            $("#forgetpass_btn").text('Please wait....')
            $.ajax({
                url: '{{route("auth.forgot")}}',
                method: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(res) {
                    if (res.status == 400) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: res.message,
                            showConfirmButton: true,
                            timer: 1500,
                            confirmButtonText: 'OK'
                        });
                        $("#forgetpass_btn").text('Send email')
                    }
                    if (res.status == 401) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: res.message,
                            showConfirmButton: true,
                            timer: 1500,
                            confirmButtonText: 'OK'
                        });
                        $("#forgetpass_btn").text('Send email')
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: res.message,
                            showConfirmButton: true,
                            timer: 1500,
                            confirmButtonText: 'OK'
                        });
                        $("#forgetpass_btn").text('Send email')

                    }
                }
            })
        })
    });
</script>
@endsection