<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\BrandService;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\Deals\DealsService;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Product\ProductService;

class MenuController extends Controller
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
    public function index(Request $request, $id, $slug = '')
    {
        $menu = $this->menu->getId($id);

        $products = $this->menu->getProduct($menu, $request);

        return view('menu', [
            'title' => $menu->name,
            'products' => $products,
            'menu'  => $menu,
            'categories' => $this->category->getCate(),
            'menus'=>$this->menu->menuCate(),
            'products'=>$this->product->getProduct(),
        ]);                                                      
    }
}