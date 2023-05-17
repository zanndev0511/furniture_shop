<?php
namespace App\Http\Services\Checkout;


use App\Models\Checkout;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutService{
    // public function getMenu(){
    //     return Category::where('active', 1)->get();
    // }

    public function getAll(){
        return Checkout::orderByDesc('id')->get();
    }
    public function getId($request) {
        return Checkout::select('id')->where('name', $request->name)->first();
    }

    public function insert($request)
    {
        try {
            $request->except('_token');
            Checkout::create([
                'name' => (string) $request->input('name'),
                'phone' => (string) $request->input('phone'),
                'email' => (string) $request->input('email'),
                'address' => (string) $request->input('address'),
                'note' => (string) $request->input('note'),
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