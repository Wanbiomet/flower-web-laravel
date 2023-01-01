@extends('layouts.admin_layout')

@section('content_admin')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Customer
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
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($customer as $item)
                <tbody>
                    <tr data-expanded="true">
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        @if(isset($item->email))
                        <td>{{$item->email}}</td>
                        @else
                        <td style="color:black;">not update</td>
                        @endif
                        @if(isset($item->phone))
                        <td>{{$item->phone}}</td>
                        @else
                        <td style="color:black;">not update</td>
                        @endif
                        @if(isset($item->address))
                        <td>{{$item->address}}</td>
                        @else
                        <td style="color:black;">not update</td>
                        @endif
                        <td style="color:red;"><i style="font-size: 20px;" data-id="{{$item->flowertype_id}}" class='bx bx-x'></i></td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
