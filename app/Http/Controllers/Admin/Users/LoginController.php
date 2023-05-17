<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login',['title' => 'Log in']);
    }
    public function store(Request $request){
        // $remember = isset($request->input('remember')) ? true : false;
       
        $this ->validate($request,[
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);
        if (Auth::attempt(['email' => $request->input('email'), 
        'password' => $request->input('password')], $request->input('remember'))) {
            return redirect()->route('admin');
        }
        session()->flash('error', 'Username or password is incorrect');
        return redirect() ->back();
    }
}