<?php
namespace App\Http\Services\Cart;


use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartService{
    public function getCart(){
       return ShoppingCart::where('identifier',Session::get('username'))->orderByDesc('identifier');
    }  
}