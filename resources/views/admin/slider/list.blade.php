@extends('admin.main')
@section('content')
<div class="card">
    <h5 class="card-header">Slider Table</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Slider's name</th>
                    <th>URL</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Active</th>
                    <th>Update</th>
                    <th style="width: 100px">&nbsp;</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($sliders as $key => $slider)
                <tr>
                    <td>{{ $slider->id }}</td>
                    <td>{{ $slider->name }}</td>
                    <td>{{ $slider->url }}</td>
                    <td><a href="{{$slider->thumb}}" target="_blank"><img src="{{$slider->thumb}}" height="40px"></a>
                    </td>
                    <td>{{ $slider->title }}</td>
                    <td>{{ $slider->description}}</td>
                    <td>{!! \App\Helpers\Helper::active($slider->active) !!}</td>
                    <td>{{ $slider->updated_at }}</td>
                    <td>
                        <!-- /admin/sliders/edit/{{ $slider->id }} -->
                        <a class="btn btn-primary btn-sm" href="/admin/sliders/edit/{{ $slider->id }}">
                            <i class="bx bx-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow('{{$slider->id}}', '/admin/sliders/destroy')">
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
    <!-- phantrang -->
    {!! $sliders->links("pagination::bootstrap-5") !!}
</div>
@endsection