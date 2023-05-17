<?php
namespace App\Http\Services\Customer;


use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class CustomerService{
    // public function getMenu(){
    //     return Category::where('active', 1)->get();
    // }
    // public function getUsername(){
       
    // }
    public function getAll(){
        return Customer::orderByDesc('id')->get();
    }

    public function insert($request)
    {
        try {
            $request->except('_token');
            Customer::create([
                'username' => (string) $request->input('username'),
                'phone' => (string) $request->input('phone'),
                'email' => (string) $request->input('email'),
                'password' => md5((string) $request->input('password')),
            ]);

            Session::flash('success', 'Create account successfully');
        } catch (\Exception $err) {
            Session::flash('error',$err->getMessage());
            // Session::flash('error', 'Thêm Sản phẩm lỗi');
            Log::info($err->getMessage());
            return  false;
        }

        return  true;
    }
    public function getId($request) {
        return Customer::select('id')->where('username', $request->username)->first();
    }
    
    
    // public function update($category, $request){
      

    //     try {
    //         $request->except('_token');
           
    //             $category->name = (string) $request->input('name');
    //             $category->title = (string) $request->input('title');
    //             $category->active = (string) $request->input('active');
    //             if($request->input('thumb') != '' ){
    //                 $category->thumb = (string)  $request->input('thumb');
    //             }
    
    //         $category->save();

    //         Session::flash('success', 'Update a new category successfully');
    //     } catch (\Exception $err) {
    //         // Session::flash('error',$err->getMessage());
    //         Session::flash('error', 'Update a new category fail');
    //         Log::info($err->getMessage());
    //         return  false;
    //     }

    //     return true;
    // }

}