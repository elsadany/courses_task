<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller{
    
    function login(Request $request){
        if(Auth::check()){
            return redirect()->to('backend/'); 
        }
        return view('backend.auth.login');
    }

    function auth(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password],$request->remember_me)){
            return redirect()->back()->withErrors(['email and password does not match any user !']);
        }
        return redirect()->to('/backend');
    }

    function logout(){
        Auth::logout();
        return redirect('./');//->route('login');
    }



}