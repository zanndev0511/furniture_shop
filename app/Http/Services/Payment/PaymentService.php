<?php
namespace App\Http\Services\Payment;


use App\Models\Payment;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class PaymentService{
    // public function getMenu(){
    //     return Category::where('active', 1)->get();
    // }

    public function getAll(){
        return Payment::orderByDesc('id')->get();
    }
    public function getId($request) {
        return Payment::select('id')->where('method', $request->method)->first();
    }

    public function insert($request)
    {
        if($request->input('payment_option')==1){
            $method = 'Pay by ATM';
        }else{
            $method = 'Pay by cash';
        }
        try {
            $request->except('_token');
            Payment::create([
                'method' => $method,
                'status' => 0,
            ]);

            Session::flash('success', 'Successfully');
        } catch (\Exception $err) {
            Session::flash('error',$err->getMessage());
            // Session::flash('error', 'Thêm Sản phẩm lỗi');
            Log::info($err->getMessage());
            return  false;
        }

        return  true;
    }

    public function update_payments($order, $request){
      

        try {
            $request->except('_token');
            $order->order_status = $request->input('order_status');
            $order->username = $request->input('username');
            $order->checkout_id = $request->input('checkout_id');
            $order->payment_id = $request->input('payment_id');
            $order->order_total = $request->input('order_total');
            $order->save();

            Session::flash('success', 'Update successfully');
        } catch (\Exception $err) {
            Session::flash('error',$err->getMessage());
            // Session::flash('error', 'Update fail');
            Log::info($err->getMessage());
            return  false;
        }

        return true;
    }

    public function get_edit_payment(){
        return Order::select('username','checkout_id', 'payment_id','order_total','order_status')->orderByDesc('id')->get();
    }
    
    public function destroy_payments($request){
        $id = (int) $request->input('id');

        $order = Order::where('id', $request->input('id'))->first();//first kiem tra co ton tai
        if($order){
            return Order::where('id',$id)->delete();
        }
        return false;
    }
}