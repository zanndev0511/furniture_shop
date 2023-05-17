<?php

namespace App\Http\Controllers;

use App\Http\Services\BrandService;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\Deals\DealsService;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use App\Models\Product;

class HomeController extends Controller
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
    public function index(){
        return view('main',[
            'title' => 'Welcome to Nodoor shop',
            'menus'=>$this->menu->show(),
            'sliders'=>$this->slider->show(),
            'categories' => $this->category->getCategory(),
            'products' => $this->product->get(),
            'deals'=> $this->deals->getAll(),
        ]);
    }
    public function search(Request $request){

        $product = Product::where('name','like', '%'. $request->input('search_input'). '%')->paginate(9);
       
        if($product){
            return view('category',[
                'title' => 'Search result: '.$request->input('search_input'),
                'categories' => $this->category->getCate(),
                'menus'=>$this->menu->menuCate(),
                'products' => $product,
            ]);
        }
        session()->flash('error', 'Fail');
        return redirect() ->back();
    }
}