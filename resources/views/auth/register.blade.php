@extends('layouts.app')
@section('title','register')

@section('content')
<section class="auth-form" id="register">
    <h1>REGISTER</h1>
    <form action="" class="form" id="register-form">
        @csrf
        <div class="form-group">
            <input type="text" placeholder="Enter Your Username" name="fullname" rules="required" class="form-input" autocomplete="off">
            <span class="validate fullname_error"></span>
        </div>

        <div class="form-group">
            <input type="text" placeholder="Enter Your Email" name="email" rules="required|email" class="form-input" autocomplete="off">
            <span class="validate email_error"></span>
        </div>


        <div class="form-group">
            <input type="password" placeholder="Enter Your Password" name="password" rules="required|min:6" class="form-input" autocomplete="off">
            <span class="validate password_error"></span>
        </div>


        <div class="form-group">
            <input type="password" placeholder="Enter Your Comfirm Password" name="cpassword" rules="required|min:6" class="form-input" autocomplete="off">
            <span class="validate cpassword_error"></span>
        </div>

        <button id="register_btn" type="submit">Register</button>
    </form>
    <p class="form-footer">You have an account? <a class="btn-sign-in" href="/login">Sign In</a></p>
    <a class="btnToHome" href="/">Return to Home</a>
</section>

@endsection


@section('script')
<script>
    // var form = new Validator('#register-form');
</script>
<script>
    $(function() {
        $("#register-form").submit(function(e) {
            e.preventDefault();
            $("#register_btn").text('Please Wait....');
            $.ajax({
                url: '{{ route("auth.register") }}',
                method: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function(){
                    $(document).find('span.validate').text('');
                },
                success: function(res) {
                    if (res.status == 400) {
                        $.each(res.message, function(prefix,val){
                            $('span.'+prefix+'_error' ).text(val[0]);
                        });
                        $("#register_btn").text('Register');
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
                        $("#register-form")[0].reset();
                        $("#register_btn").text('Register');
                        window.location.href = "/login";
                    }
                }
            });
        });
    });
</script>
@endsection