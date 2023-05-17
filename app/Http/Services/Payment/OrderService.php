<?php
namespace App\Http\Services\Payment;


use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderService{
    // public function getMenu(){
    //     return Category::where('active', 1)->get();
    // }

    public function getAll(){
        return Order::orderByDesc('id')->get();
    }
    public function get_payment(){
        return Order::orderByDesc('id')->paginate(9);
    }
    public function get_edit_payment(){
        return Order::select('username','checkout_id', 'payment_id','order_total','order_status')->orderByDesc('id')->get();
    }
    public function getAll_d(){
        return OrderDetail::orderByDesc('id')->paginate(9);
    }

    public function insert($request)
    {
        
        try {
            $contents = Cart::content();
            foreach($contents as $content){
                $request->except('_token');
                Order::create([
                    'username' => Session::get('username'),
                    'checkout_id' => Session::get('checkout_id'),
                    'payment_id' => Session::get('payment_id'),
                    'order_total' => Cart::total(),
                    'order_status' => 0,
                ]);
            }
            Session::flash('success', 'Successfully');
        } catch (\Exception $err) {
            Session::flash('error',$err->getMessage());
            // Session::flash('error', 'Thêm Sản phẩm lỗi');
            Log::info($err->getMessage());
            return  false;
        }

        return  true;
    }
    public function insert_d($request){
         try {
            $contents = Cart::content();
            foreach($contents as $content){
                $request->except('_token');
                OrderDetail::create([
                    'order_id' => Session::get('order_id'),
                    'product_id' => $content->id,
                    'product_name' => $content->price,
                    'product_price' => Cart::total(),
                    'product_sale_quantity' => $content->qty,
                ]);
            }
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
    public function destroy_orders($request){
        $id = (int) $request->input('id');

        $order = OrderDetail::where('id', $request->input('id'))->first();//first kiem tra co ton tai
        if($order){
            return OrderDetail::where('id',$id)->delete();
        }
        return false;
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