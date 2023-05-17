<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Cart\CartService;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Category;
use App\Models\Carts;
use App\Models\Customer;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\Deals\DealsService;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use App\Models\ShoppingCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;
    protected $category;
    protected $deals;
    protected $cart;

    public function __construct(SliderService $slider, MenuService $menu, ProductService $product, CategoryService $category, DealsService $deals, CartService $cart)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
        $this->category = $category;
        $this->deals = $deals;
        $this->cart = $cart;
    }
    public function add(Request $request){
       
        $qty = (int)$request->input('qty');
        $product_id = (int)$request->input('product_id');

      
        $product = Product::where('id',$product_id)->orderByDesc('id')->first();

        $data['id'] = $product_id;
        $data['qty'] = $qty;
        $data['name'] = $product->name;
        $data['price'] = $product->price;
        $data['weight'] = 123;
        $data['options']['image'] = $product->thumb;

        Cart::add($data)->associate('ShoppingCart');
        Cart::store(rand());

        return Redirect::to('/show_cart');
        
    }

    public function show(ShoppingCart $shoppingCart)
    {
        $category = Category::select('id', 'name', 'thumb', 'title','active')->get();
        return view('cart', [
            'title' => 'Cart',
            'shoppingcart'=> $shoppingCart,
        ]);
    }
    public function destroy($rowId)
    {
        Cart::update($rowId,0);

        return redirect()->back();
    }
    public function update(Request $request)
    {
       $rowId = $request->input('rowID_cart');
       $qty = $request->input('quanty');

       echo $qty;

       Cart::update($rowId, $qty);

        return redirect()->back();
    }
}