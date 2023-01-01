@extends('layouts.admin_layout')

@section('content_admin')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Add new Flower Type
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form id="add-form">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="">Ac Name</label>
                            <input type="text" class="form-control" placeholder="Enter Ac Name">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control" cols="30" rows="10"></textarea>
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
                $.ajax({
                    url: '{{route("flowertype.add")}}',
                    type: 'post',
                    data: $(this).serialize(),
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