@extends('admin.main')

@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<div class="card-body">
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.alert')
        <div class="row mb-3">
            <div class="col-sm-10">
                <input type="text" name="username" for="order" value="{{old('username')}}" class="form-control"
                    id="username">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-10">
                <input type="hidden" name="checkout_id" for="order" value="{{$order->checkout_id}}" class="form-control"
                    id="checkout_id">
            </div>
        </div>
        <div class="row mb-3">
            <input type="hidden" name="payment_id" for="order" value="{{$order->payment_id}}" class="form-control"
                id="payment_id">
        </div>
        <div class="row mb-3">
            <input type="hidden" name="order_total" for="order" value="{{$order->order_total}}" class="form-control"
                id="order_total">
        </div>
        <div class="row mb-3">
            <div class="col-sm-12">
                <label class="col-sm-2 col-form-label" for="order">Status</label>
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="1" name="order_status" id="status"
                        {{ $order->order_status == 1 ? ' checked=""' : '' }}>
                    Paid <i class="input-helper"></i>&ensp; </label>
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="0" name="order_status" id="no_status"
                        {{ $order->order_status == 0 ? ' checked=""' : '' }}>
                    Unpaid <i class="input-helper"></i> &nbsp;</label>
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