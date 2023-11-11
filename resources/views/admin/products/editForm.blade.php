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
                            <select name="occasion">
                                @foreach($occasions as $occasion)
                                    <option value="{{ $occasion->occasion_id }}" @if($occasion->occasion_id === $product->occasion_id) selected @endif>{{ $product->occasions->occasion_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Flower Type</label>
                            <select name="flowertype">
                                @foreach($flowertypes as $flowertype)
                                    <option value="{{ $flowertype->flowertype_id }}" @if($flowertype->flowertype_id === $product->flowertype_id) selected @endif>{{ $product->flowertypes->flowertype_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image">
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
                            <input type="number" step="0.01" id="price" name="price" value="{{$product->product_price}}">
                        </div>
                        <div class="form-group">
                            <label for="">Design</label>
                            <input type="text" name="design" value="{{$product->product_design}}">
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
    </script>
    @endsection