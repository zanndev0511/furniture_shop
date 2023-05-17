<?php
namespace App\Http\Services\Category;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class CategoryService{
    // public function getMenu(){
    //     return Category::where('active', 1)->get();
    // }

    public function getAll(){
        return Category::distinct()->select('id','name')->get();
    }

    public function insert($request)
    {
        try {
            $request->except('_token');
            Category::create([
                'name' => (string) $request->input('name'),
                'title' => (string) $request->input('title'),
                'active' => (string) $request->input('active'),
                'thumb' => (string)  $request->input('thumb'),
            ]);

            Session::flash('success', 'Add a new category successfully');
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
        return Category::select('id', 'name', 'thumb', 'title','active','updated_at')
            ->orderByDesc('id')->paginate(6);
    }
    public function getCategory()
    {
        return Category::select('id', 'name', 'thumb', 'title','active')
            ->orderByDesc('id')->limit(6)->get();
    }
    public function getCate()
    {
        $category = collect(Category::orderByDesc('name')->get());
        $categoryUnique = $category->unique('name');
        $categoryUnique->values()->all();
        return $categoryUnique;
    }

    public function destroy($request){
        $id = (int) $request->input('id');
        try {
            $category = Category::where('id', $request->input('id'))->first();//first kiem tra co ton tai
            if($category){
                return Category::where('id', $id)->delete();
                
            }
        } catch (\Exception $err) {
            Session::flash('error',$err->getMessage());
        }
        
        return false;
    }
    public function update($category, $request){
      

        try {
            $request->except('_token');
           
                $category->name = (string) $request->input('name');
                $category->title = (string) $request->input('title');
                $category->active = (string) $request->input('active');
                if($request->input('thumb') != '' ){
                    $category->thumb = (string)  $request->input('thumb');
                }
    
            $category->save();

            Session::flash('success', 'Update a new category successfully');
        } catch (\Exception $err) {
            // Session::flash('error',$err->getMessage());
            Session::flash('error', 'Update a new category fail');
            Log::info($err->getMessage());
            return  false;
        }

        return true;
    }

    // public function getProduct(){
        
    //     return Product::distinct()->select('name')->get();
    // }
}