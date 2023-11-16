@extends('layouts.admin_layout')

@section('content_admin')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Edit Flower
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form id="edit-form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->product_id}}">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{$product->product_name}}">
                        </div>
                        <div class="form-group">
                            <label for="">Occasion</label>
                            <select name="occasion" class="form-control">
                                @foreach($occasions as $occasion)
                                <option value="{{ $occasion->occasion_id }}" @if($occasion->occasion_id === $product->occasion_id) selected @endif>
                                    {{ $occasion->occasion_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Flower Type</label>
                            <select name="flowertype" class="form-control">
                                @foreach($flowertypes as $flowertype)
                                <option value="{{ $flowertype->flowertype_id }}" @if($flowertype->flowertype_id === $product->flowertype_id) selected @endif>
                                    {{ $flowertype->flowertype_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                            @if (filter_var($product->product_img, FILTER_VALIDATE_URL))
                            <!-- Nếu đây là một đường dẫn URL -->
                            <img src="{{$product->product_img}}" style="height: 80px; width: 80px; border-radius: 50%;">
                            @else
                            <!-- Nếu không, đây là một đường dẫn trong thư mục /images -->
                            <img src="/images/{{$product->product_img}}" style="height: 80px; width: 80px; border-radius: 50%;">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="text" id="price" name="price" value="{{$product->product_price}}" class="form-control" oninput="formatCurrency(this)" onblur="formatPrice()">
                        </div>
                        <div class="form-group">
                            <label for="">Design</label>
                            <input type="text" name="design" value="{{$product->product_design}}" class="form-control">
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
            $("#edit-form").submit(function(e) {
                e.preventDefault()
                let formData = new FormData(this);
                $.ajax({
                    url: '/admin/edit-products',
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
                value = value.replace(/[,\.]/g, '');

                let numericValue = parseFloat(value);

                // Sử dụng hàm toLocaleString để định dạng giá trị và gán lại vào input
                input.value = numericValue.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0,
                });

                input.dataset.decimal = numericValue;
            }
        }
        function getDecimalValue(input) {
            return parseFloat(input.dataset.decimal);
        }
        function formatPrice() {

            let priceDecimal = getDecimalValue(document.getElementById('price'));

            console.log(priceDecimal);
            // Hiển thị giá trị theo định dạng tiền tệ
            formatCurrency({
                value: priceDecimal,
                input: document.getElementById('price')
            });
        }
    </script>
    @endsection