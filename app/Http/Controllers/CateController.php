<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\Deals\DealsService;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;

class CateController extends Controller
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
    public function index(Request $request)
    {
        // $menu = $this->menu->getId($id);
        // $products = $this->menu->getProduct($menu, $request);
        return view('category',[
            'title' => 'Welcome to Nodoor shop',
            'categories' => $this->category->getCate(),
            'menus'=>$this->menu->menuCate(),
            'products'=>$this->product->filterPrice($request),
        ]);
    }
    public function store(Request $request){
   
        // return view('category',[
        //     'title' => 'Welcome to Nodoor shop',
        //     'categories' => $this->category->getCate(),
        //     'menus'=>$this->menu->menuCate(),
        // ]);
    }
}