@extends('admin.main')
@section('content')
<div class="card">
    <h5 class="card-header">Slider Table</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Deal's name</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Countdown</th>
                    <th>URL</th>
                    <th>Image</th>
                    <th>Active</th>
                    <th>Update</th>
                    <th style="width: 100px">&nbsp;</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($deals as $key => $deal)
                <tr>
                    <td>{{ $deal->id }}</td>
                    <td>{{ $deal->name }}</td>
                    <td>{{ $deal->title }}</td>
                    <td>{{ $deal->description}}</td>
                    <td>{{ $deal->days}} : {{ $deal->hours}} : {{ $deal->mins}} : {{ $deal->secs}}</td>
                    <td>{{ $deal->url }}</td>
                    <td><a href="{{$deal->thumb}}" target="_blank"><img src="{{$deal->thumb}}" height="40px"></a>
                    </td>
                    <td>{!! \App\Helpers\Helper::active($deal->active) !!}</td>
                    <td>{{ $deal->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/deals/edit/{{ $deal->id }}">
                            <i class="bx bx-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow('{{$deal->id}}', '/admin/deals/destroy')">
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
    {!! $deals->links("pagination::bootstrap-5") !!}
</div>
@endsection