<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Product\ProductAdminService;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Models\Product;

class SliderController extends Controller
{
    protected $slider;
    protected $product;

     public function __construct(SliderService $slider, ProductAdminService $product)
    {
        $this->slider = $slider;
        $this->product = $product;
    }
    
    public function create(){
        return view('admin.slider.add', [
            'title' => 'Add new slider',
            'products'=> $this->product->getProduct(),
        ]);
    }
    
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'thumb' => 'required',
            'url' => 'required',
        ]);

        $this->slider->insert($request);

        return redirect()->back();
    }

    public function index(){
        return view('admin.slider.list',[
            'title' => 'The list of sliders',
            'sliders' => $this->slider->get(),
            
        ]);
    }
    public function show(Slider $slider){
        return view('admin.slider.edit',[
            'title' => 'Edit slider',
            'slider' => $slider,
            'products'=> $this->product->getProduct(),
        ]);
    }

    public function update(Request $request, Slider $slider, Product $product){
        $this->validate($request,[
            'name' => 'required',
        ]);

        $result = $this->slider->update($request, $slider, $product);

        if($result){
            return redirect('/admin/sliders/list');
        }

        return redirect()->back();
    }

    public function destroy(Request $request){
        $result = $this->slider->destroy($request);

        if($result){
            return response()->json([
                'error'=> false,
                'message' => 'Delete successfully'
            ]);
        }
        return response()->json(['error'=> true ]);
    }
}