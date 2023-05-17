<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Checkout;
use App\Http\Services\Checkout\CheckoutService;
use App\Http\Services\Customer\CustomerService;
use App\Http\Services\Payment\PaymentService;
use App\Http\Services\Payment\OrderService;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Payment;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    protected $checkoutService;
    protected $customerService;
    protected $paymentService;
    protected $orderService;
    public function __construct(CheckoutService $checkoutService, CustomerService $customerService, PaymentService $paymentService, OrderService $orderService)
    {
        $this->checkoutService = $checkoutService;
        $this->customerService = $customerService;
        $this->paymentService = $paymentService;
        $this->orderService = $orderService;
    }
    public function checkout(){
       return view('checkout.checkout',[
        'title' => 'Check out',
        'checkouts' =>$this->checkoutService->getAll(),
        'orders' =>$this->orderService->getAll(),
        
       ]);
    }
    public function save_checkout(Request $request){
        $data_checkout = array();

        $data_checkout['name'] = $request->input('name');
        $data_checkout['phone'] = $request->input('phone');
        $data_checkout['email'] = $request->input('email');
        $data_checkout['address'] = $request->input('address');
        $data_checkout['note'] = $request->input('note');

        

        
        Session::put('name',$request->input('name'));
        Session::put('phone',$request->input('phone'));
        Session::put('email',$request->input('email'));
        Session::put('address',$request->input('address'));

        $checkouts =$this->checkoutService->getId($request);

        $result = $this->checkoutService->insert($request);
        
        Session::put('checkout_id',$checkouts->id);
        
        
        return redirect()->route('payment');
    }
   
    public function payment(){
        return view('checkout.payment',[
            'title'=>'Payment',
        ]);
    }
    public function log_out(){
        Session::flush();
        return redirect()->route('login_customer');
    }
    public function order(Request $request){
        $data_payment = array();

        $data_payment['method'] = $request->input('payment_option');
        $data_payment['status'] = 0;

        if($request->input('payment_option')==1){
            $data_payment['method'] = 'Pay by ATM';
        }else{
           $data_payment['method'] = 'Pay by cash';
        }
       $payment_id = Payment::orderByDesc('id')->insertGetId($data_payment);
    
        Session::put('payment_id',$payment_id);

        $order_data = array();

        $order_data['username'] = Session::get('username');
        $order_data['checkout_id'] = Session::get('checkout_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 0;
        $order_id = Order::orderByDesc('id')->insertGetId($order_data);
        Session::put('order_id',$order_id);

        $contents = Cart::content();
        foreach($contents as $content){
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $content->id;
            $order_d_data['product_name'] = $content->name;
            $order_d_data['product_price'] = $content->price;
            $order_d_data['product_sale_quantity'] = $content->qty;
            $order_d_id = OrderDetail::orderByDesc('id')->insert($order_d_data);
        } 
        
        return redirect()->route('confirm');
    }

    public function confirm(){
        return view('checkout.confirm',[
            'title' => 'Confirm',
        ]);
    }
    public function index_orders(){
        return view('admin.order.list_order',[
            'title' => 'List of orders',
            'order_details' => $this->orderService->getAll_d(),
        ]);
    }
    public function index_payments(){
        return view('admin.order.payment',[
            'title' => 'List of payments',
            'orders' => $this->orderService->get_payment(),
        ]);
    }
    public function show_payments(Order $order)
    {
         return view('admin.order.edit_order',[
            'title' => 'Edit Order',
            'order' => $order,
            'orders' => $this->orderService->get_edit_payment(),
        ]);
    }
    public function destroy_orders(Request $request)
    {
        $result = $this->orderService->destroy_orders($request);
        if($result){
            return response()->json([
                'error'=> false,
                'message' => 'Delete successfully'
            ]);//response trar ve mot cai view
        }

        return response()->json([
                'error'=> true,

            ]);//response trar ve mot cai view
    }
   
    public function destroy_payments(Request $request)
    {
        $result = $this->orderService->destroy_payments($request);
        if($result){
            return response()->json([
                'error'=> false,
                'message' => 'Delete successfully'
            ]);//response trar ve mot cai view
        }

        return response()->json([
                'error'=> true,

            ]);//response trar ve mot cai view
    }
}