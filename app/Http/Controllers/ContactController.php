<?php

namespace App\Http\Controllers;
use App\Http\Services\Contact\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contactService;
    
    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }
    public function index(){
        return view('contact',[
            'title' => 'Contact',
            'contacts' => $this->contactService->getAll(),
    ]);
    }
    public function store(Request $request){ 
        $this->validate($request,[
            'name'=> 'required',
        ]);
        $result = $this->contactService->create($request);

        return redirect()->back();
    }
    public function list(){
        return view('admin.contact.list',[
            'title'=> 'List of contacts',
            'contacts' => $this->contactService->getContact(),
        ]);
    }
    public function destroy(Request $request)
    {
        $result = $this->contactService->destroy($request);
        if($result){
            return response()->json([
                'error'=> false,
                'message' => 'Delete successfully'
            ]);
        }

        return response()->json([
                'error'=> true,

            ]);//response trar ve mot cai view
    }
}