@extends('layouts.app')
@section('title','resetpassword')

@section('content')
<section class="auth-form" id="reset">
    <h1>RESET PASSWORD</h1>
    <form action="" class="form" id="reset-form">
        @csrf
        <input type="hidden" name="email" value="{{$email}}">
        <input type="hidden" name="token" value="{{$token}}">
        <div class="form-group">
            <input type="password" placeholder="Enter Your Password" name="npassword" rules="required|min:6" class="form-input" autocomplete="off">
            <span class="validate password_error"></span>
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Your Comfirm Password" name="cpassword" rules="required|min:6" class="form-input" autocomplete="off">
            <span class="validate cpassword_error"></span>
        </div>

        <button id="reset_btn" type="submit">Reset</button>
    </form>
    <a class="btnToHome" href="/login">Return to Login</a>
</section>
@endsection


@section('script')
<script>
    // var form = new Validator('#register-form');
</script>
<script>
    $(function() {
        $("#reset-form").submit(function(e) {
            e.preventDefault();
            $("#reset_btn").text('Please Wait....');
            $.ajax({
                url: '{{ route("auth.reset") }}',
                method: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function(){
                    $(document).find('span.validate').text('');
                },
                success: function(res) {
                    if (res.status == 400) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: res.message,
                            showConfirmButton: true,
                            timer: 1500,
                            confirmButtonText: 'OK'
                        })
                    } else if (res.status == 401){
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: res.message,
                            showConfirmButton: true,
                            timer: 1500,
                            confirmButtonText: 'OK'
                        })
                    }
                    else {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: res.message,
                            showConfirmButton: true,
                            timer: 1500,
                            confirmButtonText: 'OK'
                        })
                        $("#reset_btn").text('Reset');
                        window.location = '{{route("login")}}'
                    }
                }
            });
        });
    });
</script>
@endsection