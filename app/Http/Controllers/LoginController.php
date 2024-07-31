<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){

        return view('login');
    }
    //login
    public function postLogin(Request $request){
        $data=$request->only('email', 'password');
        //kiem tra dang nhap
        if(Auth::attempt($data)){
            return redirect()->route('movie.index');// Dang nhap thanh cong
        }else{
            return redirect()->back()->with('error','Email or password is not true!');
        }
    }
    public function register(){
        return view('register');
    }
    // register
    public function postRegister(Request $request){
        $data=$request->all();
        User::query()->create($data);
        return redirect()->route('login')->with('message','Register Sucessfully!!!');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
