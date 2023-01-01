@extends('layouts.app')
@section('title','profile')

@section('content')
<section class="auth-form">
    <h1>Profile</h1>
    <form action="" class="form" id="profile-form">
        @csrf
        <input type="hidden" id="user_id" name="id" rules="required" class="form-input" autocomplete="off" value="{{$userInfo->id}}">
        <div class="form-group">
            <input type="text" placeholder="Enter Your Username" name="fullname" rules="required" class="form-input" autocomplete="off" value="{{$userInfo->name}}" >
            <span class="validate fullname_error"></span>
        </div>

        <div class="form-group">
            <input type="text" placeholder="Enter Your Email" name="email" rules="required|email" class="form-input" autocomplete="off" value="{{$userInfo->email}}" >
            <span class="validate email_error"></span>
        </div>


        <div class="form-group">
            <input type="tel" placeholder="Enter Your Phone" name="phone" rules="required|min:10" class="form-input" autocomplete="off" value="{{$userInfo->phone}}">
            <span class="validate phone_error"></span>
        </div>


        <div class="form-group">
            <input type="text" placeholder="Enter Your Address" name="address" rules="required|min:6" class="form-input" autocomplete="off" value="{{$userInfo->address}}">
            <span class="validate address_error"></span>
        </div>

        <button id="profile_btn" type="submit">Update</button>
    </form>
    <a class="btnToHome" href="/">Return to Home</a>
</section>
@endsection


@section('script')
<script>
    $(function() {
        $("#profile-form").submit(function(e) {
            e.preventDefault();
            $('#profile_btn').text('Please Wait....');
            let id = $('#user_id').val();
            $.ajax({
                url: '{{route("profile.update")}}',
                method: 'post',
                data: $(this).serialize()+ `&id=${id}`,
                dataType: 'json',
                success: function(res) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: res.message,
                        showConfirmButton: true,
                        timer: 1500,
                        confirmButtonText: 'OK'
                    })
                    $('#profile_btn').text('Update')
                }
            });
        })
    })
</script>
@endsection