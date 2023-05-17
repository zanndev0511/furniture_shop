<?php
namespace App\Http\Services\Menu;

use App\Models\Menu;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class MenuService{
    public function getParent(){
        return Menu::where('parent_id',0)->get();
    }
    public function getAll(){
        return Menu::orderbyDesc('id')->get();
    }

    public function getMenu(){
        return Menu::orderbyDesc('id')->paginate(8);
    }

    public function create($request){
        // return Menu::create([]);
        try{
            Menu::create([
                'name' => (string) $request->input('name'),
                'category' => (string) $request->input('category'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                // 'url' => (string) $request->input('url'),
                'active' => (string) $request->input('active'),
                // 'slug' => Str::slug($request->input('name'),'-'),
            ]);

            Session::flash('success','Successfully');
        }catch(\Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }
    public function destroy($request){
        $id = (int) $request->input('id');

        $menu = Menu::where('id', $request->input('id'))->first();//first kiem tra co ton tai
        if($menu){
            return Menu::where('id',$id)->delete();
        }
        return false;
    }
    public function update($request, $menu) : bool
    {
        
       
        // $menu->category = (string) $request->input('category');
        
        $menu->fill($request->input()); //quet toan bo thong tin request da len
                $menu->save();

        // $menu->name = (string)$request->input('name');
        // $menu->description = (string)$request->input('description');
        // $menu->content = (string)$request->input('content');

        // $menu->active = (string)$request->input('active');
        // $menu->save();

        Session::flash('success', 'Update successfully');

        return true;
    }
    public function show(){
        return Menu::distinct()->select('name', 'active')->get();
        // Product::distinct()->select('brands', 'active')->get();
    }
    public function getId($id){
        return Menu::where('id', $id)->where('active',1)->firstOrFail();
    }
    public function menuCate(){
         return Menu::select('id','name','category', 'active')->get();
    }

    public function getProduct($menu, $request){
        $query = $menu->products()
        ->select('id','name','price','price_sale','thumb')
        ->where('active', 1);
        
        if($request->input('price')){
            $query->oderBy('price', $request->input('price'));
        }
        $query->orderbyDesc('id')
        ->paginate(6);

    }
}