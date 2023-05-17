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
            <label class="col-sm-2 col-form-label" for="product">Product's name</label>
            <div class="col-sm-10">
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="product"
                    placeholder="Enter product's name">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="product">Category</label>
            <div class="col-sm-10">
                <select class="form-control" name="menu_id">
                    <option value="0"> Parent category</option>
                    @foreach($menus as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="product">Price</label>
            <div class="col-sm-10">
                <input type="number" value="{{ old('price') }}" name="price" value="" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="product">Discount</label>
            <div class="col-sm-10">
                <input type="number" value="{{ old('price_sale')}}" name=" price_sale" value="" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="product">Description</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="product">Content</label>
            <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
        </div>
        <div class="row mb-3">
            <div class="input-group">
                <label class="col-sm-2 col-form-label" for="product">Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="upload">

                    <div class="mt-3" id="image_show">

                    </div>
                    <input type="hidden" name="thumb" id="thumb">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-12">
                <label class="col-sm-2 col-form-label" for="product">Status</label>
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="1" name="status" id="status">
                    Released <i class="input-helper"></i>&ensp; </label>
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="0" name="status" id="status" checked="">
                    Not released <i class="input-helper"></i> &nbsp;</label>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-12">
                <label class="col-sm-2 col-form-label" for="product">Active</label>
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