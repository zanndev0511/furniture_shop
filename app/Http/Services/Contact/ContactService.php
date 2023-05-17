<?php
namespace App\Http\Services\Contact;

use App\Models\Contact;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class ContactService{
    public function getAll(){
        return Contact::orderbyDesc('id')->get();
    }

    public function getContact(){
        return Contact::orderbyDesc('id')->paginate(9);
    }

    public function create($request){
        try{
            Contact::create([
                'name' => (string) $request->input('name'),
                'email' => (string) $request->input('email'),
                'phone' => (string) $request->input('phone'),
                'message' => (string) $request->input('message'),
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

        $contact = Contact::where('id', $request->input('id'))->first();
        if($contact){
            return Contact::where('id',$id)->delete();
        }
        return false;
    }
}