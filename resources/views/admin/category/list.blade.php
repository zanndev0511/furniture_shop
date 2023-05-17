@extends('admin.main')
@section('content')
<div class="card">
    <h5 class="card-header">Product Table</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Category's name</th>
                    <th>Image</th>
                    <th>Active</th>
                    <th>Update</th>
                    <th style="width: 100px">&nbsp;</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($categories as $key => $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td><a href="{{$category->url}}" target="_blank"><img src="{{$category->thumb}}" height="40px"></a>
                    </td>
                    <td>{!! \App\Helpers\Helper::active($category->active) !!}</td>
                    <td>{{$category->updated_at}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/categories/edit/{{ $category->id }}">
                            <i class="bx bx-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow('{{$category->id}}', '/admin/categories/destroy')">
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
    {!! $categories->links("pagination::bootstrap-5") !!}
</div>
@endsection