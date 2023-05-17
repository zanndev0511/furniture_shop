<?php

namespace App\Http\Services\Slider;

use App\Models\Slider;
use App\Models\SliderProduct;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderService{
    public function insert($request){
        try {
            Slider::create([
            'name' => (string) $request->input('name'),
            'url'=> (string)  $request->input('url'), 
            'thumb' => (string)  $request->input('thumb'), 
            'title' => (string)  $request->input('title'), 
            'description' => (string)  $request->input('description'), 
            'sort_by' => (string)  $request->input('sort_by'), 
            'active' => (string) $request->input('active'),
         ]);

            Session::flash('success', 'Successfully');
        } catch (\Exception $error) {
            Session::flash('error', 'Fail');

            Log::info($error->getMessage());
            return false;
        }  
        return true;
    }

    public function get(){
        return Slider::orderByDesc('id')->paginate(8);
    }

    public function update($request, $slider,){
        try{
            $slider->name = (string) $request->input('name');
            $slider->url = (string)  $request->input('url'); 
            if($request->input('thumb')!=''){
                $slider->thumb = (string)  $request->input('thumb');  
            }
            
            $slider->title = (string)  $request->input('title'); 
            $slider->description = (string)  $request->input('description');
            $slider->sort_by = (string)  $request->input('sort_by'); 
            $slider->active = (string) $request->input('active');

            $slider->save();
               
            Session::flash('success','Update successfully');
        } catch (\Exception $error){
            Session::flash('error',$error->getMessage());

            Log::info($error->getMessage());

            return false;
        }
    
        return true;
    }

    public function destroy($request){
        $slider = Slider::where('id', $request->input('id'))->first();
        if($slider){
            $path = str_replace('storage', 'public', $slider->thumb);
            Storage::delete($path);
            $slider->delete(); 
            return true;
        }
        return false;
    }

    public function show(){
        return Slider::select('name','url','thumb','active','title','description','url')->paginate(8);
    }
}