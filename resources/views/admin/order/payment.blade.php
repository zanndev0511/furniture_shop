@extends('admin.main')
@section('content')
<div class="card">
    <h5 class="card-header">Table</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Username</th>
                    <th>ID_Checkout</th>
                    <th>ID_Payment</th>
                    <th>Order_total</th>
                    <th>Order_status</th>
                    <th style="width: 100px">&nbsp;</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($orders as $key => $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->username }}</td>
                    <td>{{ $order->checkout_id }}</td>
                    <td>{{ $order->payment_id}}</td>
                    <td>{{ $order->order_total }}</td>
                    <td>{!! \App\Helpers\Helper::order_status($order->order_status) !!}</td>

                    <td>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow('{{$order->id}}', '/admin/payments/destroy')">
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
    {!! $orders->links("pagination::bootstrap-5") !!}
</div>
@endsection