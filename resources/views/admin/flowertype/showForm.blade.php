@extends('layouts.admin_layout')

@section('content_admin')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Basic table
        </div>
        <div>
            <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
                <thead>
                    <tr>
                        <th data-breakpoints="xs">ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($flowertype as $item)
                <tbody>
                    <tr data-expanded="true">
                        <td>{{$item->flowertype_id}}</td>
                        <td>{{$item->flowertype_name}}</td>
                        <td style="color:red;"><i style="font-size: 20px;" data-id="{{$item->flowertype_id}}" class='bx bx-x'></i></td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
@section('admin_js')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#main-content").on('click','.bx-x',function() {
            var fltId = $(this).data('id');
            $.ajax({
                url: '{{route("flowertype.delete")}}',
                type: 'post',
                data: {
                    'id': fltId
                },
                success: function(res) {
                    if (res.status == 200) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: res.msg,
                            showConfirmButton: true,
                            timer: 1500,
                            confirmButtonText: 'OK'
                        })
                        window.location.reload()
                    }
                    if (res.status == 403) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: res.msg,
                            showConfirmButton: true,
                            timer: 1500,
                            confirmButtonText: 'OK'
                        })
                    }
                }
            })
        })
    })
</script>
@endsection