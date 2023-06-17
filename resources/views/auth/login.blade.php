@extends('layouts.app')
@section('title','login')

@section('content')
<section class="auth-form" id="login">
    <h1>Đăng nhập</h1>
    <form action="" class="form" id="login-form">
        @csrf 
        <div class="form-group">
            <input type="text" placeholder="Nhập email" name="email" rules="required|email" class="form-input" autocomplete="off">
            <span class="validate email_error"></span>
        </div>


        <div class="form-group">
            <input type="password" placeholder="Nhập mật khẩu" name="password" rules="required|min:6" class="form-input" autocomplete="off">
            <span class="validate password_error"></span>
        </div>

        <p class="forgetpass"><a href="/forgetpass">quên mật khẩu???</a></p>
        <button type="submit" id="login_btn">Đăng nhập</button>
    </form>

    <p>hoặc đăng nhập bằng</p>
    <div class="social">
        <button>
            <i class='bx bxl-facebook-square face'></i>Facebook
        </button>
        <button>
            <i class='bx bxl-google google'></i>Google
        </button>
    </div>
    <p class="form-footer">Chưa đăng ký thành viên??<a class="btn-sign-up" href="/register">Đăng ký</a></p>
    <a class="btnToHome" href="/">Về Trang chủ</a>
</section>
@endsection


@section('script')
<!-- <script>
    var form = new Validator('#login-form');
</script> -->
<script>
    $(function() {
        $("#login-form").submit(function(e) {
            e.preventDefault();
            $("#login_btn").text('Please Wait....')
            $.ajax({
                url: '{{route("auth.login")}}',
                method: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function() {
                    $(document).find('span.validate').text('');
                },
                success: function(res) {
                    if (res.status == 400) {
                        $.each(res.message, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                        $("#login_btn").text('Login');
                    }
                    if(res.status==200){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: res.message,
                            showConfirmButton: true,
                            timer: 1500,
                            confirmButtonText: 'OK'
                        })
                        $("#login-form")[0].reset();
                        $("#login_btn").text('Login');
                        window.location.href = "/";
                    }
                    if (res.status == 401) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: res.message,
                            showConfirmButton: true,
                            timer: 1500,
                            confirmButtonText: 'OK'
                        })
                        $("#login_btn").text('Login');
                    } 
                }
            })
        })
    });
</script>
@endsection