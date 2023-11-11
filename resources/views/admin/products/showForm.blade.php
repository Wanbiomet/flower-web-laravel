@extends('layouts.admin_layout')

@section('content_admin')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Basic table
        </div>
        <div>
            @if($products->isEmpty())
                <p>NO PRODUCTS</p>
            @else
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
                        <th>Occasion Name</th>
                        <th>Flowertype Name</th>
                        <th>Action</th>
                    </tr>
                </thead>

                @foreach($products as $item)
                <tbody>
                    <tr data-expanded="true">
                        <td style="height: 80px; width:80px; margin-left:10px;">
                            @if (filter_var($item->product_img, FILTER_VALIDATE_URL))
                            <!-- Nếu đây là một đường dẫn URL -->
                            <img src="{{$item->product_img}}" style="height: 100%; width: 100%; border-radius: 50%;">
                            @else
                            <!-- Nếu không, đây là một đường dẫn trong thư mục /images -->
                            <img src="/images/{{$item->product_img}}" style="height: 100%; width: 100%; border-radius: 50%;">
                            @endif
                        </td>
                        <td>{{$item->product_name}}</td>
                        <td>{{$item->occasions->occasion_name}}</td>
                        <td>{{$item->flowertypes->flowertype_name}}</td>
                        <td style="color:red; "><i style="font-size: 20px; cursor: pointer;" data-id="{{$item->product_id}}" class='bx bxs-trash'></i></td>
                        <td style="color:blue; "><a href="/admin/edit-products/{{$item->product_id}}"><i style="font-size: 20px; cursor: pointer;" class='bx bxs-edit'></i></a></td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <div style="display:flex; justify-content: center;">
                {{ $products->links('pagination::default') }}
            </div>
            @endif
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
        $("#main-content").on('click', '.bxs-trash', function() {
            var fltId = $(this).data('id');
            console.log();
            $.ajax({
                url: '/admin/delete-products',
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