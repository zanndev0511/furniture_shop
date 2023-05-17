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
            <label class="col-sm-2 col-form-label" for="deal">Deals's name</label>
            <div class="col-sm-10">
                <input type="text" name="name" value="{{ $deal->name }}" class=" form-control">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="deal">Title</label>
            <div class="col-sm-10">
                <textarea name="title" class="form-control">{{ $deal->title }}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="deal">Description</label>
            <div class="col-sm-10">
                <textarea name="description" id="description" class="form-control">{{ $deal->description }}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="deal">Days</label>
            <div class="col-sm-10">
                <input type="number" name="days" value="{{ $deal->days }}" class=" form-control">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="deal">Hours</label>
            <div class="col-sm-10">
                <input type="number" name="hours" value="{{ $deal->hours }}" class=" form-control">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="deal">Minutes</label>
            <div class="col-sm-10">
                <input type="number" name="mins" value="{{ $deal->mins }}" class=" form-control">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="deal">Seconds</label>
            <div class="col-sm-10">
                <input type="number" name="secs" value="{{ $deal->secs }}" class=" form-control">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="deal">URL</label>
            <div class="col-sm-10">
                <input type="text" name="url" value="{{ $deal->url }}" class=" form-control">
            </div>
        </div>

        <div class="row mb-3">
            <div class="input-group">
                <label class="col-sm-2 col-form-label" for="deal">Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="upload">

                    <div class="mt-3" id="image_show">
                        <a href="{{ $deal->thumb }}" target="_blank">
                            <img src="{{ $deal->thumb }}" width="100px">
                        </a>
                    </div>
                    <input type="hidden" name="thumb" id="thumb">
                </div>
            </div>

        </div>

        <div class="row mb-3">
            <div class="col-sm-12">
                <label class="col-sm-2 col-form-label" for="deal">Active</label>
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="1" name="active" id="active"
                        {{ $deal->active == 1 ? ' checked=""' : '' }}>
                    Yes <i class="input-helper"></i>&ensp; </label>
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="0" name="active" id="no_active"
                        {{ $deal->active == 0 ? ' checked=""' : '' }}>
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