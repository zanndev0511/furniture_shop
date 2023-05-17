@extends('admin.main')
@section('content')
<div class="card">
    <h5 class="card-header">Table</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Customer's name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Note</th>
                    <th style="width: 100px">&nbsp;</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($checkouts as $key => $checkout)
                <tr>
                    <td>{{ $checkout->id }}</td>
                    <td>{{ $checkout->address }}</td>
                    <td>{{ $checkout->phone }}</td>
                    <td>{{ $checkout->email }}</td>
                    <td>{{ $checkout->note }}</td>
                    <td>
                        <!-- /admin/products/edit/{{ $product->id }} -->
                        <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{ $checkout->id }}">
                            <i class="bx bx-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow('{{$checkout->id}}', '/admin/products/destroy')">
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
    {!! $checkouts->links("pagination::bootstrap-5") !!}
</div>
@endsection