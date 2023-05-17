@extends('admin.main')

@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<div class="card-body">
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            @include('admin.alert')
            <label class="col-sm-2 col-form-label" for="menu">Menu's name</label>
            <div class="col-sm-10">
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="menu"
                    placeholder="Enter the menu's name">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="menu">Category</label>
            <div class="col-sm-10">
                <select class="form-control" name="category">
                    <option value="0"> Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="menu">Description</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="menu">Content</label>
            <textarea name="content" id="content" class="form-control"></textarea>
        </div>

        <div class="row mb-3">
            <div class="col-sm-12">
                <label class="col-sm-2 col-form-label" for="menu">Active</label>
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="1" name="active" id="active">
                    Yes <i class="input-helper"></i>&ensp; </label>
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="0" name="active" id="no_active" checked="">
                    No <i class="input-helper"></i> &nbsp;</label>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('footer')
<script>
CKEDITOR.replace('content');
</script>
@endsection