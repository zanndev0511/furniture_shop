@extends('admin.main')
@section('content')
<div class="card">
    <h5 class="card-header">Menu Table</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Menu's name</th>
                    <th>Category</th>
                    <th>Active</th>
                    <th>Update</th>
                    <th style="width: 100px">&nbsp;</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($menus as $key => $menu)
                <tr>
                    <td>{{ $menu->id }}</td>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->category }}</td>
                    </td>
                    <td>{!! \App\Helpers\Helper::active($menu->active) !!}</td>
                    <td>{{$menu->updated_at}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/menu/edit/{{ $menu->id }}">
                            <i class="bx bx-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow('{{$menu->id}}', '/admin/menu/destroy')">
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
    {!! $menus->links("pagination::bootstrap-5") !!}
</div>
@endsection