@extends('layouts.admin_layout')

@section('content_admin')
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
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Add New Flower
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form id="add-form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="">Occasion</label>
                            <select name="occasion" class="form-control">
                                @foreach($occasions as $occasion)
                                <option value="{{ $occasion->occasion_id }}">{{ $occasion->occasion_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Flower Type</label>
                            <select name="flowertype" class="form-control">
                                @foreach($flowertypes as $flowertype)
                                <option value="{{ $flowertype->flowertype_id }}">{{ $flowertype->flowertype_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="text" id="price" name="price" class="form-control" oninput="formatCurrency(this)">
                        </div>
                        <div class="form-group">
                            <label for="">Design</label>
                            <input type="text" name="design" class="form-control">
                        </div>
                        <!-- <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <input type="file" id="exampleInputFile">
                                    <p class="help-block">Example block-level help text here.</p>
                                </div> -->
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>
        </section>

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
            $("#add-form").submit(function(e) {
                e.preventDefault()
                let priceDecimal = getDecimalValue(document.getElementById('price'));

                let formData = new FormData(this);
                formData.set('price', priceDecimal);

                $.ajax({
                    url: '/admin/add-products',
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
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

        function formatCurrency(input) {
            // Lấy giá trị từ input
            let value = input.value;

            // Kiểm tra giá trị không phải là rỗng
            if (value.trim() !== "") {
                // Loại bỏ các dấu ',' và '.' khỏi giá trị
                value = value.replace(/[,\.]/g, '');

                // Chuyển đổi giá trị thành số
                let numericValue = parseFloat(value);

                // Sử dụng hàm toLocaleString để định dạng giá trị và gán lại vào input
                input.value = numericValue.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0,
                });

                // Lưu giá trị dạng decimal trong thuộc tính data-decimal
                input.dataset.decimal = numericValue;
            }
        }

        // Sử dụng hàm này khi bạn muốn lấy giá trị dưới dạng decimal để post
        function getDecimalValue(input) {
            return parseFloat(input.dataset.decimal);
        }
    </script>
    @endsection