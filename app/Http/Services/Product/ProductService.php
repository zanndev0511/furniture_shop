<?php
namespace App\Http\Services\Product;


use App\Models\Product;

class ProductService{
    public function get(){
        return Product::distinct()->select('id','name','price','price_sale','thumb','status', 'active','description')->orderByDesc('id')->limit(8)->get();
    }
    public function filterPrice($request){
        $query = Product::distinct()->select('id','name','price','price_sale','thumb','status', 'active','description')->orderByDesc('id')->paginate(9);
        
        if($request->input('price')){
            switch ($request->input('price')){
                case '1':
                    return Product::where('total_price','<',200)->paginate(9);
                    break;
                case '2':
                    return Product::whereBetween('total_price', [200 , 400])->paginate(9);
                    break;
                case '3':
                    return Product::whereBetween('total_price', [400 , 600])->paginate(9);
                    break;
                case '4':
                    return Product::where('total_price', '>' ,600)->paginate(9);
                    break;
            }

            
        }
        if($request->input('menu')){
            request()->except('price');
            return Product::where('menu_id', $request->input('menu'))->paginate(9);
        }
        return $query;
       
    }
    public function getProduct(){
        return Product::distinct()->select('id','name','price','price_sale','thumb','status', 'active','description')->orderByDesc('id')->paginate(9);
    }
    public function getTitle($id){
        return Product::where('id', $id)->where('active',1)->firstOrFail();
    }
    public function getProductDetail($id){
        return Product::where('id', $id)->firstOrFail();
    }
    // public function filterPrice($request){
    //     $products = Product::orderByDesc('id')->get();
    //     if($request->input('price')){
    //         dd($request->input('price'));
    //     }
    //     switch ($request->input('price')){
    //         case '1':
    //             redirect()->back();
    //           return  response()->json(Product::where('price','<', 2)->get());
                 
    //             break;
    //     }
    //     return $products;
    // }
    
}