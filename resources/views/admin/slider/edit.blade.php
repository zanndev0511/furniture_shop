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
            <label class="col-sm-2 col-form-label" for="slider">Slider's name</label>
            <div class="col-sm-10">
                <input type="text" name="name" value="{{$slider->name}}" class=" form-control">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="slider">URL</label>
            <div class="col-sm-10">
                <input type="text" name="url" value="{{$slider->url}}" class=" form-control">
            </div>
        </div>

        <div class="row mb-3">
            <div class="input-group">
                <label class="col-sm-2 col-form-label" for="slider">Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="upload">

                    <div class="mt-3" id="image_show">
                        <a href="{{ $slider->thumb }}" target="_blank">
                            <img src="{{ $slider->thumb }}" width="100px">
                        </a>
                    </div>
                    <input type="hidden" name="thumb" id="thumb">
                </div>
            </div>

        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="sliders">Title</label>
            <div class="col-sm-10">
                <textarea name="title" class="form-control">{{$slider->title}}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="sliders">Description</label>
            <div class="col-sm-10">
                <textarea name="description" id="description" class="form-control">{{$slider->description}}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="slider">Sort</label>
            <div class="col-sm-10">
                <input type="number" name="sort_by" value="{{ $slider->sort_by}}" class=" form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-12">
                <label class="col-sm-2 col-form-label" for="slider">Active</label>
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="1" name="active" id="active"
                        {{ $slider->active == 1 ? ' checked=""' : '' }}>
                    Yes <i class="input-helper"></i>&ensp; </label>
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="0" name="active" id="no_active"
                        {{ $slider->active == 0 ? ' checked=""' : '' }}>
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