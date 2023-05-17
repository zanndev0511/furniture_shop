<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\BrandService;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\Deals\DealsService;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Product\ProductService;

class ProductDetailController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;
    protected $category;
    protected $deals;

    public function __construct(SliderService $slider, MenuService $menu, ProductService $product, CategoryService $category, DealsService $deals)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
        $this->category = $category;
        $this->deals = $deals;
    }
    public function index(Request $request, $id, $slug = ''){
        $product = $this->product->getProductDetail($id);
         return view('productDetail', [
            'title' => $this->product->getTitle($id)->name,
            'product' => $product,
            'categories' => $this->category->getCate(),
            'menus'=>$this->menu->menuCate(),
            'products'=>$this->product->getProduct(),
        ]);       
    }
}