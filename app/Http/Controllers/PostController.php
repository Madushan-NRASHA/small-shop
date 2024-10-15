<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function ClientRegister(){
        return view('User.Registration'); 
    }
   
    public function register(Request $request){
        $validate=$validate([
            'name'=>'required|string|max:255',
            'age'=>'required|integer',
            'email'=>'required|string|email|max:255|unique:users',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password'=>'required|string|min:8|confirmed',    

        ]);
        if ($request ->hasFile('image')) {  
            # code...
            $imagePath=$request->file('image')->store('images','public');
        }

        $user=User::create([
            'name'=>$request->input('name'),
            'age'=>$request->input('age'),
            'email'=>$request->input('email'),
            'image'=>$imagePath,
            'password'=>$request->input('password'),

        ]);
        Auth::login($user);

        // return redirect()->intended
    }
    public function login(){
        return view('User.login');
    }
   
}
