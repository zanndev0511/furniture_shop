@extends('admin.main')
@section('content')
<div class="card">
    <h5 class="card-header">Product Table</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Product's name</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Total Price </th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Active</th>
                    <th>Update</th>
                    <th style="width: 100px">&nbsp;</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($products as $key => $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->price_sale }}%</td>
                    <td>{{ $product->total_price }}</td>
                    <td><a href="{{$product->thumb}}" target="_blank"><img src="{{$product->thumb}}" height="40px"></a>
                    <td>{!! \App\Helpers\Helper::status($product->status) !!}</td>
                    <td>{!! \App\Helpers\Helper::active($product->active) !!}</td>
                    <td>
                        <!-- /admin/products/edit/{{ $product->id }} -->
                        <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{ $product->id }}">
                            <i class="bx bx-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow('{{$product->id}}', '/admin/products/destroy')">
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
    {!! $products->links("pagination::bootstrap-5") !!}
</div>
@endsection