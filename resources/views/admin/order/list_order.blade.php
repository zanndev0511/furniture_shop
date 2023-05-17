@extends('admin.main')
@section('content')
<div class="card">
    <h5 class="card-header">Product Table</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>ID_Order</th>
                    <th>ID_Product</th>
                    <th>Product's name</th>
                    <th>Product's price</th>
                    <th>Quantity</th>
                    <th style="width: 100px">&nbsp;</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($order_details as $key => $order_detail)
                <tr>
                    <td>{{ $order_detail->id }}</td>
                    <td>{{ $order_detail->order_id }}</td>
                    <td>{{ $order_detail->product_id }}</td>
                    <td>{{ $order_detail->product_name }}</td>
                    <td>{{ $order_detail->product_price }}</td>
                    <td>{{ $order_detail->product_sale_quantity}}</td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow('{{$order_detail->id}}', '/admin/orders/destroy')">
                            <i class="bx bx-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card-footer clearfix">
    {!! $order_details->links("pagination::bootstrap-5") !!}
</div>
@endsection