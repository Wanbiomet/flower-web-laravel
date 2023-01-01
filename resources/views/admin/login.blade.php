@extends('layouts.app')
@section('title','login')

@section('content')
<section class="auth-form">
  <h1>ADMIN LOGIN</h1>
  <form action="" class="form" id="Adminlogin">
    @csrf
    <div class="form-group">
      <input type="text" placeholder="Enter Your Email" name="email" rules="required|email" class="form-input" autocomplete="off">
      <span class="validate email_error"></span>
    </div>


    <div class="form-group">
      <input type="password" placeholder="Enter Your Password" name="password" rules="required|min:6" class="form-input" autocomplete="off">
      <span class="validate password_error"></span>
    </div>
    <button type="submit" id="admin-login_btn">Login</button>
  </form>
  <a class="btnToHome" href="#">Return to Dashboard</a>
</section>
@endsection


@section('script')
<script>
  $(function() {
    $("#Adminlogin").submit(function(e) {
      e.preventDefault();
      $("#admin-login_btn").text('Please Wait....')
      $.ajax({
        url: '{{route("admin.login")}}',
        type: 'post',
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function() {
          $(document).find('span.validate').text('');
        },
        success: function(res) {
          if (res.status === 400) {
            $.each(res.msg, function(prefix, val) {
              $('span.' + prefix + '_error').text(val[0]);
            });
            $("#admin-login_btn").text('Login')
          }
          if (res.status === 401) {
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: res.msg,
              showConfirmButton: true,
              timer: 1500,
              confirmButtonText: 'OK'
            })
            $("#admin-login_btn").text('Login')
          }
          if (res.status === 200) {
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: res.msg,
              showConfirmButton: true,
              timer: 1500,
              confirmButtonText: 'OK'
            })
            $("#Adminlogin")[0].reset();
            $("#admin-login_btn").text('Login')
            window.location.href = "/admin/dashboard";
          }
        }
      })
    })
  });
</script>
@endsection