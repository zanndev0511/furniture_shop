<?php
namespace App\Http\Services\Deals;

use App\Models\Deals;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Type\Integer;

class DealsService{
    // public function getMenu(){
    //     return Category::where('active', 1)->get();
    // }

    public function getAll(){
        return Deals::distinct()->select('id', 'name', 'url', 'thumb', 'title','description','days','hours','mins','secs','active','updated_at')->get();
    }

    protected function isValidTime($request)
    {
        if ((int)$request->input('days') > 30 && (int)$request->input('days') < 0 ) {
            Session::flash('error', 'Time is invalid. Please try again!');
            return false;
        }
        if ((int)$request->input('hours') > 24 && (int)$request->input('hours') < 0) {
            Session::flash('error', 'Time is invalid. Please try again!');
            return false;
        }
        if ((int)$request->input('mins') > 60 && (int)$request->input('mins') < 0 ) {
            Session::flash('error', 'Time is invalid. Please try again!');
            return false;
        }
        if ((int)$request->input('secs') > 60 && (int)$request->input('secs') < 0) {
            Session::flash('error', 'Time is invalid. Please try again!');
            return false;
        }
        return  true;
    }

    public function insert($request)
    {
        $isValidTime = $this->isValidTime($request);
        if ($isValidTime === false) return false;

        
        try {
            $request->except('_token');
            Deals::create([
                'name' => (string) $request->input('name'),
                'title' => (string) $request->input('title'),
                'description' => (string) $request->input('description'),
                'days' => (int) $request->input('days'),
                'hours' => (int) $request->input('hours'),
                'secs' => (int) $request->input('secs'),
                'mins' => (int) $request->input('mins'),
                'active' => (string) $request->input('active'),
                'url' => (string)  $request->input('url'),
                'thumb' => (string)  $request->input('thumb'),
            ]);

            Session::flash('success', 'Add a new deals successfully');
        } catch (\Exception $err) {
            Session::flash('error',$err->getMessage());
            // Session::flash('error', 'Thêm Sản phẩm lỗi');
            // Log::info($err->getMessage());
            return  false;
        }

        return  true;
    }
    
     public function get()
    {
        return Deals::select('id', 'name', 'url', 'thumb', 'title','description','days','hours','mins','secs','active','updated_at')
            ->orderByDesc('id')->paginate(6);
    }

    public function destroy($request){
        $id = (int) $request->input('id');
        try {
            $deals = Deals::where('id', $request->input('id'))->first();//first kiem tra co ton tai
            if($deals){
                return Deals::where('id', $id)->delete();
                
            }
        } catch (\Exception $err) {
            Session::flash('error',$err->getMessage());
        }
        
        return false;
    }
    public function update($deals, $request){
      

        try {
            $request->except('_token');
           
                $deals->name = (string) $request->input('name');
                $deals->title = (string) $request->input('title');
                $deals->description = (string) $request->input('description');
                $deals->days = (int) $request->input('days');
                $deals->hours = (int) $request->input('hours');
                $deals->mins = (int) $request->input('mins');
                $deals->secs = (int) $request->input('secs');
                $deals->active = (string) $request->input('active');
                $deals->url = (string)  $request->input('url');
                if($request->input('thumb') != '' ){
                    $deals->thumb = (string)  $request->input('thumb');
                }
    
            $deals->save();

            Session::flash('success', 'Update a new deals successfully');
        } catch (\Exception $err) {
            // Session::flash('error',$err->getMessage());
            Session::flash('error', 'Update a new deals fail');
            Log::info($err->getMessage());
            return  false;
        }

        return true;
    }

    // public function getProduct(){
        
    //     return Product::distinct()->select('name')->get();
    // }
}