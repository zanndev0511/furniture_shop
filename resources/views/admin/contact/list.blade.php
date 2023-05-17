@extends('admin.main')
@section('content')
<div class="card">
    <h5 class="card-header">Menu Table</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Update</th>
                    <th style="width: 100px">&nbsp;</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($contacts as $key => $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email}}</td>
                    <td>{{ $contact->phone}}</td>
                    <td>{{ $contact->message}}</td>
                    <td>{{$contact->updated_at}}</td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow('{{$contact->id}}', '/admin/contacts/destroy')">
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
    {!! $contacts->links("pagination::bootstrap-5") !!}
</div>
@endsection