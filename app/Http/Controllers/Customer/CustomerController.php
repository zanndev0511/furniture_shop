<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Services\Customer\CustomerService;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Customer\Login_CustomerRequest;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }
    public function register(){
        return view('customer.register_customer',[
            'title' => 'Register',
            'customers' => $this->customerService->getAll(),
        ]);
    }

    public function store(Login_CustomerRequest $request){
        $data = array();
        $data['username'] = $request->input('username');
        $data['phone'] = $request->input('phone');
        $data['email'] = $request->input('email');
        $data['password'] = $request->input('password');

       
        Session::put('username', $request->input('username'));

        $customer_id = $this->customerService->getId($request);
        Session::put('id', $customer_id);
        $result = $this->customerService->insert($request);

        return redirect()->route('checkout');
    }

    public function login(){
        return view('customer.login', [
            'title' => 'Login to Check Out',
            'customers'=> $this->customerService->getAll(),
        ]);
    }
    public function login_store(Request $request){

        $result = Customer::where('username',$request->input('username'))->where('password',md5($request->input('password')))->first();
        // if (Auth::attempt(['customers' => $request->input('username'), 
        // 'password' => $request->input('password')], $request->input('remember'))) {
        //     return redirect()->route('checkout');
        // }
        // $data = array();
        // $id = Customer::orderByDesc('id')->insertGetId($data);

        
        if($result){
            
            Session::put('username', $request->input('username'));
            $customer_id = Customer::select('id')->where('username', $request->input('username'));
            Session::put('id', $customer_id);
            Session::put('id', $request->input('username'));
            return redirect()->route('main');
        }
        session()->flash('error', 'Username or password is incorrect');
        return redirect() ->back();
    }
}