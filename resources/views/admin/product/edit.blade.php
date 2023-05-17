@extends('admin.main')

@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<div class="card-body">
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="menu">Product's name</label>
            <div class="col-sm-10">
                <input type="text" name="name" value="{{$product->name}}" class="form-control" id="menu"
                    placeholder="Enter product's name">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="menu">Category</label>
            <div class="col-sm-10">
                <select class="form-control" name="menu_id" id="">
                    <option value="0"> Parent Category</option>
                    @foreach($menus as $menu)
                    <option value="{{ $menu->id }}" {{ $product->menu_id == $menu->id ? 'selected' : '' }}>
                        {{ $menu->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="menu">Price</label>
            <div class="col-sm-10">
                <input type="number" name="price" value="{{ $product->price }}" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="menu">Discount</label>
            <div class="col-sm-10">
                <input type="number" name="price_sale" value="{{ $product->price_sale }}" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="menu">Description</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="menu">Content</label>
            <textarea name="content" id="content" class="form-control">{{ $product->content }}</textarea>
        </div>
        <div class="row mb-3">
            <div class="input-group">
                <label class="col-sm-2 col-form-label" for="product">Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="upload">

                    <div class="mt-3" id="image_show">
                        <a href="{{ $product->thumb }}" target="_blank">
                            <img src="{{ $product->thumb }}" width="100px">
                        </a>
                    </div>
                    <input type="hidden" name="thumb" id="thumb">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-12">
                <label class="col-sm-2 col-form-label" for="product">Status</label>
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="1" name="status" id="status"
                        {{ $product->status == 1 ? ' checked=""' : '' }}>
                    Released <i class="input-helper"></i>&ensp; </label>
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="0" name="status" id="no_status"
                        {{ $product->status == 0 ? ' checked=""' : '' }}>
                    Not released <i class="input-helper"></i> &nbsp;</label>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-12">
                <label class="col-sm-2 col-form-label" for="menu">Active</label>
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="1" name="active" id="active"
                        {{ $product->active == 1 ? ' checked=""' : '' }}>
                    Yes <i class="input-helper"></i>&ensp; </label>
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="0" name="active" id="no_active"
                        {{ $product->active == 0 ? ' checked=""' : '' }}>
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