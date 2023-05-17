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
            <label class="col-sm-2 col-form-label" for="category">Category's name</label>
            <div class="col-sm-10">
                <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="category"
                    placeholder="Enter category's name">
            </div>
        </div>

        <div class="row mb-3">
            <div class="input-group">
                <label class="col-sm-2 col-form-label" for="category">Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="upload">

                    <div class="mt-3" id="image_show">
                        <a href="{{ $category->thumb }}" target="_blank">
                            <img src="{{ $category->thumb }}" width="100px">
                        </a>
                    </div>
                    <input type="hidden" name="thumb" id="thumb">
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="category">Title</label>
            <div class="col-sm-10">
                <input type="text" name="title" value="{{ $category->title}}" class=" form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-12">
                <label class="col-sm-2 col-form-label" for="category">Active</label>
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="1" name="active" id="active"
                        {{ $category->active == 1 ? ' checked=""' : '' }}>
                    Yes <i class="input-helper"></i>&ensp; </label>
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="0" name="active" id="no_active"
                        {{ $category->active == 0 ? ' checked=""' : '' }}>
                    No <i class="input-helper"></i> &nbsp;</label>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Update</button>
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