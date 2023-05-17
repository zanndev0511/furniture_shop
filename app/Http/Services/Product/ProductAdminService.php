<?php
namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ProductAdminService{
    public function getMenu(){
        return Menu::where('active', 1)->get();
    }

    public function getAll(){
        return Product::distinct()->select('name')->paginate(8);
    }

    protected function isValidPrice($request)
    {
        if ($request->input('price') != 0 && $request->input('price_sale') != 0
            && $request->input('price_sale') >= $request->input('price')
        ) {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        if ($request->input('price_sale') != 0 && (int)$request->input('price') == 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }

        return  true;
    }

    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $request->except('_token');
            Product::create([
                'name' => (string) $request->input('name'),
                'menu_id' => (int) $request->input('menu_id'),
                'price' => (int) $request->input('price'),
                'price_sale' => (int) $request->input('price_sale'),
                'total_price'=> (int)($request->input('price') - $request->input('price_sale')),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'status' => (string) $request->input('status'),
                'active' => (string) $request->input('active'),
                'thumb' => (string) $request->input('thumb'),

            ]);

            Session::flash('success', 'Thêm Sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error',$err->getMessage());
            // Session::flash('error', 'Thêm Sản phẩm lỗi');
            Log::info($err->getMessage());
            return  false;
        }

        return  true;
    }
    
    public function get()
    {
        return Product::with('menu')
            ->orderByDesc('id')->paginate(8);
    }
    public function getCate()
    {
        return Product::orderByDesc('id');
    }
    public function getProHasCat()
    {
        return Product::select('id','name','menu_id','price','price_sale','total_price','thumb','status','active')
           ->orderByDesc('id')->paginate(8);
    }

    public function destroy($request){
        $id = (int) $request->input('id');

        $product = Product::where('id', $request->input('id'))->first();

        if($product){
            return Product::where('id',$id)->delete();
        }

    }
    public function update($product, $request){
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $request->except('_token');
           
                $product->name = (string) $request->input('name');
                $product->menu_id = (string) $request->input('menu_id');
                $product->price = (int) $request->input('price');
                $product->price_sale = (int) $request->input('price_sale');
                $product->total_price = (int) ($request->input('price') - $request->input('price_sale'));
                $product->description = (string) $request->input('description');
                $product->content = (string) $request->input('content');
                $product->status = (string) $request->input('status');
                $product->active = (string) $request->input('active');
                if($request->input('thumb') != '' ){
                     $product->thumb = (string) $request->input('thumb');
                }
               
            $product->save();

            Session::flash('success', 'Thêm Sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error',$err->getMessage());
            // Session::flash('error', 'Thêm Sản phẩm lỗi');
            Log::info($err->getMessage());
            return  false;
        }

        return true;
    }

    public function getProduct(){
        
        return Product::distinct()->select('name')->paginate(8);
    }
}